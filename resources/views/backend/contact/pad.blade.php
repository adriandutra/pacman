@extends('backend.layouts.app')

@section('htmlheader_title')
	Correccion de Direcciones

@endsection
@section('contentheader_title')
    <i class="fa fa-desktop"></i>  Correcci&oacute;n de Direcciones
@endsection

@section('content')

<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="responsive">
          <br>
        </div>
    </div>    
</div>

<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="responsive">
           <table class="table table-striped table-bordered table-hover ui-datatable" id="dataList" style="width:100%">
             <thead>
              <tr >
                <th rowspan="2">Direccion Actual</th>
                <th colspan="10">Direccion Consultada</th>
              </tr>  
              <tr>
                <th>Calle</th>
                <th>N&uacute;mero</th>
                <th>Piso</th>
                <th>Dpto</th>
                <th>Cod. Postal</th>
                <th>Localidad</th> 
                <th>Partido</th>
                <th>Provincia</th> 
                <th>Pa&iacute;s</th>
                <th></th>              
             </tr>          
             </thead>
             <tbody></tbody>

           </table>
        </div>
   </div>
</div>




<input type="hidden" name="_token" value="{{ csrf_token() }}">


@endsection
@section('custom-scripts')

<script>

var url = "{{url('api/v1/contact') }}";
var editor;

function loadData() {
	var oTable = $('#dataList').DataTable({
	// "dom": '<"toolbar">frtip',
	     "dom": 'B<"top"f>rt<"bottom"ip><"clear">',
		 processing: true,
		 serverSide: false,
		 "bDestroy": true,
	     //scrollResize: true,
 	     //scrollX: true,
	     //scrollY: 200,
	     //scrollCollapse: true,
	     //select: 'single',     // enable single row selection
         responsive: true,     // enable responsiveness
        // altEditor: true,
         buttons: [{
     		         text: 'Aplicar',
     		         action: function (e, dt, node, config) {
     		        	          var selected = [];

     		        	         window.swal({
     		        	            title: "Comprobando...",
     		        	            text: "Por favor espere.",
     		        	            icon: "{{asset('images/ajax-loader.gif')}}",
     		        	            button: false,
     		        	            allowOutsideClick: false
     		        	          }); 

					              oTable.$('input[type="checkbox"]').each(function() {

									    if(this.checked) {
								    		selected.push($(this).val());
								    	}
								      
				 		           });
				
					              if (selected.length) {
					            	var check = {"checked": selected};
					                  $.ajax({
					                    cache: false,
					                    type: 'post',
					                    dataType: 'json',  
					                    data: check, 
					                    url: url + "/apply",
					                    success: function(response) {

					                		if (!response.success) {
					        			        msg = response.message;
					        					sweetAlert("Oops...", msg.substr(0, 200), "error");
					        				} else {
						        				
					        					oTable.ajax.reload(); 
					        			        swal("Guardado!", "Se guardo la consulta!", "success");
					        			        				     
					        				}						                    			
					                    }
					                  });


					                } 	
					              									 	
     		                 }
                    },
                    {
	                 text: 'Descartar',
	                 action: function (e, dt, node, config) {
	        	          var selected = [];

	        	          window.swal({
	        	              title: "Comprobando...",
	        	              text: "Por favor espere.",
	        	              icon: "{{asset('images/ajax-loader.gif')}}",
	        	              button: false,
	        	              allowOutsideClick: false
	        	          }); 
	        	          
			              oTable.$('input[type="checkbox"]').each(function() {

							    if(this.checked) {
						    		selected.push($(this).val());
						    	}
						      
		 		           });
		
			              if (selected.length) {
							var check = {"checked": selected};
			                  $.ajax({
			                    cache: false,
			                    type: 'post',
			                    dataType: 'json',  
			                    data: check, 
			                    url: url + "/discard",
			                    success: function(response) {

			                		if (!response.success) {
			        			        msg = response.message;
			        					sweetAlert("Oops...", msg.substr(0, 200), "error");
			        				} else {
				        				
			        					oTable.ajax.reload(); 
			        			        swal("Guardado!", "Se guardo la consulta!", "success");
			        			        				     
			        				}
			                    			
			                    }
			                  });


			                } 	
			              									 	
		                 }
	                  
         }],
		 searching: false,
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
				url: url + "/pad"
		 },
		 columns: [
		     { "data": "direccion"},
			 { "data": "calle", orderable: false},
			 { "data": "numero", orderable: false},
			 { "data": "piso", orderable: false},
			 { "data": "depto", orderable: false},
			 { "data": "postal", orderable: false},
			 { "data": "localidad", orderable: false},
			 { "data": "partido", orderable: false},
			 { "data": "provincia", orderable: false},
			 { "data": "pais", orderable: false},
			 { "data": "id"}			 			 
		 ],
	      'columnDefs': [{
	          'targets': 10,
	          'searchable': false,
	          'orderable': false,
	          'className': 'dt-body-center',
	          'render': function (data, type, full, meta){
	              return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
	          }
	       }],
	       'order': [[1, 'asc']]
	});


	}


	
	$(document).ready(function(){

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
         
	    loadData();
         

	})

</script>

@endsection
