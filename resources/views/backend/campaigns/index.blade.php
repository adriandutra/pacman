@extends('backend.layouts.app')

@section('htmlheader_title')
	Campa&ntilde;as

@endsection
@section('contentheader_title')
    <i class="fa fa-share-square"></i>  Listado de Campa&ntilde;as
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
                <th style="float:true;vertical-align:middle">NameFact</th>
                <th style="float:true;vertical-align:middle">Neotel</th>
                <th style="float:true;vertical-align:middle">PBX</th>
                <th style="float:true;vertical-align:middle">Prepend</th> 
                <th style="float:true;vertical-align:middle">Cuenta</th>
                <th style="float:true;vertical-align:middle">CRM</th>
                <th style="float:true;vertical-align:middle">GroupFact</th>
                <th style="float:true;vertical-align:middle">Fecha</th>
                <th style="float:true;vertical-align:middle">Accion</th>
                <th style="float:true;vertical-align:middle">Opcion</th>               
             </tr>          
             </thead>
             <tbody></tbody>
             @foreach ($campaign as $camp)
               @include('backend.campaigns.modal')
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

var url = "{{url('api/v1/campaigns') }}";
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
			 { "data": "namefact",  orderable: false},
		 	 { "data": "neotel", orderable: false},
		 	 { "data": "pbx_name", orderable: false},
		 	 { "data": "prepend", orderable: false},
		 	 { "data": "account_name", orderable: false},
		 	 { "data": "crm_name", orderable: false},
		 	 { "data": "group_fact", orderable: false},
		 	 { "data": "date", orderable: false},
		 	 { "data": "action", orderable: false},
		 	 { "data": "op", orderable: false}
		 ]
	});
	}
	
	$(document).ready(function(){
         
	    loadData();
	})

</script>

@endsection
