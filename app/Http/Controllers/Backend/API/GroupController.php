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
use App\Models\Group;

class GroupController extends Controller
{
    public function getList()
    {
        try {
            
            $groups =  DB::table('PacmanContable.dbo.Grupos_Auxiliares as c')
                          ->Select(DB::raw('c.ID_GAux as id,
                                            c.Descripcion as description,
                                            CONCAT(\'<a href="edit/\', c.ID_GAux,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',c.ID_GAux,\'" data-toggle="modal"><i class="fa fa-trash"></i></a>\') as op'))
                          ->get();
                                        
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Grupos Auxiliares Table';
            $r->data = $groups;
            return $r->doResponse();
            
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
}
