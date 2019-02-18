<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AccountFormRequest;
use DB;

class AccountantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getList()
    {
        return view('backend.accountant.index');
    }
    
    public function getCreate()
    {
        return view('backend.accountant.create');
    }
    
}
