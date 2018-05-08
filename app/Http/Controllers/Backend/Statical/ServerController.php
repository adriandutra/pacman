<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\Server;
use App\Http\Requests\Backend\ServerFormRequest;
use DB;


class ServerController extends Controller
{
    //
    
    public function getList()
    {   
        $server = Server::getServerActiveId();
        return view('backend.servers.index', ['server' => $server]);
    }
    
    public function getCreate()
    {
        return view('backend.servers.create');
    }       
    
    public function getEdit($id)
    {  
        return view('backend.servers.edit', ['server' => Server::findOrFail($id)]);
    }
    
    public function getDelete()
    {
        return view('backend.servers.delete');
    }
    
    
    
    public function postStore(ServerFormRequest $request)
    {
        $server                = new Server;
        $server->Name          = $request->get('Name');
        $server->Island_Number = $request->get('Island_Number');
        $server->URI           = $request->get('URI');
        $server->DB_connection = $request->get('DB_connection');
        $server->Active        = 1;
        $server->save();
        
        return Redirect::to('servers/list');
    }
    
    public function postUpdate(ServerFormRequest $request)
    {
        $server                = Server::findOrFail($request->get('ID_CRM_Server'));
        $server->Name          = $request->get('Name');
        $server->Island_Number = $request->get('Island_Number');
        $server->URI           = $request->get('URI');
        $server->DB_connection = $request->get('DB_connection');
        $server->Active        = 1;
        $server->update();
        
        return Redirect::to('servers/list');
    }
    
    public function postDestroy($id)
    {
        $server = Server::findOrFail($id);
        $server->Active = '0';
        $server->update();
        
        return Redirect::to('servers/list');
    }
}
