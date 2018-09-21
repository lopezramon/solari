<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLoginFront(Request $request)
    {
        return \Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string|min:8',
        ]);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $validator = $this->validateLoginFront($request);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()],422);
        }

        if ($this->attemptLogin($request)) {
            $this->sendLoginResponse($request);
            
            $user = $this->guard()->user();
            $user->generateToken();

            $user = array_add($user, 'details', $user->userDetails->toarray());
            $admin = $user->isRole('admin') ? true : false;
            

            return response()->json(
                [
                    'status' => 'success' , 
                    'message' => 'Usuario exitoso.', 
                    'data' => $user->toArray(), 
                    'admin' => $admin
                ],200);
        }

        return response()->json( ['status' => 'danger' , 'message' => 'Unauthorized' ], 401);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
        
        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        $this->guard()->logout();

        $request->session()->invalidate();

        return response()->json(['data' => 'User logged out.'], 200);

        return $this->loggedOut($request) ?: redirect('/');
    }
}
