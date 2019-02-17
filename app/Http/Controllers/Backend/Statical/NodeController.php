<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NodeFormRequest;
use App\Models\Node;
use App\Models\Company;


class NodeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getList()
    {
        $nodes = Node::get();
        return view('backend.nodes.nodes', ['nodes' => $nodes]);
    }
    
    public function getCreate()
    {   
        $companies =  Company::get();
        return view('backend.nodes.create', ['companies' => $companies]);
    }
    
    public function getEdit($id)
    {
        $node = Node::findOrFail($id);
        $companies =  Company::where('active', 1)->get();
        return view('backend.nodes.edit', ['node' => $node, 'companies' => $companies]);
    }
    
    public function getDelete()
    {
        return view('backend.nodes.delete');
    }
    
    public function postStore(NodeFormRequest $request)
    {
        $node                     = new Node;
        $node->Descripcion        = $request->get('Descripcion');
        $node->ID_Company         = $request->get('company');
        $node->save();
        
        return Redirect::to('nodes/nodes');
    }
    
    public function postUpdate(NodeFormRequest $request)
    {
        
        $node                = Node ::findOrFail($request->get('ID_NodosContables'));
        $node->Descripcion   = $request->get('Descripcion');
        $node->ID_Company    = $request->get('company');
        $node->update();
        
        return Redirect::to('nodes/nodes');
    }
    
    public function postDestroy($id)
    {
        $node = Node::findOrFail($id);
        $node->delete();
        
        return Redirect::to('nodes/nodes');
    }
    
}
