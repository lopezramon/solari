<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\MailController;
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

class UserController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Listar todos los roles.
     *
     * @return View($role)
     */
    public function indexRole()
    {
        $role = Role::all();
        return view('admin.users.roles.index', compact('role'));
    }

    /**
     * Agrupa los input que se desean salvar.
     *
     * @return $input
     */
    public function saveInput($user, $request)
    {
        $user['name']          =   $request['name'];
        $user['lastname']      =   $request['lastname'];
        $user['email']         =   $request['email'];
        $user['fiscal_code']   =   $request['fiscal_code'];
        $user['phone']         =   $request['phone'];
        $user['themes']        =   $request['themes'];
        
        if($request['password'])
            $user['password']      =   Hash::make($request['password']);
        
        return $user;
    }

    /**
     * Visualiza el formulario para crear un rol.
     *
     * @return View($role)
     */
    public function createRole()
    {
        return view('admin.users.roles.create');
    }
    
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
     * Visualiza el detalle de un rol.
     *
     * @return View($role)
     */
    public function showRole($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.users.roles.show', compact('role'));
    }

    /**
     * Muestra el formulario para agregar los permisos.
     * Show the form to add the permissions.
     *
     * @return View($role,$permissions)
     */
    public function permissionToRole($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin.users.permissions.index', compact(['role','permissions']));
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
    public function getSearchUser()
    {
        return view('admin.users.users.search');
    }

    /**
     * Sincronizar los permisos con un usuario.
     * Synchronize permissions.
     *
     * @return $role
     */
    public function searchUser(Request $request)
    {
        $roles = Role::all();
        $user = User::where('email',$request->email)->first();
        return view('admin.users.users.search', compact(['user', 'roles']));
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
    * Delete user data.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function dropOutUser($id)
    {
        $user = User::find($id);
        $data['email'] = $user->email;
        $data['msg'] = "Usted ha eliminado su cuenta.";
        
        if(empty($user)){
             return response()->json(["warning"=>true, "message"=>"Username does not exist..!"],302);
        }

        $update = $this->updateUser($user);

        if($update->save()){
            MailController::sendMail($data,'deleteaccount');
            if($id == Auth::user()->id)
                Session::flush();
            
            return response()->json(['info'=>$update->toArray(), 'status'=>'success', 'message' => 'Usuario Eliminado']);
        }
        return response()->json(["info"=>"Hubo un error..!", "status"=>'error'], 500);
    }

    /**
    * Update the data with the user's null value.
    *
    * @param  $user
    * @return $user
    */
    public function updateUser($user)
    {

        $user->name         = "not available";
        $user->lastname     = "not available";
        $user->email        =  $user->id; //pmo
        $user->fiscal_code  = "not available";
        $user->phone        = "not available";
        $user->password     = "not available";

        return $user;
    }

}
