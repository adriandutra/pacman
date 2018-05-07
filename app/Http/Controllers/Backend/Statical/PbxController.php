<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PbxFormRequest;
use App\Models\Server;
use App\Models\Pbx;
use DB;

class PbxController extends Controller
{
    public function getList()
    {   
        $pbx = Pbx::getPbxId();
        
        return view('backend.pbx.index', ['pbx' => $pbx]);
    }
    
    public function getCreate()
    {
        
        $servers = Server::getServerActiveNameId();
        
        $pbx = Pbx::getPbxNameId();
        
        return view('backend.pbx.create', ['servers' => $servers, 'pbx' => $pbx]);
    }
    
    public function getEdit($id)
    {
        $servers = Server::getServerActiveNameId();
        
        $pbx = Pbx::getPbxNameId();
        
        return view('backend.pbx.edit', ['pbxdata' => Pbx::findOrFail($id), 'servers' => $servers, 'pbx' => $pbx]);
    }
    
    public function getDelete()
    {
        return view('backend.pbx.delete');
    }
    
    public function postStore(PbxFormRequest $request)
    {
        $pbx                = new Pbx;
        $pbx->Name          = $request->get('Name');
        $pbx->URI           = $request->get('URI');
        $pbx->Location      = $request->get('Location');
        $pbx->Folder        = $request->get('Folder');
        $pbx->FileName      = $request->get('FileName');
        $pbx->DB_connection = $request->get('DB_connection');
        $pbx->Type          = $request->get('Type');
        $pbx->depend_pbx_id = $request->get('depend_pbx_id');
        $pbx->ID_CRM_Server = $request->get('ID_CRM_Server');
        $pbx->Active = '1';
        $pbx->save();
        
        return Redirect::to('pbx/list');
    }
    
    public function postUpdate(PbxFormRequest $request)
    {
        $pbx                = Pbx::findOrFail($request->get('pbx_id'));
        $pbx->Name          = $request->get('Name');
        $pbx->URI           = $request->get('URI');
        $pbx->Location      = $request->get('Location');
        $pbx->Folder        = $request->get('Folder');
        $pbx->FileName      = $request->get('FileName');
        $pbx->DB_connection = $request->get('DB_connection');
        $pbx->Type          = $request->get('Type');
        $pbx->depend_pbx_id = $request->get('depend_pbx_id');
        $pbx->ID_CRM_Server = $request->get('ID_CRM_Server');
        $pbx->update();
        
        return Redirect::to('pbx/list');
    }
    
    public function postDestroy($id)
    {
        $pbx = pbx::findOrFail($id);
        $pbx->Active = '0';
        $pbx->update();
        
        return Redirect::to('pbx/list');
    }
}
