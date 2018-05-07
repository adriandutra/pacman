@extends('backend.layouts.app')

@section('htmlheader_title')
	PBX

@endsection
@section('contentheader_title')
   <i class="fa fa-th"></i>  Listado de PBX
@endsection

@section('content')



<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="responsive">
           <table class="table table-striped table-bordered table-hover ui-datatable" id="dataList" style="width:100%">
             <thead>
              <tr > 
                <th>Id</th>
                <th>Nombre</th>
                <th>URI</th>
                <th>Ubicaci&oacute;n</th>
                <th>Carpeta</th>
                <th>Archivo</th> 
                <th>Conexi&oacute;n</th>
                <th>Tipo</th>
                <th>Dependencia</th>
                <th>Servidor CRM</th> 
                <th>Accion</th>               
             </tr>          
             </thead>
             <tbody></tbody>
             @foreach ($pbx as $p)
               @include('backend.pbx.modal')
             @endforeach 
           </table>
        </div>
   </div>
</div>



@endsection
@section('custom-scripts')

<script>

var url = "{{url('api/v1/pbx') }}";
var editor;

function loadData() {
	var oTable = $('#dataList').DataTable({
		"dom": '<"toolbar">frtip',
		 processing: true,
		 serverSide: false,
		 "bDestroy": true,
	  // scrollResize: true,
 	  // scrollX: true,
	  // scrollY: 200,
	  // scrollCollapse: true,
	  // select: 'single',     // enable single row selection
      // responsive: true,     // enable responsiveness
      // altEditor: true,
		 searching: true,
		 paging: true,
		 lengthChange: true,
		 'language': {"paginate": {
             "previous": "Anterior",
             "next": "Siguiente",
             },
		     "search": "Buscar",
		     "zeroRecords": "No hay registros",
	         "info": "Mostrando pagina _PAGE_ de _PAGES_",
	         "infoEmpty": "No hay registros diponibles"
         },
		 ajax: {
				url: url + "/list"
		 },
		 columns: [
		     { "data": "id"},
			 { "data": "name", orderable: false},
			 { "data": "uri",  orderable: false},
		 	 { "data": "location", orderable: false},
		 	 { "data": "folder", orderable: false},
		 	 { "data": "filename", orderable: false},
		 	 { "data": "connection", orderable: false},
		 	 { "data": "type", orderable: false},
		 	 { "data": "depend", orderable: false},
		 	 { "data": "server", orderable: false},
		 	 { "data": "op", orderable: false}
		 ]
	});
	}
	
	$(document).ready(function(){
         
	    loadData();
	})

</script>

@endsection