<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\GroupFormRequest;
use App\Models\Group;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getList()
    {   
        $groups = Group::get();
        return view('backend.groups.groups', ['groups' => $groups]);
    }
    
    public function getCreate()
    {
        return view('backend.groups.create');
    }
    
    public function getEdit($id)
    {
        $group = Group::findOrFail($id);
        return view('backend.groups.edit', ['group' => $group]);
    }
    
    public function getDelete()
    {
        return view('backend.groups.delete');
    }
    
    public function postStore(GroupFormRequest $request)
    {
        $group                     = new Group;
        $group->Descripcion        = $request->get('Descripcion');
        $group->save();
        
        return Redirect::to('groups/groups');
    }
    
    public function postUpdate(GroupFormRequest $request)
    {
        
        $group                = Group ::findOrFail($request->get('ID_GAux'));
        $group->Descripcion   = $request->get('Descripcion');
        $group->update();
        
        return Redirect::to('groups/groups');
    }
    
    public function postDestroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        
        return Redirect::to('groups/groups');
    }
    
}
