<?php

namespace App\Http\Controllers\Frontend\Statical;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getList()
    {
        return view('frontend.report.index');
    }
}
