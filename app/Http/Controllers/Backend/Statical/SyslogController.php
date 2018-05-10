<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller; 
use App\Models\Syslog;
use Carbon\Carbon;
use App\Http\Requests\Backend\ServerFormRequest;
use DB;

class SyslogController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getList()
    {
        $now      = Carbon::now();
        $lastmonth = Carbon::now()->subMonth();
        
        $syslog = DB::table('Syslogs')
                  ->Select(DB::raw('Fecha as date'))
                  ->Where('ACK', 1)
                  ->WhereBetween('Fecha', [$lastmonth, $now])
                  ->OrderBy('Fecha', 'ASC')
                  ->get();
        
        return view('backend.syslog.index', ['syslog' => $syslog]);
    }
    
    public function getHistory()
    {
        $now      = Carbon::now();
        $lastmonth = Carbon::now()->subMonth();
        
        $syslog = DB::table('Syslogs')
                  ->Select(DB::raw('Fecha as date'))
                  ->Where('ACK', 1)
                  ->WhereBetween('Fecha', [$lastmonth, $now])
                  ->OrderBy('Fecha', 'ASC')
                  ->get();
        
        return view('backend.syslog.history', ['syslog' => $syslog]);
    }
    
    
    public function postDestroy($id)
    {
        $syslog = Syslog::findOrFail($id);
        $syslog->ACK = '1';
        $syslog->update();
        
        return Redirect::to('syslog/list');
    }
}
