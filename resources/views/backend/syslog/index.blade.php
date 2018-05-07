@extends('backend.layouts.app')

@section('htmlheader_title')
	 Syslog

@endsection
@section('contentheader_title')
   <i class="fa fa-archive"></i>  Syslog
@endsection

@section('content')

<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="responsive">
           <table class="table table-striped table-bordered table-hover ui-datatable" id="dataList" style="width:100%">
             <thead>
             <tr> 
                <th>Fecha</th>
                <th>Detalle</th>
                <th>Programa</th>
                <th>Accion</th>
              </tr>         
             </thead>
             <tbody></tbody>
             @foreach ($syslog as $sys)
               @include('backend.syslog.modal')
             @endforeach 
           </table>
        </div>
   </div>
</div>

@endsection
@section('custom-scripts')

<style>
th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
 
    div.container {
        width: 80%;
    }
</style>

<script>

var url = "{{url('api/v1/syslog') }}";
var editor;

function loadData() {
	var oTable = $('#dataList').removeAttr('width').DataTable({
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
	         "infoEmpty": "No hay registros diponibles",
         },
		 ajax: {
				url: url + "/list"
		 },
		 scrollY:        "500px",
	     scrollX:        true,
	     scrollCollapse: true,
		 "columnDefs": [
			    { "width": "200", "targets": 0 }
	     ],	     
	     fixedColumns: true,
	     columns: [
		     { "data": "date"},
			 { "data": "detail", orderable: false},
			 { "data": "program", orderable: false},
			 { "data": "op", orderable: false}
		  ],
		  "order": [[ 0, "desc" ]]	 
	});
	}
	
	$(document).ready(function(){
         
	    loadData();
	})

</script>

@endsection


