@extends('backend.layouts.app')

@section('htmlheader_title')
	Paridad Grupos Auxiliares

@endsection
@section('contentheader_title')
     Editar Paridad Grupo Auxiliar
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
        
        {!!Form::open(array('url'=> 'assistant/update', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Compa&ntilde;&iacute;a</label>
        	<input type="text" name="compania" disabled class="form-control" value="{{$datos->company}}">
        </div>
        
        <div class="form-group">
        	<label for="nombre">C&oacute;digo Auxiliar</label>
        	<input type="text" name="codigo" disabled class="form-control" value="{{$datos->code}}">
        </div>
        
         <div class="form-group">
        	<label for="nombre">Auxiliar</label>
        	<input type="text" name="auxiliar" disabled class="form-control" value="{{$datos->auxiliar}}">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Grupo Auxiliar</label><br/>
        	<select class="form-control" name="ID_GAux" id="ID_GAux">
        	   <option value="">[Seleccione Grupo]</option>
        	   @if (isset($groups))
        	       @foreach ($groups as $group)
        	          @if($group->ID_GAux == $datos->ID_GAux )
        	            <option value="{{$group->ID_GAux}}" SELECTED>{{$group->Descripcion}}</option>
        	          @else  
        	            <option value="{{$group->ID_GAux}}">{{$group->Descripcion}}</option>
        	          @endif
        	       @endforeach
        	   @endif
        	</select>
        </div>         
        
        <div class="form-group" style="float: right;">
            <input type="hidden" name="ID_Company" class="form-control" value="{{$datos->ID_Company}}">
            <input type="hidden" name="ID_Auxiliar" class="form-control" value="{{$datos->ID_Auxiliar}}">
        </div>
        
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('assistant/list')}}" ><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection