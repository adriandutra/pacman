<?php

namespace App\Http\Controllers\Backend\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Helpers\ModelResponse;
use Carbon\Carbon;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Illuminate\Database\QueryException;
use Event;
use Log;
use DB;

class ContactController extends Controller
{

    public function postPad(Request $request)
    {
      try {
          

            $sub  =  DB::table(DB::raw('Normal_Contact_Address as sub'))
                         ->Select(DB::raw(' TOP 10000 sub.oldaddress as direccion
                                           , sub.street as calle
                                           , sub.number as numero
                                           , sub.piso as piso
                                           , sub.depto as depto
                                           , sub.postalcode as postal
                                           , sub.location as localidad
                                           , sub.city as partido
                                           , sub.state as provincia
                                           , sub.country as pais
                                           , sub.id as id'))
                         ->where('mark', 0)                                           
                         ->get();
           
                              
                              
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Pad List';
            $r->data = $sub;
            return $r->doResponse();
            
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    
    public function postApply(Request $request)
    {
        try {
            
            
               $ArrStreet = $request->input('checked');                                 

               foreach ($ArrStreet as $a)
               {                   
                   
                   $query = DB::table(DB::raw('Normal_Contact_Address'))
                                ->where(['id' => $a])
                                ->update(['mark' => 1]);
                                
                                    
               }
               
               $r = new ModelResponse();
               $r->success = true;
               $r->message = 'Apply Update';
               $r->data = $query;
               return $r->doResponse();
                                           
                                                        
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }

    
    public function postDiscard(Request $request)
    {
        try {
            
            
            $ArrStreet = $request->input('checked');
            
            foreach ($ArrStreet as $a)
            {
                
                $query = DB::table(DB::raw('Normal_Contact_Address'))
                ->where(['id' => $a])
                ->update(['mark' => 2]);
                
                
            }
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Discard Update';
            $r->data = $query;
            return $r->doResponse();
            
            
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
   

}
