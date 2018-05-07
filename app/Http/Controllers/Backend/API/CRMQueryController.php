<?php

namespace App\Http\Controllers\Backend\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Helpers\ModelResponse;
use App\Models\CRMQuery;
use Carbon\Carbon;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Event;
use Log;
use DB;

class CRMQueryController extends Controller
{
    public function getList()
    {
        try {
            
            $crm = DB::table('CRM')
                      ->Select(DB::raw('CRM.ID_CRM as id
                                        ,CRM.Name as name
                                        ,CRM.IDCRM_Neotel as idcrm_neotel
                                        ,CRM.Date as date
                                        ,CRM.Action as action
                                        ,CRM_Servers.Name as server 
                                        ,CRM.Field_Document as field_document
                                        ,CONCAT(SUBSTRING(CRM.SQL_Contact,1,15),\' ...\') as sql_contact
                                        ,CONCAT(SUBSTRING(CRM.SQL_Contact_Sales,1,15),\' ...\') as sql_contact_sales
                                        ,CONCAT(SUBSTRING(CRM.SQL_Contact_History,1,15),\' ...\') as sql_contact_history
                                        ,CONCAT(SUBSTRING(CRM.SQL_External_Contact,1,15),\' ...\') as sql_external_contact
                                        ,CONCAT(SUBSTRING(CRM.SQL_Contact_Phone,1,15),\' ...\') as sql_contact_phone
                                        ,CONCAT(SUBSTRING(CRM.SQL_Contact_MailAddress,1,15),\' ...\') as sql_contact_mailaddress
                                        ,CONCAT(SUBSTRING(CRM.SQL_Contact_Address,1,15),\' ...\') as sql_contact_address
                                        ,CONCAT(\'<a href="edit/\',CRM.ID_CRM,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',CRM.ID_CRM,\'" data-toggle="modal"><i class="fa fa-trash"></i></a>\') as op'))
                      ->leftJoin('CRM_Servers', 'CRM.ID_CRM_Server', '=', 'CRM_Servers.ID_CRM_Server')
                      ->Where('CRM.Active', 1)
                      ->get();
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'CRM Table';
            $r->data = $crm;
            return $r->doResponse();
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function postExecute(Request $request)
    {
        try {   
                $id       = $request->input('id');
                $sql      = trim($request->input('sql'));                
                
                
                $function = DB::table('CRM as crm')
                            ->Select(DB::raw('crm.ID_CRM_Server as ID_CRM_Server
                                              , crms.db_connection as db_connection
                                              , \'ECRM_\'+ 
                                              CASE WHEN LEN(crm.IDCRM_Neotel)=1 THEN \'000\' + CONVERT(varchar,crm.IDCRM_Neotel)
                                                     WHEN LEN(crm.IDCRM_Neotel)=2 THEN \'00\' + CONVERT(varchar,crm.IDCRM_Neotel)
                                                     WHEN LEN(crm.IDCRM_Neotel)=3 THEN \'0\' + CONVERT(varchar,crm.IDCRM_Neotel)
                                                ELSE CONVERT(varchar, crm.IDCRM_Neotel)
                                                END as ecrm
                                              , crm.IDCRM_Neotel as IDCRM_Neotel
                                              , crm.ID_CRM as ID_CRM
                                              , crm.field_document'))
                            ->leftJoin('CRM_Servers as crms', 'crm.ID_CRM_Server', '=', 'crms.ID_CRM_Server')
                            ->whereRaw('(crms.Active=1 AND crm.Active=1 AND crm.Field_Document IS NOT NULL AND crm.SQL_Contact IS NOT NULL)')
                            ->orWhereRaw('(crms.Active=1 AND crm.Active=1)')
                            ->get();
                
                $F_HOY = DB::Select('SELECT CONVERT(VARCHAR(8),  GETDATE() -1, 112) as Fecha');                
                
                
                foreach ($function as $f)
                {
                    if($f->ID_CRM == $id)
                    {
                        $qID_CRM_Server  = $f->ID_CRM_Server;
                        $qdb_connection  = $f->db_connection;
                        $qECRM           = $f->ecrm;
                        $qIDCRM_NEOTEL   = $f->IDCRM_Neotel;
                        $qIDCRM          = $f->ID_CRM;
                        $qField_Document = $f->field_document;
                    }
                    
                }

                $sqlQuery = $sql;
                $sqlQuery = str_replace('@qID_CRM_Server', $qID_CRM_Server, $sqlQuery);
                $sqlQuery = str_replace('@qdb_connection', $qdb_connection, $sqlQuery);
                $sqlQuery = str_replace('@qECRM', $qECRM, $sqlQuery);
                $sqlQuery = str_replace('@qIDCRM_NEOTEL', $qIDCRM_NEOTEL, $sqlQuery);
                $sqlQuery = str_replace('@qIDCRM', $qIDCRM, $sqlQuery);
                $sqlQuery = str_replace('@qField_Document', $qField_Document, $sqlQuery);
                $sqlQuery = str_replace('@F_HOY', $F_HOY[0]->Fecha, $sqlQuery);
                                
                $sqlQuery = preg_replace("[\n|\r|\n\r]", ' ',$sqlQuery);                

                $results = DB::Select($sqlQuery);
                
                $r = new ModelResponse();
                $r->success = true;
                $r->message = 'CRM Table';
                $r->data = $results;
                return $r->doResponse();
                
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
        
    }
    
    public function postSave(Request $request)
    {
        try {
            
            $id       = $request->input('id');
            $sql      = trim($request->input('sql'));

            $crm  = CRMQuery::findOrFail($id);
   
            switch($request->get('id_sql'))
            {
                case 'SQL Contact':
                    $crm->SQL_Contact             = $sql;
                    break;
                case 'SQL Contact Sales':
                    $crm->SQL_Contact_Sales       = $sql;
                    break;
                case 'SQL Contact History':
                    $crm->SQL_Contact_History     = $sql;
                    break;
                case 'SQL External Contact':
                    $crm->SQL_External_Contact    = $sql;
                    break;
                case 'SQL Contact Phone':
                    $crm->SQL_Contact_Phone       = $sql;
                    break;
                case 'SQL Contact Mail Address':
                    $crm->SQL_Contact_MailAddress = $sql;
                    break;
                case 'SQL Contact Address':
                    $crm->SQL_Contact_Address     = $sql;
                    break;
            }
            
            $crm->update();
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'CRM Table';
            $r->data = $crm;
            return $r->doResponse();
            
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
        
    }
}
