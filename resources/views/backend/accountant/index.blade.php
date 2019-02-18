@extends('backend.layouts.app')

@section('htmlheader_title')
	Paridad Cuentas

@endsection
@section('contentheader_title')
    <i class="fa fa-share-square"></i>  Listado de Cuentas
@endsection

@section('content')



<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="responsive">
           <table class="table table-striped table-bordered table-hover ui-datatable" id="dataList" style="width:100%">
             <thead>
              <tr > 
                <th style="float:true;vertical-align:middle" >Id</th>
                <th style="float:true;vertical-align:middle">C&oacute;digo</th>
                <th style="float:true;vertical-align:middle">Descripci&oacute;n</th>
                <th style="float:true;vertical-align:middle">Compa&ntilde;&iacute;a</th>
                <th style="float:true;vertical-align:middle">Acci&oacute;n</th>             
             </tr>          
             </thead>
             <tbody></tbody>
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

var url = "{{url('api/v1/accountant') }}";
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
			 { "data": "code", orderable: false},
		     { "data": "description", orderable: false},
		     { "data": "company", orderable: false},
		     { "data": "op", orderable: false}
		 ]
	});
	}
	
	$(document).ready(function(){
         
	    loadData();
	})

</script>

@endsection
