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
use App\Models\Node;

class NodeController extends Controller
{
    public function getList()
    {
        try {
            
            $nodes =  DB::table('PacmanContable.dbo.NodosContables as c')
                           ->Select(DB::raw('c.ID_NodosContables as id,
                                            c.Descripcion as description,
                                            b.Descripcion as company,  
                                            CONCAT(\'<a href="edit/\', c.ID_NodosContables,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',c.ID_NodosContables,\'" data-toggle="modal"><i class="fa fa-trash"></i></a>\') as op'))
                           ->join('PacmanContable.dbo.Company as b', 'b.ID_Company', '=', 'c.ID_Company')
                           ->where('b.active', 1)
                           ->get();
                                  
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Nodos Contables Table';
            $r->data = $nodes;
            return $r->doResponse();
                                            
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
}
