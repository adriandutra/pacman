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


class UserController extends Controller
{
    
    public function getList()
    {
        try {
            
            $users = DB::table('users as u')
                       ->Select(DB::raw('u.id as id
                                         ,u.name as name
                                         ,u.email as email
                                         ,u.username as username
                                         ,r.description as role
                                         ,CONCAT(\'<a href="edit/\',u.id,\'"><i class="fa fa-edit"></i></a>\', \' \', \'<a href="" data-target="#modal-delete-\',u.id,\'" data-toggle="modal"><i class="fa fa-trash"></i></a>\') as op'))
                       ->join('role_user as ru', 'ru.user_id', '=', 'u.id')
                       ->join('roles as r', 'r.id', '=', 'ru.role_id')
                       ->get();
            
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Users Table';
            $r->data = $users;
            return $r->doResponse();
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
}
