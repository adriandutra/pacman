@extends('backend.layouts.app')

@section('htmlheader_title')
	Cuentas

@endsection
@section('contentheader_title')
   <i class="fa fa-users"></i>  Listado de Cuentas
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
                <th>Start_Cycle</th>
                <th>End_Cycle</th>
                <th>Cycle</th>
                <th>CDR</th> 
                <th>CPP</th>
                <th>Sales Rates</th> 
                <th>Accion</th>               
             </tr>          
             </thead>
             <tbody></tbody>
             @foreach ($accounts as $account)
               @include('backend.accounts.modal')
             @endforeach 
           </table>
        </div>
   </div>
</div>



@endsection
@section('custom-scripts')

<script>

var url = "{{url('api/v1/accounts') }}";
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
		     "zeroRecords": "Nothing found - sorry",
	         "info": "Mostrando pagina _PAGE_ de _PAGES_",
	         "infoEmpty": "No records available",
         },
		 ajax: {
				url: url + "/list"
		 },
		 columns: [
		     { "data": "id"},
			 { "data": "name", orderable: false},
			 { "data": "start_cycle",  orderable: false},
		 	 { "data": "end_cycle", orderable: false},
		 	 { "data": "cycle", orderable: false},
		 	 { "data": "cdr", orderable: false},
		 	 { "data": "cpp", orderable: false},
		 	 { "data": "id_sales_rates", orderable: false},
		 	 { "data": "op", orderable: false}
		 ]
	});
	}
	
	$(document).ready(function(){
         
	    loadData();
	})

</script>

@endsection
