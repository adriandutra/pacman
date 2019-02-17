<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

@section('htmlheader')
    @include('frontend.layouts.partials.htmlheader')
@show

<body>
	
	@include('frontend.layouts.partials.mainheader')
	
	@include('frontend.layouts.partials.sidebar')
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
			 
			  @include('frontend.layouts.partials.contentheader')
			  	
			</div>
		</div><!--/.row-->
			  
			  <!--Contenido-->
                @yield('content')
		      <!--Fin Contenido-->
			  	
	</div><!--/.main-->
	
	@section('scripts')
    	@include('frontend.layouts.partials.scripts')
	@show
	
@yield('custom-css')
@yield('custom-scripts')


			