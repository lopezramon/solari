<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\MailController;
use App\Http\Requests\API\Admin\CreateNewsletterUserAPIRequest;
use App\Repositories\Admin\NewsletterUserRepository;
use Illuminate\Http\Request;

class UtilsAPIFrontController extends AppBaseController
{
    /** @var  NewsletterUserRepository */
    private $newsletterUserRepository;

    public function __construct(NewsletterUserRepository $newsletterUserRepo)
    {
        $this->newsletterUserRepository = $newsletterUserRepo;
    }

    /**
    * Send the email to contact us.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function contactUs(Request $request)
    {

        try{
            $request['textmail'] = 'Titulo';
            $request['textmail_sub'] = 'Sub titulo';
            $flag="ERROR NO ENVIO";

            $send = MailController::sendMail($request->all(),'contacto');

            if($send=='OK'){
                $flag="FINO";
            }
            else{
                $flag=var_dump($send);
            }

            return response()->json(["success"=>true,"message"=>$flag],200);
        }catch(Exeption $e){
            return $e->message();
        }
    }

    /**
    * Send the email to newsletter.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function newsLetter(CreateNewsletterUserAPIRequest $request)
    {
        try{
            $exist = $this->newsletterUserRepository->findByField('email',$request->email)->first();
            if(!$exist){
                $newsletterUsers = $this->newsletterUserRepository->create($request->all());
                $send=MailController::sendMail($request->all(),'newsletter');
                if($send=='OK'){
                    return $this->sendResponse($newsletterUsers->toArray(), 'Newsletter Utente salvato correttamente');
                }
            }

            return response()->json(["success"=>true,"message"=>"La tua email è già registrata"],422);
        }catch(Exeption $e){
            return response()->json(["success"=>true,"message"=>$e->message()],500);
            return $e->message();
        }
    }

    /**
    * Function unsubscribe newslatter.
    *
    * @param  $email
    * @return \Illuminate\Http\Response
    */
    public function unsubscribeNewsletter($email)
    {
        try{
            $newsletter = $this->newsletterUserRepository->findByField('email',$email)->first();
            // return response()->json($newsletter);
            if(empty($newsletter)){
                return response()->json(["success"=>true,"message"=>"El email no existe..!"],301);
            }
            $newsletter->forceDelete();
            return response()->json(["success"=>true,"message"=>$newsletter],200);
        }catch(Exeption $e){
            return response()->json(["success"=>true,"message"=>$e->message()],500);
        }
    }
}
