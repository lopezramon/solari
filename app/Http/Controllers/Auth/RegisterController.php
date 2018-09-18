<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'      => $data['name'],
            'lastname'  => $data['lastname'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
        ]);

        $user->assignRole(3);

        $this->userDetails($user, $data);

        $data['msg'] = "Se ha registrado con éxito";
        MailController::sendMail($data,'tests');

        return $user;
    }

    /**
     * Salvar los detalles del usuario.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function userDetails($user, $data)
    {
        $user->userDetails()->create([
            'phone'            => $data['phone'],
            'themes'           => 'night.css',
            'viaEmail'         => $data['viaEmail'],
            'viaSms'           => $data['viaSms'],
            'fiscal_code'      => $data['fiscalCode'],
            'empresa'          => $data['azienda'],
            'num_civic'        => $data['viaNum'],
            'address'          => $data['address'],
            'province'         => $data['province'],
            'city'             => $data['city'],
            'terms'            => $data['terms'],
        ]);
    }

    protected function registered(Request $request, $user)
    {
        $user->generateToken();

        $admin = $user->isRole('admin') ? true : false;

        return response()->json(['data' => $user->toArray(), 'admin' => $admin], 200);

        return $user;
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
           return response()->json(['error'=>$validator->errors()],422);
        }

        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);

        return $this->registered($request, $user)?: redirect($this->redirectPath());
    }

}
