@extends('backend.layouts.app')

@section('htmlheader_title')
	CRM Query

@endsection
@section('contentheader_title')
     Editar Consultas de {{$crm->Name}}
@endsection

@section('content')



<div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       @if (count($errors) > 0)
       <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach  
          </ul>
        </div>
        @endif
        
        {!!Form::open(array('url'=> 'crmquery/update', 'method' => 'POST', 'autocomplete' => 'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" name="Name" class="form-control" value="{{$crm->Name}}">
        </div>
        
        <div class="form-group">
        	<label for="nombre">IDCRM_Neotel</label><br>
        	<input type="number"  class="form-control" name="IDCRM_Neotel" min="1" value="{{$crm->IDCRM_Neotel}}">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Fecha</label>
        	<input type="text" name="Date" class="form-control datepicker" name="date" value="{{$crm->Date}}">
        </div>
        
        <div class="form-group">
        	<label for="nombre">Acci&oacute;n</label>
        	<input type="text" name="Action" class="form-control" value="{{$crm->Action}}">
        </div>
        
        <div class="form-group">        
        	<label for="nombre">CRM Server</label>
        	<select name="ID_CRM_Server" class="form-control">   
             <option value="" selected>Seleccione una opci&oacute;n</option>          	
             @foreach ($servers as $server)
                @if ($server->id == $crm->ID_CRM_Server) 
                <option value="{{$server->id}}" selected>{{$server->name}}</option>
                @else 
                <option value="{{$server->id}}">{{$server->name}}</option>
                @endif
             @endforeach
             </select>
        </div>
        
        <div class="form-group">
        	<label for="nombre">Field_Document</label>
        	<input type="text" name="Field_Document" class="form-control" value="{{$crm->Field_Document}}">
        </div>
        
        <div class="form-group">        
        	<label for="nombre">SQL Command</label>
        	<select name="ID_CRM_Server" id="sql_select" class="form-control">   
             <option value="" disabled selected>Seleccione una consulta</option>
             <option value=1>SQL Contact</option>
             <option value=2>SQL Contact Sales</option>
             <option value=3>SQL Contact History</option>
             <option value=4>SQL External Contact</option>
             <option value=5>SQL Contact Phone</option>
             <option value=6>SQL Contact Mail Address</option>
             <option value=7>SQL Contact Address</option>             
            </select>
        </div>
        
        <div class="form-group" id="sql_contact" style="display:none;">        
        	<label for="nombre">Query</label>&nbsp;&nbsp;<a id="edit" href="{{url('crmquery/proof')}}/{{$crm->ID_CRM}}" class="fa fa-edit"><b>Editar</b></a>        	
        	<div id="text_1">     
      		<pre><code class="language-sql">{{$crm->SQL_Contact}}</code></pre></div>
        	<div id="text_2">
        	<pre><code class="language-sql">{{$crm->SQL_Contact_Sales}}</code></pre></div>
        	<div id="text_3">
        	<pre><code class="language-sql">{{$crm->SQL_Contact_History}}</code></pre></div>
        	<div id="text_4">
        	<pre><code class="language-sql">{{$crm->SQL_External_Contact}}</code></pre></div>
        	<div id="text_5">
        	<pre><code class="language-sql">{{$crm->SQL_Contact_Phone}}</code></pre></div>
        	<div id="text_6">
        	<pre><code class="language-sql">{{$crm->SQL_Contact_Mail_Address}}</code></pre></div>
        	<div id="text_7">
        	<pre><code class="language-sql">{{$crm->SQL_Contact_Address}}</code></pre></div>
        	
        </div>
        
        
        <div class="form-group" style="float: right;">
            <input type="hidden" name="ID_CRM" class="form-control" value="{{$crm->ID_CRM}}">
            
        </div>
          
        <div class="form-group" style="float: right;">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('crmquery/list')}}"><button class="btn btn-danger">Cancelar</button></a>
        </div>
        
        {!!Form::close()!!}
        
   </div>
</div>


@endsection
@section('custom-scripts')


<script>


 

function loadData() {

   var first = $('#edit').attr("href");
   var valor = ' ';
   	
   $('.datepicker').datepicker({
		   format: "yyyy-mm-dd",
		   language: "es",
		   autoclose: true
  });  
   
  $("#sql_select").change(function(){

			    
		switch ($('select[id=sql_select]').val()) {
		   case '1':{
			            valor = first + '/' + 1;
			            $('#edit').attr("href", valor);	                   			            
				   		$('#sql_contact').show();
				   		$('#text_2').hide();
	               		$('#text_3').hide();
	               		$('#text_4').hide();		
	               		$('#text_5').hide();
	               		$('#text_6').hide();
	               		$('#text_7').hide();
	               		$('#text_1').show(); 
	               		$('#textarea_1').show();
						    	
				        break;
			   			}
		   case '2': 
			   			valor = first + '/' + 2;
	            		$('#edit').attr("href", valor);
				   		$('#sql_contact').show();
				   		$('#text_1').hide();
	               		$('#text_3').hide();
	               		$('#text_4').hide();		
	               		$('#text_5').hide();
	               		$('#text_6').hide();
	               		$('#text_7').hide();
	               		$('#text_2').show();
	               		$('#textarea_2').show();
	               		
				      break;
			   case '3': 
				        valor = first + '/' + 3;
		                $('#edit').attr("href", valor);
	               		$('#sql_contact').show();
	               		$('#text_1').hide();
	               		$('#text_2').hide();
	               		$('#text_4').hide();
	               		$('#text_5').hide();
	               		$('#text_6').hide();
	               		$('#text_7').hide();
	               		$('#text_3').show();
	               		$('#textarea_3').show();
	               		
				      break;
			   case '4': 
				        valor = first + '/' + 4;
		                $('#edit').attr("href", valor);
	               		$('#sql_contact').show();
	               		$('#text_1').hide();
	               		$('#text_2').hide();
	               		$('#text_3').hide();
	               		$('#text_5').hide();
	               		$('#text_6').hide();
	               		$('#text_7').hide();
	               		$('#text_4').show();  
				   		$('#textarea_4').show();
	               		
	               		
				      break;
			   case '5': 

				        valor = first + '/' + 5;
		                $('#edit').attr("href", valor);
	               		$('#sql_contact').show();
	               		$('#text_1').hide();
	               		$('#text_2').hide();
	               		$('#text_3').hide();
	               		$('#text_4').hide();
	               		$('#text_6').hide();
	               		$('#text_7').hide();
	               		$('#text_5').show();  
				   		$('#textarea_5').show();
	               		
	               		
				      break;
			   case '6': 

				        valor = first + '/' + 6;
	                	$('#edit').attr("href", valor);
	               		$('#sql_contact').show();  
	               		$('#text_1').hide();
	               		$('#text_2').hide();
	               		$('#text_3').hide();
	               		$('#text_4').hide();
	               		$('#text_5').hide();
	               		$('#text_7').hide();
	               		$('#text_6').show();
				   		$('#textarea_6').show();
	               		
	               		
				      break;
			   case '7': 

  				        valor = first + '/' + 7;
	                	$('#edit').attr("href", valor);
	               		$('#sql_contact').show();  
	               		$('#text_1').hide();
	               		$('#text_2').hide();
	               		$('#text_3').hide();
	               		$('#text_4').hide();
	               		$('#text_5').hide();
	               		$('#text_6').hide();
	               		$('#text_7').show();
				   		$('#textarea_7').show();
	               		
				      break; 
			}
			
		});
 }

$(document).ready(function(){
    
    loadData();
})

        
</script>

@endsection