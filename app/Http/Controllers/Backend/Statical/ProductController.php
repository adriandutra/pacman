<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\Backend\ProductFormRequest;
use DB;

class ProductController extends Controller
{
    public function getList()
    {
        $product = Product::getServerActiveId();
        return view('backend.products.index', ['product' => $product]);
    }
    
    public function getCreate()
    {
        return view('backend.products.create');
    }
    
    public function getEdit($id)
    {
        return view('backend.products.edit', ['product' => Product::findOrFail($id)]);
    }
    
    public function getDelete()
    {
        return view('backend.products.delete');
    }   
    
    public function postStore(ProductFormRequest $request)
    {
        $product                = new Product;
        $product->Description   = $request->get('Description');
        $product->Active        = '1';
        $product->save();
        
        return Redirect::to('products/list');
    }
    
    public function postUpdate(ProductFormRequest $request)
    {
        $product                = Product::findOrFail($request->get('ID_Product'));
        $product->Description   = $request->get('Description');
        $product->update();
        
        return Redirect::to('products/list');
    }
    
    public function postDestroy($id)
    {
        $product = Product::findOrFail($id);
        $product->Active = '0';
        $product->update();
        
        return Redirect::to('products/list');
    }
}
