<?php

namespace App\Http\Controllers\Backend\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Helpers\ModelResponse;
use Carbon\Carbon;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Event;
use Log;
use DB;

class SyslogController extends Controller
{
    public function getList()
    {
        try {
            
            $now      = Carbon::now();
            $lastmonth = Carbon::now()->subMonth();
            
            $syslog = DB::table('Syslogs')
                       ->Select(DB::raw('Fecha as date, SUBSTRING(Detalles,0,30) as detail, Programa as program, CONCAT(\'<a href="edit/\',Fecha,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',Fecha,\'" data-toggle="modal"><i class="fa fa-check"></i></a>\') as op'))
                       ->Where('ACK', 1)
                       ->WhereBetween('Fecha', [$lastmonth, $now])
                       ->OrderBy('Fecha', 'ASC')
                       ->get();
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Syslog Table';
            $r->data = $syslog;
            return $r->doResponse();
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getHistory()
    {
        try {
            
            $now      = Carbon::now();
            $lastmonth = Carbon::now()->subMonth();
            
            $syslog = DB::table('Syslogs')
                       ->Select(DB::raw('Fecha as date, SUBSTRING(Detalles,0,30) as detail, Programa as program'))
                       ->Where('ACK', 1)
                       ->WhereBetween('Fecha', [$lastmonth, $now])
                       ->OrderBy('Fecha', 'ASC')
                       ->get();
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Syslog Table';
            $r->data = $syslog;
            return $r->doResponse();
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
}
