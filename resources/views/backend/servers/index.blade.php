@extends('backend.layouts.app')

@section('htmlheader_title')
	Servidores

@endsection
@section('contentheader_title')
   <i class="fa fa-laptop"></i>  Listado de Servidores
@endsection

@section('content')

<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="responsive">
           <table class="table table-striped table-bordered table-hover ui-datatable" id="dataList" style="width:100%">
             <thead>
             <tr> 
                <th>Id</th>
                <th>Nombre</th>
                <th>Nro. Isla</th>
                <th>URI</th> 
                <th>Conexi&oacute;n</th>
                <th>Accion</th>
              </tr>         
             </thead>
             <tbody></tbody>
             @foreach ($server as $ser)
               @include('backend.servers.modal')
             @endforeach 
           </table>
        </div>
   </div>
</div>

@endsection
@section('custom-scripts')

<script>

var url = "{{url('api/v1/servers') }}";

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
         responsive: true,     // enable responsiveness
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
	         "infoEmpty": "No hay registros diponibles",
         },
		 ajax: {
				url: url + "/list"
		 },
		 columns: [
		     { "data": "id"},
			 { "data": "name", orderable: false},
			 { "data": "island", orderable: false},
			 { "data": "uri",  orderable: false},
			 { "data": "connection", orderable: false},
			 { "data": "op", orderable: false}
		  ]	 
	});
	}
	
	$(document).ready(function(){
	    loadData();
	})

</script>

@endsection

