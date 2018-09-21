<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\MailController;
use App\Http\Requests\API\Admin\UpdateUserAPIRequest;
use App\Http\Requests\Admin\CreatePermissionRequest;
use App\Http\Requests\Admin\CreateRoleRequest;
use App\Http\Requests\Admin\CreateRoleToUserRequest;
use App\Http\Requests\Admin\CreateUsersRequest;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAPIController extends AppBaseController
{   
    /**
     * Visualiza el formulario para crear un rol.
     *
     * @return View($role)
     */
    public function storeRole(CreateRoleRequest $request)
    {   
        $request->request->add(['slug' => str_slug($request->name, '-')]);
        $role = Role::create($request->all());
        
        if(!$role)
            Session::flash('success', 'Exito');
        
        return redirect(route('admin.role.index'));
    }

    /**
     * Sincronizar los permisos con un usuario.
     * Synchronize permissions.
     *
     * @return $role
     */
    public function addPermissionToRole(CreatePermissionRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permissions);
        $role->save();
        Session::flash('success', 'Exito');
        return redirect(route('admin.role.index'));
    }

    /**
     * Sincronizar los permisos con un usuario.
     * Synchronize permissions.
     *
     * @return $role
     */
    public function addRoleToUser(CreateRoleToUserRequest $request, $user)
    {
        $user = User::findOrFail($user);
        $user->syncRoles($request->role);
        if($user->save())
            Session::flash('success', 'Exito');
        return redirect(route('admin.user.get.search'));
    }

    /**
     * Mostrar detalles del usuario.
     * Show user details.
     *
     * @return $flag
     */
    public function showUserDetails($userID)
    {
        try{
            $user = User::findOrFail($userID);
            if(empty($user))
                return $this->sendError(['info' => 'Su petición no coinciden con nuestros datos.', 'status' => 'info']);

            return $this->sendResponse(['info' => $user->userDetails->toArray(), 'status' => 'success'], 'Su petición ha sido procesada con éxito.');
        }catch(\Exeption $e){
            return $this->sendError(['info' => $e->getMessage(), 'status' => 'error']);
        }
    }

    /**
     * Actualizar el perfil de usuario.
     * Update user profile.
     *
     * @return $flag
     */
    public function updateProfile(UpdateUserAPIRequest $request, $userID=null)
    {
        try{
            $userID = isset($userID) ? $userID : $request->id;
            $user = User::findOrFail($userID);

            if(empty($user))
                return $this->sendError(['info' => 'Su petición no coinciden con nuestros datos.', 'status' => 'info']);

            $input = $this->updateUser($user, $request->all());

            if($input->save()){
                if($request->password){
                    $request['msg'] = "Se ha realizado un cambio de clave.";
                    MailController::sendMail($request->all(),'test');
                }
                return $this->sendResponse(['info' => $input->toArray(), 'status' => 'success'], 'Su petición ha sido procesada con éxito.');
            }else{
                return $this->sendError(['info' => 'Su petición no pudo ser procesada.', 'status' => 'warning']);
            }
        }catch(\Exeption $e){
            return $this->sendError(['info' => $e->getMessage(), 'status' => 'error']);
        }
    }

    /**
     * Ca.
     *
     * @return View($role)
     */
    public function changePassword(Request $request)
    {
        try{
            $userID = isset($userID) ? $userID : $request->id;
            $user = User::findOrFail($userID);

            if(empty($user))
                return $this->sendError(['info' => 'Su petición no coinciden con nuestros datos.', 'status' => 'info']);

            $user['password'] = Hash::make($request['password']);


            if($user->save()){
                $request['msg'] = "Se ha realizado un cambio de clave.";
                MailController::sendMail($request->all(),'test');
                return $this->sendResponse(['info' => $input->toArray(), 'status' => 'success'], 'Su petición ha sido procesada con éxito.');
            }else{
                return $this->sendError(['info' => 'Su petición no pudo ser procesada.', 'status' => 'warning']);
            }
        }catch(\Exeption $e){
            return $this->sendError(['info' => $e->getMessage(), 'status' => 'error']);
        }
    }

    /**
     * 
     * Delete user data.
     *
     * @param  $user->id
     * @return $flag
     */
    public function dropOutUser(Request $request)
    {
        $user = User::find($request->id);
        $data['email'] = $user->email;
        $data['msg'] = "Usted ha eliminado su cuenta.";
        
        if(empty($user)){
             return $this->sendError(["info"=>"Username does not exist..!", "status"=>'warning']);
        }

        $update = $this->updateUser($user, null);

        if($update->save()){
            MailController::sendMail($data,'tests');

            $update->userDetails();
           
            Session::flush();
            
            return $this->sendResponse(['info'=>$update->toArray(), 'status'=>'success'], 'Usuario Eliminado');
        }
        
        return $this->sendError(["info"=>"Hubo un error..!", "status"=>'error']);
    }

    /**
    * Update the data with the user's null value.
    *
    * @param  $user
    * @return $user
    */
    public function updateUser($user, $request = null)
    {
        if($request){
            $user['name']          =   $request['name'];
            $user['lastname']      =   $request['lastname'];
        
            if($request['email'] != $user->email)
                $user['email']         =   $request['email'];
        
            if(isset($request['password']))
                $user['password']      =   Hash::make($request['password']);

            $user->userDetails()->updateOrCreate(['user_id'=>$user->id], [
                'phone'            => $request['phone'],
                'themes'           => isset($request['themes']) ? $request['themes'] : 'night.css',
                'viaEmail'         => isset($request['viaEmail']) ? true : false,
                'viaSms'           => isset($request['viaSms']) ? true : false,
                'fiscal_code'      => $request['fiscalCode'],
                'empresa'          => $request['azienda'],
                'num_civic'        => $request['viaNum'],
                'address'          => $request['address'],
                'province'         => $request['province'],
                'city'             => $request['city'],
                'terms'            => isset($request['terms']) ? true : false,
            ]);
        }else{
            $user->name         = "not available";
            $user->lastname     = "not available";
            $user->email        =  $user->id; //pmo
            $user->password     = "not available";
            $user->api_token    = "not available";

            $user->userDetails()->updateOrCreate(['user_id'=>$user->id], [
                'phone'            => "not available",
                'themes'           => 'night.css',
                'viaEmail'         => false,
                'viaSms'           => false,
                'fiscal_code'      => "not available",
                'empresa'          => "not available",
                'num_civic'        => "not available",
                'address'          => "not available",
                'province'         => "not available",
                'city'             => "not available",
                'terms'            => false,
            ]);
        }

        return $user;
    }
}
