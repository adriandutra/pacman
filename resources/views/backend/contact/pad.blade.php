@extends('backend.layouts.app')

@section('htmlheader_title')
	Consulta Contacto

@endsection
@section('contentheader_title')
    <i class="fa fa-desktop"></i>  Consulta Contacto
@endsection

@section('content')



<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="responsive">
           <div id="floating-panel">
      			<select id="year">
      				<option value="" selected>Seleccione un a&ntilde;o</option>
      			@foreach($anio as $a)
      			    <option value="{{$a->anio}}">{{$a->anio}}</option>
      			@endforeach      			   
      			</select>
      			<select id="month">
      			    <option value="" selected>Seleccione una mes</option>
      			</select>
      			<select id="campaign">
      			    <option value="" selected>Seleccione una campa&ntilde;a</option>
      			</select>
      			<select id="type">
      			   <option value="" disabled selected>Seleccione una opci&oacute;n</option>
      			   <option value="1">Mapa </option>
      			   <option value="2">Mapa de Calor</option>
      			</select>
      			<button id="make">Consultar</button>
    		</div>

           <section id="map"></section>
        </div>
   </div>
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">


@endsection
@section('custom-scripts')

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBN-R0V8XlQ7kKW-SzRsn9VlMdMI2AJA6s&libraries=visualization">
</script>
<style>
*{ margin:0; padding: 0; }
#map{
  height: 400px;
}

 #floating-panel {
        position: absolute;
        top: 10px;
        left: 20%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        background-color: #fff;
        border: 1px solid #999;
        left: 20%;
        padding: 5px;
        position: absolute;
        top: 10px;
        z-index: 5;
      }

</style>  
<script>

var url = "{{url('api/v1/contact') }}";

var locationInfo=[];
var locationData=[];
var marcadores=[];
var mapa, pointarray, heatmap;


    $("#year").on('change', function() {

         var month = $("#month");   
        
    	 $.ajax({
        	 url: url + "/month",
        	 type: 'POST',
        	 data:{'anio': this.value },
        	 success: function(result){
            	 
        		   month.find('option').remove();

        		   month.append('<option value="" selected>Seleccione un mes</option>');	
                   
                   $(result.data).each(function(i, v){ // indice, valor
                       month.append('<option value="' + v.mes+ '">' + v.mes + '</option>');                       
                   })

                   month.prop('disabled', false);
                   
        	 }   
    	 });  	  
    });

    $("#month").on('change', function() {

     var campaign = $("#campaign");   
     var anio =  $("#year").val();
       
   	 $.ajax({
       	 url: url + "/campaign",
       	 type: 'POST',
       	 data:{'anio': anio, 'mes' : this.value },
       	 success: function(result){
           	 
       		      campaign.find('option').remove();

       		      campaign.append('<option value="" selected>Seleccione una campa&ntilde;a</option>');
                  
                  $(result.data).each(function(i, v){ // indice, valor
                      campaign.append('<option value="' + v.id_crm+ '">' + v.name + '</option>');                       
                  })

                  campaign.prop('disabled', false);
       	 }   
   	 });  	  
   });

    $("#make").on('click', function() {

    	var TypeMap  =  $("#type").val();
    	var anio     =  $("#year").val();
    	var mes      =  $("#month").val();
    	var campaign =  $("#campaign").val();
    	
        
        window.swal({
            title: "Comprobando...",
            text: "Por favor espere.",
            icon: "{{asset('images/ajax-loader.gif')}}",
            button: false,
            allowOutsideClick: false
        }); 
          
        $.ajax({
            method: "POST",
            url: url + "/pad",
            data: {'anio': anio, 'mes' : mes, 'campaign' : campaign }
        }).done(function(response) {	
            
    		if (!response.success) {
    			    msg = response.message;
    				sweetAlert("Oops...", msg.substr(0, 200), "error");
    		} else {
    				swal.close();
    				 
    			     $.each(response.data, function(i, item) {
						 locationInfo.push([item.nombre_sede, parseFloat(item.latitude), parseFloat(item.longitude)]);
						 locationData.push(new google.maps.LatLng(item.latitude, item.longitude));
    			     });
					 
    			     var mapOptions = {
     					    zoom: 13,
     					    mapTypeId: google.maps.MapTypeId.ROADMAP,
     				 };

     			     mapa = new google.maps.Map(document.getElementById('map'), mapOptions);
     			     
    			     var limites = new google.maps.LatLngBounds(); 

    			     var infowindow = new google.maps.InfoWindow();        				     

    			     var marcador, i;

    			     var pointArray = new google.maps.MVCArray(locationData);

                     if(TypeMap == 2) {   
                      
    			     for (i = 0; i < locationInfo.length; i++) {

    			    	 marcador = new google.maps.visualization.HeatmapLayer({
     					    position: new google.maps.LatLng(locationInfo[i][1], locationInfo[i][2]),
     					    data: pointArray,
     					    map: mapa,
     					    opacity: 0.4
     			         });	

  						 marcadores.push(marcador);

  						 limites.extend(marcador.position);

    			      }
   			          
                     }
                     else {
                    	    for (i = 0; i < locationInfo.length; i++) {
                    		    
                    		    marcador = new google.maps.Marker({
                    		      position: new google.maps.LatLng(locationInfo[i][1], locationInfo[i][2]),
                    		      map: mapa
                    		    });
                    		    
                    		    marcadores.push(marcador);
                    		    
                    		    limites.extend(marcador.position);
                    		    
                    		    google.maps.event.addListener(marcador, 'click', (function(marcador, i) {
                    		      return function() {
                    		        infowindow.setContent(locationInfo[i][0]);
                    		        infowindow.open(mapa, marcador);
                    		      }
                    		    })(marcador, i));

                       		   }
                  		  	
                           }	
                     
    			     mapa.fitBounds(limites);

    				 marcador.setMap(mapa);
    				}

         }); 

    });

    $(document).ready(function(){

    	$("#month").prop('disabled',true);
    	$("#campaign").prop('disabled',true);    
         
    	$.ajaxSetup({
    	    headers: {
    	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	    }
    	});



    });

</script>

@endsection
