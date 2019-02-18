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

class AccountantController extends Controller
{
    public function getList()
    {
        try {
            
            $campaign = DB::table('PacmanContable.dbo.Cuenta as a')
                           ->Select(DB::raw('a.ID_CUENTA as id
                                         ,a.COD_CUENTA as code
                                         ,a.DESC_CUENTA  as description
                                         ,c.Descripcion as company
                                         ,CONCAT(\'<a href="edit/\', a.ID_CUENTA,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',a.ID_CUENTA,\'" data-toggle="modal"><i class="fa fa-trash"></i></a>\') as op'))
                           ->join('PacmanContable.dbo.Company as c','c.ID_Company','=','a.ID_Company')
                           ->Where('a.HABILITADO', 'S')
                           ->get();
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Accountant Response';
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
