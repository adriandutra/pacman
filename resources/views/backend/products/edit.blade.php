@extends('backend.layouts.app')

@section('htmlheader_title')
	Productos

@endsection
@section('contentheader_title')
     Editar Producto {{$product->Name}}
@endsection

@section('content')



<div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       @if (count($errors) > 0)
       <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach  
          </ul>
        </div>
        @endif
        
        {!!Form::open(array('url'=> 'products/update', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Descripci&oacute;n</label>
        	<input type="text" name="Description" class="form-control" value="{{$product->Description}}">
        </div>        
        
        <div class="form-group" style="float: right;">
            <input type="hidden" name="ID_Product" class="form-control" value="{{$product->ID_Product}}">
        </div>
        
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('products/list')}}" ><button class="btn btn-danger">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection