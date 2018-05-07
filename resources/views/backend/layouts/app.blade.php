<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('backend.layouts.partials.htmlheader')
@show

<body class="hold-transition skin-blue-light sidebar-mini" >
 <div class="wrapper">

@include('backend.layouts.partials.mainheader')


@include('backend.layouts.partials.sidebar')

  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
	                  	
	                  	<div class="row">
  							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    
    							@include('backend.layouts.partials.contentheader')
    
  							</div>
						</div>
	                  	
		                          <!--Contenido-->
                                  @yield('content')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      @include('backend.layouts.partials.footer')
 
@section('scripts')
    @include('backend.layouts.partials.scripts')
@show
@yield('custom-css')
@yield('custom-scripts')



</body>
</html>