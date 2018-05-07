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

class PbxController extends Controller
{
    public function getList()
    {
        try {
            
            $pbx = DB::table('PBX')
                      ->Select(DB::raw('PBX.pbx_id as id, 
                                        PBX.Name as name, 
                                        PBX.URI as uri, 
                                        PBX.Location as location,
                                        PBX.Folder as folder, 
                                        PBX.FileName as filename, 
                                        PBX.DB_connection as connection, 
                                        PBX.Type as type, 
                                        p.name as depend, 
                                        CRM_Servers.Name as server, 
                                        CONCAT(\'<a href="edit/\',PBX.pbx_id,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',PBX.pbx_id,\'" data-toggle="modal"><i class="fa fa-trash"></i></a>\') as op'))
                      ->leftJoin('CRM_Servers', 'PBX.ID_CRM_Server', '=', 'CRM_Servers.ID_CRM_Server')
                      ->leftJoin('PBX as p', 'PBX.depend_pbx_id', '=', 'p.pbx_id')
                      ->Where('PBX.active', 1)
                      ->get();
            
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Pbxs Table';
            $r->data = $pbx;
            return $r->doResponse();
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
}
