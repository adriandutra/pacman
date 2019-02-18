<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AccountFormRequest;
use DB;

class AssistantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getList()
    {
        return view('backend.assistant.index');
    }
    
    public function getCreate()
    {
        return view('backend.assistant.create');
    }
    
}
