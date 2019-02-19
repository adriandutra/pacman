<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AssistantFormRequest;
use App\Models\Group;
use App\Models\Assistant;
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
    
    public function getListParity()
    {
        $assistants = DB::table('PacManContable.dbo.Parity_Group_Aux as a')
                           ->Select(DB::raw('CONCAT(a.ID_Company,\'-\' , a.ID_AUXILIAR,\'-\' ,a.ID_GAux) as ID'))
                           ->get();
        
        return view('backend.assistant.list', ['assistants' => $assistants]);
    }
    
    public function getCreate($id)
    {
        $datos  = DB::table('PacmanContable.dbo.Auxiliar as a')
                        ->Select(DB::raw('a.ID_AUXILIAR as ID_Auxiliar
                                         ,a.COD_AUXILIAR as code
                                         ,a.DESC_AUXILIAR  as auxiliar
                                         ,c.ID_Company as ID_Company
                                         ,c.Descripcion as company'))
                        ->join('PacmanContable.dbo.Company as c','c.ID_Company','=','a.ID_Company')
                        ->Where('a.HABILITADO', 'S')
                        ->Where('a.ID_AUXILIAR', $id)
                        ->first();
        
        $groups = Group::get();
        
        return view('backend.assistant.create', ['datos' => $datos, 'groups' => $groups]);
    }
    
    public function getEdit($id)
    {
        $response = explode('-', $id);
        
        $id_company  =$response[0];
        $id_auxiliar =$response[1];
        $id_group    =$response[2]; 
        
        $datos  = DB::table('PacmanContable.dbo.Auxiliar as a')
                   ->Select(DB::raw('a.ID_AUXILIAR as ID_Auxiliar
                                         ,a.COD_AUXILIAR as code
                                         ,a.DESC_AUXILIAR  as auxiliar
                                         ,c.ID_Company as ID_Company
                                         ,'. $id_group .' as ID_GAux
                                         ,c.Descripcion as company'))
                   ->join('PacmanContable.dbo.Company as c','c.ID_Company','=','a.ID_Company')
                   ->Where('a.HABILITADO', 'S')
                   ->Where('a.ID_AUXILIAR', $id_auxiliar)
                   ->Where('c.ID_Company', $id_company)
                   ->first();
                                         
         $groups = Group::get();
         return view('backend.assistant.edit', ['datos' => $datos, 'groups' => $groups]);
    }
   
    public function getDelete()
    {
        return view('backend.assistant.delete');
    }
    
    public function postStore(AssistantFormRequest $request)
    {
        $parity                   = new Assistant();
        $parity->ID_Auxiliar      = $request->get('ID_Auxiliar');
        $parity->ID_Company       = $request->get('ID_Company');
        $parity->ID_GAux          = $request->get('ID_GAux');
        $parity->save();
        
        return Redirect::to('assistant/index');
    }
   
    public function postUpdate(AssistantFormRequest $request)
    {
        
        $parity =  Assistant::where('ID_Auxiliar', $request->get('ID_Auxiliar'))
                            ->where('ID_Company', $request->get('ID_Auxiliar'))
                            ->update(['ID_GAux' => $request->get('ID_GAux')]);
        
        
        return Redirect::to('assistant/list');
    }
    
    public function postDestroy($id)
    {
        $response = explode('-', $id);
        
        $id_company  =$response[0];
        $id_auxiliar =$response[1];
        $id_group    =$response[2]; 
        
        $parity = Assistant::where('ID_Auxiliar', $id_auxiliar)
                           ->where('ID_Company', $id_company)
                           ->where('ID_GAux', $id_group)
                           ->delete();
        
        return Redirect::to('assistant/list');
    }
}
