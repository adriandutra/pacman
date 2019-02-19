@extends('backend.layouts.app')

@section('htmlheader_title')
	Paridad Cuentas

@endsection
@section('contentheader_title')
     Crear Paridad Cuenta 
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
        
        {!!Form::open(array('url'=> 'accountant/store', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Compa&ntilde;&iacute;a</label>
        	<input type="text" name="compania" disabled class="form-control" value="{{$datos->company}}">
        </div>
        
        <div class="form-group">
        	<label for="nombre">C&oacute;digo Cuenta</label>
        	<input type="text" name="codigo" disabled class="form-control" value="{{$datos->code}}">
        </div>
        
         <div class="form-group">
        	<label for="nombre">Cuenta</label>
        	<input type="text" name="cuenta" disabled class="form-control" value="{{$datos->cuenta}}">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Nodos Contables</label><br/>
        	<select class="form-control" name="ID_NodosContables" id="ID_NodosContables">
        	   <option value="">[Seleccione Nodo]</option>
        	   @if (isset($nodes))
        	       @foreach ($nodes as $node)
        	            <option value="{{$node->ID_NodosContables}}">{{$node->Descripcion}}</option>
        	       @endforeach
        	   @endif
        	</select>
        </div>         
        
        <div class="form-group" style="float: right;">
            <input type="hidden" name="ID_Company" class="form-control" value="{{$datos->ID_Company}}">
            <input type="hidden" name="ID_Cuenta" class="form-control" value="{{$datos->ID_Cuenta}}">
        </div>
        
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('assistant/index')}}" ><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection