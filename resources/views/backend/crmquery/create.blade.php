@extends('backend.layouts.app')

@section('htmlheader_title')
	CRM Query

@endsection
@section('contentheader_title')
     Editar Consultas {{$crmquery->Name}}
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
        
        {!!Form::open(array('url'=> 'crmquery/store', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" name="Name" class="form-control" value="{{$server->Name}}">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Numero de Isla</label><br>
        	<input type="number" name="Island_Number" min="1" value="{{$server->Island_Number}}">
        </div>
        
        <div class="form-group">
        	<label for="nombre">URI</label>
        	<input type="text" name="URI" class="form-control" value="{{$server->URI}}">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Conexi&oacute;n de Base de Datos</label>
        	<input type="text" name="DB_connection" class="form-control" value="{{$server->DB_connection}}">
        </div>
        
        <div class="form-group">        
        	<label for="nombre">Activar&nbsp;&nbsp;<input type="checkbox" name="Active" id="active" value="{{$server->Active}}" CHECKED></label>
        </div>
        <div class="form-group" style="float: right;">
            <input type="hidden" name="ID_CRM_Server" class="form-control" value="{{$server->ID_CRM_Server}}">
        </div>
        
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('crmquery/list')}}"><button class="btn btn-danger">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection
