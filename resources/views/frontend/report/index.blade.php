@extends('frontend.layouts.app')

@section('htmlheader_title')
   Reportes

@endsection
@section('contentheader_title')
   Reportes
@endsection

@section('content')


<div class="row">
  <div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-heading">
		<a class="btn btn-primary" style="" href="/user" >Nuevo</a>
  <div id="toolbar">
	<div class="form-inline" role="form" id="actions_dropmenu">
		<div class="dropdown" style="">
			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Accciones
			<span class="caret"></span></button>
			<ul class="dropdown-menu drop-actions">
				<li style=""><a href="#" data-action="inactive"><i class="glyphicon glyphicon-ban-circle ban-circle" style="color:#d9534f;"></i> Desactivar seleccionado</a></li>
				<li style=""><a href="#" data-action="active"><i class="glyphicon glyphicon-ok icon-ok" style="color:#5cb85c;" ></i> Activar seleccionado</a></li>
				<li style=""><a href="#" data-action="restore"><i class="glyphicon glyphicon-repeat icon-repeat" style="color:#30a5ff;" ></i> Restaurar seleccionado</a></li>
				<li style=""><a href="#" data-action="delete"><i class="glyphicon glyphicon-trash icon-trash" style="color:#30a5ff;"></i> Borrar seleccionado</a></li>
			</ul>		
		</div>
	 </div>
	</div>
</div>

		<div class="panel-body">
			<table class="table-striped"
					data-toggle="table"
					data-url="{{url('api/v1/users/list') }}"
					data-show-refresh="true"
					data-show-toggle="true"
					data-show-columns="true"
					data-search="true"
					data-pagination="true"
					data-page-number="1"
					data-toolbar="#toolbar"
					data-detail-view="false"
					data-mobile-responsive="true"
					data-advanced-search="true"
					data-id-table="advancedTable"
					data-reorderable-columns="true"
					data-show-export="true"
					id="table_data"
					data-click-to-select="false"
					data-cookie="true"
					data-cookie-id-table="users"
					data-resizable="true"
			><thead>
			<tr>
				<th data-checkbox="true" ></th>
				<th data-field="id"  data-sortable="true"  data-align="center">ID</th>
				<th data-field="fullname"  data-sortable="true" data-align="center">Nombre</th>
				<th data-field="user" data-sortable="true" data-align="center">Usuario</th>
				<th data-field="email" data-sortable="true" data-align="center">Email</th>
				<th data-field="expiration_date" data-sortable="true" data-formatter="datelabel" data-align="center">Expira</th>
				<th  data-events="activeEvents" data-field="active" data-sortable="true" data-formatter="activeicon" data-align="center" >Activo</th>
				<th  data-formatter="customicon" data-searchable="false" data-switchable="false" data-align="center">Ingresos</th>
				<th  data-events="actionEvents" data-formatter="actionicons" data-searchable="false" data-switchable="false" data-align="center">Acciones</th>
			</tr>
			</thead>
		</table>		
		</div>
	  </div>
	 </div>
</div><!--/.row-->



@endsection
@section('custom-scripts')

	<script src="{{ asset ('frontend/js/table.control.js')}}"></script>

@endsection

