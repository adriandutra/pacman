<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AccountantFormRequest;
use App\Models\Accountant;
use App\Models\Node;
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
    
    public function getListParity()
    {
        $accountants = DB::table('PacManContable.dbo.Parity_NodoContable as a')
                        ->Select(DB::raw('CONCAT(a.ID_Company,\'-\' , a.ID_CUENTA,\'-\' ,a.ID_NodosContables) as ID'))
                        ->get();
        
        return view('backend.accountant.list', ['accountants' => $accountants]);
    }
    
    public function getCreate($id)
    {
        $datos  = DB::table('PacmanContable.dbo.Cuenta as a')
                       ->Select(DB::raw('a.ID_CUENTA as ID_Cuenta
                                         ,a.COD_CUENTA as code
                                         ,a.DESC_CUENTA  as cuenta
                                         ,c.ID_Company as ID_Company
                                         ,c.Descripcion as company'))
                       ->join('PacmanContable.dbo.Company as c','c.ID_Company','=','a.ID_Company')
                       ->Where('a.HABILITADO', 'S')
                       ->Where('a.ID_CUENTA', $id)
                       ->first();
                                         
        $nodes = DB::table('PacManContable.dbo.NodosContables as a')
                     ->Select(DB::raw('a.ID_NodosContables as ID_NodosContables
                                      , a.Descripcion as Descripcion'))
                     ->join('PacmanContable.dbo.Company as c', 'c.ID_Company', '=', 'a.ID_Company')
                     ->where('c.Active', 1)
                     ->get();
                                         
        return view('backend.accountant.create', ['datos' => $datos, 'nodes' => $nodes]);
    }
    
    public function getEdit($id)
    {
        $response = explode('-', $id);
        
        $id_company  =$response[0];
        $id_cuenta   =$response[1];
        $id_node     =$response[2];
        
        $datos  = DB::table('PacmanContable.dbo.Cuenta as a')
                      ->Select(DB::raw('a.ID_CUENTA as ID_Cuenta
                                         ,a.COD_CUENTA as code
                                         ,a.DESC_CUENTA  as cuenta
                                         ,c.ID_Company as ID_Company
                                         ,'. $id_node .' as ID_NodosContables
                                         ,c.Descripcion as company'))
                      ->join('PacmanContable.dbo.Company as c','c.ID_Company','=','a.ID_Company')
                      ->Where('a.HABILITADO', 'S')
                      ->Where('a.ID_CUENTA', $id_cuenta)
                      ->Where('c.ID_Company', $id_company)
                      ->first();
                                         
         $nodes = DB::table('PacManContable.dbo.NodosContables as a')
                      ->Select(DB::raw('a.ID_NodosContables as ID_NodosContables
                                      , a.Descripcion as Descripcion'))
                      ->join('PacmanContable.dbo.Company as c', 'c.ID_Company', '=', 'a.ID_Company')
                      ->where('c.Active', 1)
                      ->get();
         
         return view('backend.accountant.edit', ['datos' => $datos, 'nodes' => $nodes]);
    }
    
    public function getDelete()
    {
        return view('backend.assistant.delete');
    }
    
    public function postStore(AccountantFormRequest $request)
    {
        $parity                     = new Accountant();
        $parity->ID_CUENTA          = $request->get('ID_Cuenta');
        $parity->ID_Company         = $request->get('ID_Company');
        $parity->ID_NodosContables  = $request->get('ID_NodosContables');
        $parity->save();
        
        return Redirect::to('accountant/index');
    }
    
    public function postUpdate(AccountantFormRequest $request)
    {
        
        $parity =  Accountant::where('ID_CUENTA', $request->get('ID_Cuenta'))
                              ->where('ID_Company', $request->get('ID_Company'))
                              ->update(['ID_NodosContables' => $request->get('ID_NodosContables')]);
        
        
        return Redirect::to('accountant/list');
    }
    
    public function postDestroy($id)
    {
        $response = explode('-', $id);
        
        $id_company  =$response[0];
        $id_cuenta   =$response[1];
        $id_nodo     =$response[2];
        
        $parity = Accountant::where('ID_CUENTA', $id_cuenta)
                            ->where('ID_Company', $id_company)
                            ->where('ID_NodosContables', $id_nodo)
                            ->delete();
        
        return Redirect::to('accountant/list');
    }
    
    
}
