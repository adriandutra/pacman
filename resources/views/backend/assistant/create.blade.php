@extends('backend.layouts.app')

@section('htmlheader_title')
	Nodos

@endsection
@section('contentheader_title')
     Nuevo Nodo
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
        
        {!!Form::open(array('url'=> 'nodes/store', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Descripci&oacute;n</label>
        	<input type="text" name="Descripcion" class="form-control" placeholder="Descripci&oacute;n...">
        </div>   
        <div class="form-group">
        	<label for="nombre">Compa&ntilde;&iacute;a</label><br/>
        	<select class="form-control" name="company" id="company">
        	   <option value="">[Seleccione Compa&ntilde;ia]</option>
        	   @if (isset($companies))
        	       @foreach ($companies as $company)
        	          <option value="{{$company->ID_Company}}">{{$company->Descripcion}}</option>
        	       @endforeach
        	   @endif
        	</select>
        </div>         
                
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('nodes/nodes')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection
