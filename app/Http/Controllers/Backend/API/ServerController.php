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

class ServerController extends Controller
{
    public function getList()
    {
    try {
        
        $servers = DB::table('CRM_Servers')
                    ->Select(DB::raw('ID_CRM_Server as id, Name as name, Island_Number as island, URI as uri, DB_connection as connection, CONCAT(\'<a href="edit/\',ID_CRM_Server,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',ID_CRM_Server,\'" data-toggle="modal"><i class="fa fa-trash"></i></a>\') as op'))
                    ->Where('active', 1)
                    ->get();
          
        $r = new ModelResponse();
        $r->success = true;
        $r->message = 'Servers Table';
        $r->data = $servers;
        return $r->doResponse();
     } catch(\Exception $e){
        $r = new ApiResponse();
        $r->success = false;
        $r->message = $e->getMessage();
        return $r->doResponse();
      }
    }
}
