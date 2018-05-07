<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Http\Requests\Backend\AccountFormRequest;
use DB;

class AccountController extends Controller
{
    public function getList()
    {
        $account = Account::getServerActiveId();
        
        return view('backend.accounts.index', ['accounts' => $account]);
    }
    
    public function getCreate()
    {
        $sales = DB::table('Sales_Rates')
                    ->select(DB::raw('ID_Sales_Rates as id, Name as name'))
                    ->get();
        
        return view('backend.accounts.create', ['sales' => $sales]);
    }
    
    public function getEdit($id)
    {
        $sales = DB::table('Sales_Rates')
                    ->select(DB::raw('ID_Sales_Rates as id, Name as name'))
                    ->get();
        
        return view('backend.accounts.edit', ['accounts' => Account::findOrFail($id), 'sales' => $sales]);
    }
    
    public function getDelete()
    {
        return view('backend.accounts.delete');
    }
    
    
    
    public function postStore(AccountFormRequest $request)
    {
        $account                 = new Account;
        $account->Name           = $request->get('Name');
        $account->Start_Cycle    = $request->get('Start_Cycle');
        $account->End_Cycle      = $request->get('End_Cycle');
        $account->Cycle          = $request->get('Cycle');
        $account->CDR            = $request->get('CDR');
        $account->CPP            = $request->get('CPP');
        $account->ID_Sales_Rates = $request->get('ID_Sales_Rates');
        $account->Active         = '1';
        $account->save();
        
        return Redirect::to('accounts/list');
    }
    
    public function postUpdate(AccountFormRequest $request)
    {
        $account                 = Account::findOrFail($request->get('acc_id'));
        $account->Name           = $request->get('Name');
        $account->Start_Cycle    = $request->get('Start_Cycle');
        $account->End_Cycle      = $request->get('End_Cycle');
        $account->Cycle          = $request->get('Cycle');
        $account->CDR            = $request->get('CDR');
        $account->CPP            = $request->get('CPP');
        $account->ID_Sales_Rates = $request->get('ID_Sales_Rates');
        $account->update();
        
        return Redirect::to('accounts/list');
    }
    
    public function postDestroy($id)
    {
        $account = Account::findOrFail($id);
        $account->Active = '0';
        $account->update();
        
        return Redirect::to('accounts/list');
    }
}
