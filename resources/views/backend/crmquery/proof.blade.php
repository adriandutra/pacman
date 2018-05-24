@extends('backend.layouts.app')

@section('htmlheader_title')
	CRM Probar Query

@endsection
@section('contentheader_title')
     Editar Consultas de {{$crm->Name}} - {{$sql_name}} 
@endsection

@section('content')


<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           
        <div class="form-group" id="sql_contact">
        	<button type="button" class="btn btn-default"  id="execute">
    		   <span class="fa fa-bolt"></span> Ejecutar
  			</button>
  			<button  class="btn btn-default" type="submit" id="save">
    		   <span class="fa fa-save"></span> Guardar
  			</button>
  			<a href="{{url('crmquery/edit')}}/{{$crm->ID_CRM}}"><button class="btn btn-danger">Cancelar</button></a>  			
  			<br> 			
      		
        </div>
        <div class="form-group">                
           <textarea rows="4" cols="50" name="{{$sql_name}}" id="editor">{{$sql_contact}}</textarea> 
        </div>
        
        
        <div class="form-group" style="float: right;">
            <input type="hidden" id="id_sql" name="id_sql" class="form-control" value="{{$sql_name}}">
            <input type="hidden" id="id_crm" name="ID_CRM" class="form-control" value="{{$crm->ID_CRM}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>          
        
   </div>
</div>

<div class="row" id="result" style="display:none">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        <div class="responsive" id="table">

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

var url = '{{url("api/v1/crmquery")}}';

var editor = CodeMirror.fromTextArea(document.getElementById('editor'), {
    mode: "text/x-mssql",
    theme: "default",
    lineNumbers: true,
    lineWrapping: true,
    electricChars: false,
    onChange: function (cm) {
    	   mySecondTextArea.value = cm.getValue();
    },
    onCursorActivity: function() {
      editor.setLineClass(hlLine, null);
      hlLine = editor.setLineClass(editor.getCursor().line, "activeline");
    }
});

$("#save").click(function(e){

	var sql    = editor.getValue();
	var id     = $('#id_crm').val();
	var id_sql = $('#id_sql').val();
	
		
    var params = {"id":	id ,
				  "sql":sql,
				  "id_sql": id_sql	
    };

    window.swal({
        title: "Comprobando...",
        text: "Por favor espere.",
        icon: "{{asset('images/ajax-loader.gif')}}",
        button: false,
        allowOutsideClick: false
    }); 

    $.ajax({
        method: "POST",
        url: url + "/save",
        data: params
    }).done(function(response) {	
        
		if (!response.success) {
			        msg = response.message;
					sweetAlert("Oops...", msg.substr(0, 200), "error");
		} else {
			
			        swal("Guardado!", "Se guardo la consulta!", "success");				     
				}

    }); 
 	
});

$("#execute").click(function(e){

	var sql = editor.getValue();
	var id  = $('#id_crm').val();
	var my_columns = [];
		
    var params = {"id":	id ,
				  "sql":sql	
    };

    $('#result').hide();
    $('#table').empty();

    $("#table").append('<h3>Resultados</h3>');
    $("#table").append('<table class="table table-striped table-bordered table-hover ui-datatable" id="dataList" style="width:100%"></table>');
    
    window.swal({
        title: "Comprobando...",
        text: "Por favor espere.",
        icon: "{{asset('images/ajax-loader.gif')}}",
        button: false,
        allowOutsideClick: false
    }); 

    
	$.ajax({
        method: "POST",
        url: url + "/execute",
        data: params
    }).done(function(response) {
    	            
			if (!response.success) {
				        msg = response.message;
				        $('#result').hide(); 
						sweetAlert("Oops...", msg.substr(0, 200), "error");
			} else {
				        swal.close();
				        $('#result').show();
                        $.each( response.data[0], function( key, value ) {
                            var my_item = {};
                            my_item.data = key;
                            my_item.title = key;
                            my_columns.push(my_item);
                        }); 
                        
                       // $('#result').empty();
                       // $('#dataList').DataTable().ajax.reload();
                        
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
							 searching: false,
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
					         scrollY:        "500px",
						     scrollX:        true,
						     scrollCollapse: true,
							 "columnDefs": [
								    { "width": "200", "targets": 0 }
						     ],	     
						     fixedColumns: true,
					         data: response.data,
							 'columns': my_columns	 
						});			
		     
					}

	    }); 

});

$(document).ready(function(){

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

})

</script>

@endsection
