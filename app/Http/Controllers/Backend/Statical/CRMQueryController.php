<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\CRMQuery;
use App\Http\Requests\Backend\CRMQueryFormRequest;
use DB;
class CRMQueryController extends Controller
{
    public function getList()
    {
        $crmquery = CRMQuery::getServerActiveId();
        
        return view('backend.crmquery.index', ['crmquery' => $crmquery]);
    }
    
    public function getCreate()
    {
        $servers = DB::table('CRM_Servers')
                     ->select(DB::raw('ID_CRM_Server as id, Name as name'))
                     ->where('Active', 1)
                     ->get();
        
        return view('backend.crmquery.create', ['servers' => $servers]);
    }
    
    public function getEdit($id)
    {
        $servers = DB::table('CRM_Servers')
                    ->select(DB::raw('ID_CRM_Server as id, Name as name'))
                    ->where('Active', 1)
                    ->get();
        
       return view('backend.crmquery.edit', ['crm' => CRMQuery::findOrFail($id), 'servers' => $servers]);
    }
    
    public function getProof($id, $sql)
    {   
        $crm = CRMQuery::findOrFail($id);
        switch ($sql)
        {
            case 1: $sql_contact = $crm->SQL_Contact;
                    $sql_name = 'SQL Contact';
                    break;
            case 2: $sql_contact = $crm->SQL_Contact_Sales;
                    $sql_name = 'SQL Contact Sales';
                    break;
            case 3: $sql_contact = $crm->SQL_Contact_History;
                    $sql_name = 'SQL Contact History';
                    break;
            case 4: $sql_contact = $crm->SQL_External_Contact;
                    $sql_name = 'SQL External Contact';
                    break;
            case 5: $sql_contact = $crm->SQL_Contact_Phone;
                    $sql_name = 'SQL Contact Phone';
                    break; 
            case 6: $sql_contact = $crm->SQL_Contact_MailAddress;
                    $sql_name = 'SQL Contact Mail Address';
                    break; 
            case 7: $sql_contact = $crm->SQL_Contact_Address;
                    $sql_name = 'SQL Contact Address';
                    break; 
        }
         
        
        return view('backend.crmquery.proof', ['crm' => $crm, 'sql_contact' => $sql_contact,'SQL' => $sql, 'sql_name' => $sql_name]);
    }
    
    public function getDelete()
    {
        return view('backend.crmquery.delete');
    }
    
    
    public function postStore(CRMQueryFormRequest $request)
    {
        $crm                          = new CRMQuery();
        $crm->Name                    = $request->get('Name');
        $crm->IDCRM_Neotel            = $request->get('IDCRM_Neotel');
        $crm->Date                    = $request->get('Date');
        $crm->Action                  = $request->get('Action');
        $crm->ID_CRM_Server           = $request->get('ID_CRM_Server');
        $crm->Field_Document          = $request->get('Field_Document');
        $crm->SQL_Contact             = $request->get('SQL_Contact');
        $crm->SQL_Contact_Sales       = $request->get('SQL_Contact');
        $crm->SQL_Contact_History     = $request->get('SQL_Contact_History');
        $crm->SQL_External_Contact    = $request->get('SQL_External_Contact');
        $crm->SQL_Contact_Phone       = $request->get('SQL_Contact_Phone');
        $crm->SQL_Contact_MailAddress = $request->get('SQL_Contact_MailAddress');
        $crm->SQL_Contact_Address     = $request->get('SQL_Contact_Address');
        $crm->Active                  = '1';
        $crm->save();
        
        return Redirect::to('crmquery/list');
    }
    
    public function postUpdate(CRMQueryFormRequest $request)
    {
        $crm                          = CRMQuery::findOrFail($request->get('ID_CRM'));
        $crm->Name                    = $request->get('Name');
        $crm->IDCRM_Neotel            = $request->get('IDCRM_Neotel');
        $crm->Date                    = $request->get('Date');
        $crm->Action                  = $request->get('Action');
        $crm->ID_CRM_Server           = (strlen($request->get('ID_CRM_Server')) > 0) ? $request->get('ID_CRM_Server'): 0;
        $crm->Field_Document          = $request->get('Field_Document');
       
        $crm->update();
        
        return Redirect::to('crmquery/list');
    }
    
    public function postProof(Request $request)
    {
        $crm  = CRMQuery::findOrFail($request->get('ID_CRM'));
        switch($request->get('id_sql'))
        {
            case 'SQL Contact':
                               $crm->SQL_Contact             = $request->get('SQL_Contact');
                               break;
            case 'SQL Contact Sales':
                               $crm->SQL_Contact_Sales       = $request->get('SQL_Contact_Sales');
                               break;
            case 'SQL Contact History':
                               $crm->SQL_Contact_History     = $request->get('SQL_Contact_History');
                               break;
            case 'SQL External Contact':
                               $crm->SQL_External_Contact    = $request->get('SQL_External_Contact');
                               break;
            case 'SQL Contact Phone':
                               $crm->SQL_Contact_Phone       = $request->get('SQL_Contact_Phone');
                               break;
            case 'SQL Contact Mail Address':
                               $crm->SQL_Contact_MailAddress = $request->get('SQL_Contact_MailAddress');
                               break;
            case 'SQL Contact Address':
                               $crm->SQL_Contact_Address     = $request->get('SQL_Contact_Address');
                               break;
        }                       
        
            $crm->update();
            return Redirect::to('crmquery/list');
    }
    
    public function postDestroy($id)
    {
        $crm = CRMQuery::findOrFail($id);
        $crm->Active = '0';
        $crm->update();
        
        return Redirect::to('crmquery/list');
    }
}
