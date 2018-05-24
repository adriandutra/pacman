<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AccountFormRequest;
use DB;


class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPad()
    {
        $anio = DB::table('Contact_History')
                 ->select(DB::raw('year(DateTime) as anio'))
                 ->groupBy(DB::raw('year(DateTime)'))
                 ->get();
        

        return view('backend.contact.pad', ['anio' => $anio]);
    }
    
}
