<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\PBX;
use App\Models\Campaign;
use App\Models\CRMQuery;
use App\Http\Requests\Backend\CampaignFormRequest;
use DB;

class CampaignController extends Controller
{
    public function getList()
    {
        $campaign = Campaign::getServerActiveId();
        return view('backend.campaigns.index', ['campaign' => $campaign]);
    }
    
    public function getCreate()
    {
        return view('backend.campaigns.create');
    }
    
    public function getEdit($id)
    {
        
        $pbx = PBX::getPbxNameId();
        $crm = CRMQuery::getServerActiveNameId();        

        return view('backend.campaigns.edit', ['campaign' => Campaign::findOrFail($id), 'pbx' => $pbx, 'crm' => $crm]);
    }
    
    public function getDelete()
    {
        return view('backend.campaigns.delete');
    }
    
    
    
    public function postStore(CampaignFormRequest $request)
    {
        $campaign                    = new Campaign;
        $campaign->Name              = $request->get('Name');
        $campaign->NameFact          = $request->get('Island_Number');
        $campaign->IDCampaing_Neotel = $request->get('URI');
        $campaign->pbx_id            = $request->get('pbx_id');        
        $campaign->Prepend           = $request->get('Prepend');
        $campaign->acc_id            = $request->get('acc_id');
        $campaign->ID_CRM            = $request->get('ID_CRM');
        $campaign->Group_Fact        = $request->get('Group_Fact');
        $campaign->Date              = $request->get('Date');
        $campaign->Action            = $request->get('Action');
        $campaign->Active            = '1';
        $campaign->save();
        
        return Redirect::to('campaigns/list');
    }
    
    public function postUpdate(CampaignFormRequest $request)
    {
        
        $campaign                    = Campaign ::findOrFail($request->get('ID_Campaign'));
       
        $campaign->Name              = $request->get('Name');
        $campaign->pbx_id            =  (strlen($request->get('pbx_id')) > 0) ? $query=$request->get('pbx_id') : 0;
        $campaign->ID_CRM            =  (strlen($request->get('ID_CRM')) > 0) ? $request->get('ID_CRM'):NULL;
        
        $campaign->update();
        
        return Redirect::to('campaigns/list');
    }
    
    public function postDestroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->Active = '0';
        $campaign->update();
        
        return Redirect::to('servers/list');
    }
}
