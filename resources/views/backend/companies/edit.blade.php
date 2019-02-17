@extends('backend.layouts.app')

@section('htmlheader_title')
	Crear Compa&ntilde;&iacute;a

@endsection
@section('contentheader_title')
     Editar Compa&ntilde;&iacute;a {{$company->Descripcion}}
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
        
        {!!Form::open(array('url'=> 'companies/update', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Descripci&oacute;n</label>
        	<input type="text" name="description" class="form-control" value="{{$company->Descripcion}}">
        </div>        
        
        <div class="form-group">
        	<label for="nombre">Base de Datos</label>
            <input type="text" name="database" class="form-control" value="{{$company->Database}}">
        </div>
        
        <div class="form-group" style="float: right;">
            <input type="hidden" name="ID_Company" class="form-control" value="{{$company->ID_Company}}">
        </div>
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('companies/companies')}}" ><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection