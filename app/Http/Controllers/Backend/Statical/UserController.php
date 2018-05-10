<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Backend\UserFormRequest;
use DB;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getList(Request $request)
    {
        $users = User::all();
        
        return view('backend.users.index', ['users' => $users]);
    }
    
    public function getCreate()
    {

        $roles = DB::table('roles')
                    ->select(DB::raw('id as id, description as name'))
                    ->get();
        
        return view('backend.users.create', ['roles' => $roles]);
    }
    
    public function getEdit($id)
    {
        $rol  = DB::table('role_user')
                    ->select(DB::raw('role_id as id'))                    
                    ->where('user_id', $id)
                    ->first();

        $roles = DB::table('roles')
                    ->select(DB::raw('id as id, description as name'))
                    ->get();
        
        return view('backend.users.edit', ['user' => User::findOrFail($id), 'roles' => $roles,'rol' => $rol->id]);
    }
    
    public function getDelete()
    {
        return view('backend.users.delete');
    }
    
    
    
    public function postStore(UserFormRequest $request)
    {
        $role_id               = $request->get('role');
        
        $user                  = new User;        
        $user->name            = $request->get('name');
        $user->username        = $request->get('username');
        $user->email           = $request->get('email');
        $user->password        = encrypt($request->get('password'));       

        $user->save();
        
        $rol = Role::where('id', '=', $role_id)->first();
        $user->roles()->attach($rol->id);

        
        return Redirect::to('users/list');
    }
    
    public function postUpdate(UserFormRequest $request)
    {
        $role_id               = $request->get('role');
        
        $user                  = User::findOrFail($request->get('id'));
        $user->name            = $request->get('name');
        $user->username        = $request->get('username');
        $user->email           = $request->get('email');       


        $user->roles()->sync([$role_id]);
        $user->update();
                
        return Redirect::to('users/list');
    }
    
    public function postDestroy($id)
    {
                
        $user = User::find($id);
        $user->forceDelete();
        $user->roles()->detach();
        
        return Redirect::to('users/list');
    }
}
