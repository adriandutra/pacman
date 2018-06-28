@extends('backend.layouts.app')

@section('htmlheader_title')
	Campa&ntilde;a

@endsection
@section('contentheader_title')
     Editar Campa&ntilde;a {{$campaign->name}}
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
        
        {!!Form::open(array('url'=> 'campaigns/update', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" name="Name" class="form-control" value="{{$campaign->Name}}">
        </div>
        
        <div class="form-group">
        	<label for="nombre">PBX</label><br>
        	<select name="pbx_id" class="form-control">
        	 <option value="" selected>Seleccione una opci&oacute;n</option>
        	 @foreach ($pbx as $p)
                @if ($p->id == $campaign->pbx_id) 
                <option value="{{$p->id}}" selected>{{$p->name}}</option>
                @else 
                <option value="{{$p->id}}">{{$p->name}}</option>
                @endif
             @endforeach  
            </select>
        </div>
        
        <div class="form-group">
        	<label for="nombre">CRM</label>
        	<select name="ID_CRM" class="form-control">   
             <option value="" selected>Seleccione una opci&oacute;n</option>
             @foreach ($crm as $c)
                @if ($c->id == $campaign->ID_CRM) 
                <option value="{{$c->id}}" selected>{{$c->name}}</option>
                @else 
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endif
             @endforeach            	
            </select>
        </div>
        
        <div class="form-group">
        	<label for="nombre">Cuenta</label>
        	<select name="acc_id" class="form-control">   
             <option value="" selected>Seleccione una opci&oacute;n</option>
             @foreach ($account as $cu)
                @if ($cu->id == $campaign->acc_id) 
                <option value="{{$cu->id}}" selected>{{$cu->name}}</option>
                @else 
                <option value="{{$cu->id}}">{{$cu->name}}</option>
                @endif
             @endforeach            	
            </select>
        </div>
        
        <div class="form-group" style="float: right;">
            <input type="hidden" name="ID_Campaign" class="form-control" value="{{$campaign->ID_Campaign}}">
        </div>
        
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('campaigns/list')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection