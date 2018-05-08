@extends('backend.layouts.app')

@section('htmlheader_title')
	Servidor

@endsection
@section('contentheader_title')
     Nuevo Servidor
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
        
        {!!Form::open(array('url'=> 'servers/store', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" name="Name" class="form-control" placeholder="Nombre...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Numero de Isla</label><br>
        	<input type="number" name="Island_Number" min="1" class="form-control" placeholder="Numero de Isla">
        </div>
        
        <div class="form-group">
        	<label for="nombre">URI</label>
        	<input type="text" name="URI" class="form-control" placeholder="URI...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Conexi&oacute;n de Base de Datos</label>
        	<input type="text" name="DB_connection" class="form-control" placeholder="Conexion...">
        </div>
        
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection