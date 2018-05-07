@extends('backend.layouts.app')

@section('htmlheader_title')
	CRM Query

@endsection
@section('contentheader_title')
  <i class="fa fa-share-alt"></i>  Listado de Consultas
@endsection

@section('content')



<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="responsive">
           <table class="table table-striped table-bordered table-hover ui-datatable" id="dataList" style="width:100%">
             <thead>
              <tr > 
                <th style="float:true;vertical-align:middle" >Id</th>
                <th style="float:true;vertical-align:middle">Nombre</th>
                <th style="float:true;vertical-align:middle">IDCRM_Neotel</th>
                <th style="float:true;vertical-align:middle">Date</th>
                <th style="float:true;vertical-align:middle">Action</th>
                <th style="float:true;vertical-align:middle">Servidor</th> 
                <th style="float:true;vertical-align:middle">Field Documment</th>
                <th style="float:true;vertical-align:middle">SQL Contact</th>
                <th style="float:true;vertical-align:middle">SQL Contact Sales</th>
                <th style="float:true;vertical-align:middle">SQL Contact History</th>
                <th style="float:true;vertical-align:middle">SQL External Contact</th>
                <th style="float:true;vertical-align:middle">SQL Contact Phone</th>
                <th style="float:true;vertical-align:middle">SQL Contact Mail Address</th>
                <th style="float:true;vertical-align:middle">SQL Contact Address</th> 
                <th style="float:true;vertical-align:middle">Accion</th>               
             </tr>          
             </thead>
             <tbody></tbody>
             @foreach ($crmquery as $crm)
               @include('backend.crmquery.modal')
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

var url = "{{url('api/v1/crmquery') }}";
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
		     { "data": "id"},
			 { "data": "name", orderable: false},
			 { "data": "idcrm_neotel",  orderable: false},
		 	 { "data": "date", orderable: false},
		 	 { "data": "action", orderable: false},
		 	 { "data": "server", orderable: false},
		 	 { "data": "field_document", orderable: false},
		 	 { "data": "sql_contact", orderable: false},
		 	 { "data": "sql_contact_sales", orderable: false},
		 	 { "data": "sql_contact_history", orderable: false},
		 	 { "data": "sql_external_contact", orderable: false},
		 	 { "data": "sql_contact_phone", orderable: false},
		 	 { "data": "sql_contact_mailaddress", orderable: false},
		 	 { "data": "sql_contact_address", orderable: false},
		 	 { "data": "op", orderable: false}
		 ]
	});
	}
	
	$(document).ready(function(){
         
	    loadData();
	})

</script>

@endsection
