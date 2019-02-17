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
use App\Models\Company;


class CompanyController extends Controller
{
    public function getList()
    {
        try {
            
            $companies = DB::table('PacmanContable.dbo.Company as c')
                               ->Select(DB::raw('c.ID_Company as id,
                                       c.Descripcion as description,
                                       c.[Database] as base,
                                       CONCAT(\'<a href="edit/\', c.ID_Company,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',c.ID_Company,\'" data-toggle="modal"><i class="fa fa-trash"></i></a>\') as op'))
                               ->where('c.active', 1)
                               ->get();
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Company Table';
            $r->data = $companies;
            return $r->doResponse();
            
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
}
