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

class AccountController extends Controller
{
    public function getList()
    {
        try {
            
            $account  = DB::table('Account')
                          ->Select(DB::raw('Account.acc_id as id, Account.Name as name, Account.Start_Cycle as start_cycle, Account.End_Cycle as end_cycle, Account.Cycle as cycle, Account.CDR as cdr, Account.CPP as cpp, Sales_Rates.Name as id_sales_rates, CONCAT(\'<a href="edit/\',Account.acc_id,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',Account.acc_id,\'" data-toggle="modal"><i class="fa fa-trash"></i></a>\') as op'))
                          ->leftJoin('Sales_Rates', 'Account.ID_Sales_Rates', '=', 'Sales_Rates.ID_Sales_Rates')
                          ->Where('Account.Active', 1)
                          ->get();
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Account Table';
            $r->data = $account;
            return $r->doResponse();
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
}
