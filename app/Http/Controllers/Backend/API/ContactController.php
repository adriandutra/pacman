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
            
            $year     = trim($request->input('anio'));
            $month    = trim($request->input('mes'));
            $campaign = trim($request->input('campaign'));

            $sub      =  DB::table(DB::raw('MapSales as sub'))
                              ->Select(DB::raw('TOP 100 \'Vendedor: \'+ Vendedor +\' - Cliente:\'+ Cliente as nombre_sede
                                                , latitude  as latitude
                                                , longitude as longitude
                                                , can as can
                                                , snn as snn
                                                , id_crm as id_crm'))
                              ->whereNotNull('latitude')
                              ->where('year', $year)
                              ->where('month', $month)
                              ->where('id_crm', $campaign);
            
            $padQuery =  DB::table(DB::raw("({$sub->toSql()}) as sub"))
                              ->mergeBindings($sub)
                              ->whereRaw('sub.CAN = sub.SNN')
                              ->get();
           
                              
                              
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Pad List';
            $r->data = $padQuery;
            return $r->doResponse();
            
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function postMonth(Request $request)
    {
        try {
               $year = trim($request->input('anio'));
                 
               $month = DB::table('Contact_History')
                         ->select(DB::raw('month(DateTime) as mes'))
                         ->where(DB::raw('year(DateTime)'), $year)
                         ->groupBy(DB::raw('month(DateTime)'))
                         ->OrderBy(DB::raw('month(DateTime)'))
                         ->get();    
     
                $r = new ModelResponse();
                $r->success = true;
                $r->message = 'Send Month';
                $r->data = $month;
                return $r->doResponse();
            
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function postCampaign(Request $request)
    {
        try {
            
            $year  = trim($request->input('anio'));
            $month = trim($request->input('mes'));
            
            
            $campaign= DB::table(DB::raw('Contact_History as cs'))
                            ->select(DB::raw('cs.id_crm, cr.name'))
                            ->join('CRM as cr', 'cr.id_crm','=','cs.id_crm')
                            ->where(DB::raw('year(cs.DateTime)'), $year)
                            ->where(DB::raw('month(cs.DateTime)'), $month)
                            ->where('idventa','<>', 0)
                            ->groupBy(DB::raw('cs.id_crm, cr.name'))
                            ->OrderBy(DB::raw('cr.name'))
                            ->get();
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Send Campaign';
            $r->data = $campaign;
            return $r->doResponse();
            
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
}
