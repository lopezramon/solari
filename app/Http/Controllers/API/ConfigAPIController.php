<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App;

class ConfigAPIController extends AppBaseController
{
    public function getEnv(Request $request){
         try {
            $env = env('APP_ENV', 'production');

            return response()->json( ['oper' => true , 'env' => $env], 200 );
        } catch (Exception $e) {

        }
    }
}
