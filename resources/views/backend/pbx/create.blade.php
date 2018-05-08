@extends('backend.layouts.app')

@section('htmlheader_title')
	PBX

@endsection
@section('contentheader_title')
     Agregar PBX
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
        
        {!!Form::open(array('url'=> 'pbx/store', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" name="Name" class="form-control" placeholder="Nombre...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">URI</label><br>
        	<input type="text" name="URI" class="form-control" placeholder="URI...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Ubicaci&oacute;n</label>
        	<input type="text" name="Location" class="form-control" placeholder="Ubicaci&oacute;n...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Carpeta</label>
        	<input type="text" name="Folder" class="form-control" placeholder="Carpeta...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Archivo</label>
        	<input type="text" name="FileName" class="form-control" placeholder="Archivo...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Conexi&oacute;n de Base de Datos</label>
        	<input type="text" name="DB_connection" class="form-control" placeholder="Conexion...">
        </div>
        
        <div class="form-group">
        	 <label for="nombre">Tipo</label>
        	 <select name="Type" class="form-control">
        	    <option value="" disabled selected>Seleccione una opci&oacute;n</option>
  				<option value="0">GATEWAY</option>
  			    <option value="1">PBX</option>
  			    <option value="2">GATEWAY_BKP</option>
  			    <option value="3">PBX_BKP</option>
            </select>
        </div>
        
        <div class="form-group">
             <label for="nombre">Dependencia</label> 
             <select name="depend_pbx_id" class="form-control">
             	<option value="" selected>Seleccione una opci&oacute;n</option>
             @foreach ($pbx as $p)
                <option value="{{$p->id}}">{{$p->name}}</option>
             @endforeach
             </select>
        </div>
        
        <div class="form-group">
             <label for="nombre">Servidor CRM</label> 
             <select name="ID_CRM_Server" class="form-control">
             	<option value="" selected>Seleccione una opci&oacute;n</option>
             @foreach ($servers as $server)
                <option value="{{$server->id}}">{{$server->name}}</option>
             @endforeach
             </select>
        </div>
        
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('pbx/list')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection