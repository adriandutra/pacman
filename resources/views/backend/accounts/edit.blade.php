@extends('backend.layouts.app')

@section('htmlheader_title')
	Cuentas

@endsection
@section('contentheader_title')
     Editar Cuenta {{$accounts->name}}
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
        
        {!!Form::open(array('url'=> 'accounts/update', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" name="Name" class="form-control" value="{{$accounts->Name}}" placeholder="Nombre...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Start Cycle</label><br>
        	<input type="text" name="Start_Cycle" class="form-control" value="{{$accounts->Start_Cycle}}" placeholder="Start Cycle...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">End Cycle</label>
        	<input type="text" name="End_Cycle" class="form-control" value="{{$accounts->End_Cycle}}" placeholder="End Cycle...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Cycle</label>
        	<input type="text" name="Cycle" class="form-control" value="{{$accounts->Cycle}}" placeholder="Cycle...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">CDR</label>
        	<input type="text" name="CDR" class="form-control" value="{{$accounts->CDR}}" placeholder="CDR...">
        </div>
        
        <div class="form-group">
        	<label for="nombre">CPP</label>
        	<input type="text" name="CPP" class="form-control" value="{{$accounts->CPP}}" placeholder="CPP...">
        </div>
                
        <div class="form-group">
             <label for="nombre">Sales Rates</label> 
             <select name="ID_Sales_Rates" class="form-control">
             <option value="" disabled selected>Seleccione una opci&oacute;n</option>                          	
             @foreach ($sales as $sal)
                @if ($sal->id == $accounts->ID_Sales_Rates) 
                <option value="{{$sal->id}}" selected>{{$sal->name}}</option>
                @else                 
                <option value="{{$sal->id}}">{{$sal->name}}</option>
                @endif
             @endforeach
             </select>
        </div>
        <div class="form-group" style="float: right;">
            <input type="hidden" name="acc_id" class="form-control" value="{{$accounts->acc_id}}">
        </div>
        
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('accounts/list')}}" ><button class="btn btn-danger">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection
