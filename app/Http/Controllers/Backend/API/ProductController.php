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

class ProductController extends Controller
{
    public function getList()
    {
        try {
            
            $servers = DB::table('Products')
                       ->Select(DB::raw('ID_Product as id
                                        ,Description as description
                                        , CONCAT(\'<a href="edit/\',ID_Product,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',ID_Product,\'" data-toggle="modal"><i class="fa fa-trash"></i></a>\') as op'))
                      // ->Where('active', 1)
                       ->get();
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Products Table';
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
