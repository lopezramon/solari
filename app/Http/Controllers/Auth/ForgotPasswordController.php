<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function forgotPassword(Request $request)
    {
        try {
//            $tags = TagTranslationController::getTagsValues(\App::getLocale());

            $user = User::where('email', $request->email)->select('id')->first();

//            $objpasswrod=new ForgotPasswordController();

            if(empty($user)){
                return response()->json( [ 'oper' => false, 'msg' => 'Controllare la posta, l\'utente non esiste' ], 200);
            }else{
                if($this->sendEmailPassword($request)){
                    return response()->json( [ 'oper' => true, 'msg' => 'success' ], 200);
                }else{
                    return response()->json( [ 'oper' => false, 'msg' => 'Mail non può essere inviato' ], 500);
                }
            }
        } catch (Exception $e) {
            \Log::error('Error enviar email password Usuario: '.$request->email.' LINE: '.$e->getLine().' FILE: '.$ex->getFile());
            return response()->json( [ 'data' => '' , 'msg' => '' ], 500);
        }
    }

    public function sendEmailPassword($request){
        try {
            if($this->sendResetLinkEmail($request)){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            \Log::error('Error al enviar el email del password para el Usuario: '.$request->email.' LINE: '.$e->getLine().' FILE: '.$ex->getFile());
            return response()->json( [ 'error' => $e->getMessage() , 'line' => $e->getLine() ], 500);
        }
    }


}
