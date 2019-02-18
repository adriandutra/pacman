<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CompanyFormRequest;
use App\Models\Company;


class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getList()
    {
        $companies = Company::getCompanyActiveId();
        return view('backend.companies.companies', ['companies' => $companies]);
    }
    
    public function getCreate()
    {
        return view('backend.companies.create');
    }
    
    public function getEdit($id)
    {
        $company = Company::findOrFail($id);
        return view('backend.companies.edit', ['company' => $company]);
    }
    
    public function getDelete()
    {
        return view('backend.campanies.delete');
    }
    
  
    public function postStore(CompanyFormRequest $request)
    {
        $company                     = new Company;
        $company->Descripcion        = $request->get('Descripcion');
        $campaign->Database          = $request->get('Database');
        $campaign->Active            = '1';
        $campaign->save();
        
        return Redirect::to('companies/companies');
    }

    public function postUpdate(CompanyFormRequest $request)
    {
        
        $company                = Company ::findOrFail($request->get('ID_Company'));
        
        $company->Descripcion   = $request->get('Descripcion');
        $company->Database      = $request->get('Database');
        
        $company->update();
        
        return Redirect::to('companies/companies');
    }
    
    public function postDestroy($id)
    {
        $company = Company::findOrFail($id);
        $company->Active = '0';
        $company->update();
        
        return Redirect::to('companies/companies');
    }
}
