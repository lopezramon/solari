<?php

namespace App\Http\Controllers;

use App;
use App\Models\Admin\Language;
use App\Models\Admin\Status;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /* Obtener todos los lenguajes */
    public static function getLanguageAll(){
        return Language::all();
    }

    /* Obtener todos los lenguajes */
    public static function getLanguageStatuses(){
        return Status::all();
    }

    function setLanguage(Request $request){
        try {
            $lang=$request->lang;
            App::setLocale($lang);
            $data=$this->getResource($lang);
            return response()->json( [ 'oper' => true , 'lang' => $lang, 'tags'=>$data], 200);
        } catch (Exception $e) {

        }
    }

    function getLanguage(Request $request){
        try {
            $lang=$request->lang;
            App::setLocale($lang);
            $data=$this->getResource($lang);
            return response()->json( [ 'oper' => true , 'lang' => $lang, 'tags'=>$data], 200);
        } catch (Exception $e) {

        }
    }

    function getResource($lang){
        $arr_archivo=array();
        $arr_archivo["validate"]=__("validate_js");
        //consulta de etiquetas por bd
        if($lang=='it'){
            $arr_archivo["tags"]=[
               0=>array(
                 'tag'=>'menu_1',
                 'value'=>'Menu Prueba IT',
               )
            ];
        }else{
            $arr_archivo["tags"]=[
              0=>array(
                 'tag'=>'menu_1',
                 'value'=>'Menu Prueba EN',
               )
            ];
        }

        return $arr_archivo;
    }
}
