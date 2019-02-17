@extends('backend.layouts.app')

@section('htmlheader_title')
	 Grupos

@endsection
@section('contentheader_title')
     Editar Grupo {{$group->Descripcion}}
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
        
        {!!Form::open(array('url'=> 'groups/update', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Descripci&oacute;n</label>
        	<input type="text" name="Descripcion" class="form-control" value="{{$group->Descripcion}}">
        </div>        
        
        <div class="form-group" style="float: right;">
            <input type="hidden" name="ID_GAux" class="form-control" value="{{$group->ID_GAux}}">
        </div>
        
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('groups/groups')}}" ><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection