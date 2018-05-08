@extends('backend.layouts.app')

@section('htmlheader_title')
	Accesos

@endsection
@section('contentheader_title')
     Editar Usuario 
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
        
        {!!Form::open(array('url'=> 'users/update', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="name">Nombre y Apellido</label>
        	<input type="text" name="name" class="form-control" placeholder="Nombre..." value="{{$user->name}}">
        </div>
        
        <div class="form-group">
        	<label for="username">Usuario</label><br>
        	<input type="text" name="username" min="1" class="form-control" placeholder="Nombre de Usuario" value="{{$user->username}}">
        </div>
        
        <div class="form-group">
        	<label for="email">E-mail</label>
        	<input type="text" name="email" class="form-control" placeholder="E-mail..." value="{{$user->email}}">
        </div>
        
        <div class="form-group">
        	<label for="password">Password</label>
        	<input id="password" type="password" class="form-control" name="password" value="{{$user->password}}" required>
        </div>
        
        <div class="form-group">
        	<label for="password-confirm">Confirmar Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$user->password}}" required>
        </div>
               
        <div class="form-group">
             <label for="nombre">Rol</label> 
             <select name="role" class="form-control">
             @foreach ($roles as $role)
                @if ($role->id == $rol) 
                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                @else 
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endif           
             @endforeach
             </select>
        </div>
        
         <div class="form-group" style="float: right;">
            <input type="hidden" name="id" class="form-control" value="{{$user->id}}">
        </div>
        
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('users/list')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>



@endsection
@section('custom-scripts')

@endsection