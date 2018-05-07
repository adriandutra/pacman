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

class CampaignController extends Controller
{
    public function getList()
    {
        try {
            
            $campaign = DB::table('Campaign')
                       ->Select(DB::raw('Campaign.ID_Campaign as id
                                         ,Campaign.Name as name
                                         ,Campaign.NameFact as namefact
                                         ,Campaign.IDCampaing_Neotel as neotel
                                         ,PBX.Name as pbx_name
                                         ,Campaign.Prepend as prepend
                                         ,Account.Name as account_name
                                         ,CRM.Name as crm_name
                                         ,Campaign.Group_Fact as group_fact
                                         ,Campaign.Date as date
                                         ,Campaign.Action as action
                                         ,CONCAT(\'<a href="edit/\',Campaign.ID_Campaign,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',Campaign.ID_Campaign,\'" data-toggle="modal"><i class="fa fa-trash"></i></a>\') as op'))
                        ->leftjoin('PBX','Campaign.pbx_id','=','PBX.pbx_id') 
                        ->leftjoin('Account','Campaign.acc_id','=','Account.acc_id')
                        ->leftjoin('CRM','Campaign.ID_CRM','=','CRM.ID_CRM')
                        ->Where('Campaign.active', 1)
                        ->get();
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Campaign Table';
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
