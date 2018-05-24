@inject('bladeHelper', 'App\Helpers\BladeHelper')

<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-desktop"></i>
                <span>Contact Center</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">               
                <li><a href="{{url('contact/pad')}}"><i class="fa fa-circle-o"></i> Consulta de Contacto</a></li>                
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Servidores</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('servers/list')}}"><i class="fa fa-circle-o"></i> Listado de Servidores</a></li>
                <li><a href="{{url('servers/create')}}"><i class="fa fa-circle-o"></i> Nuevo Servidor</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>PBX</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('pbx/list')}}"><i class="fa fa-circle-o"></i> Listado de PBXs</a></li>
                <li><a href="{{url('pbx/create')}}"><i class="fa fa-circle-o"></i> Agregar PBX</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Cuentas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('accounts/list')}}"><i class="fa fa-circle-o"></i> Listado de Cuentas</a></li>
                <li><a href="{{url('accounts/create')}}"><i class="fa fa-circle-o"></i> Nueva Cuenta</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share-alt"></i>
                <span>CRM Query</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('crmquery/list')}}"><i class="fa fa-circle-o"></i> Listado de Consultas</a></li>              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share-square"></i>
                <span>Campa&ntilde;as</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('campaigns/list')}}"><i class="fa fa-circle-o"></i> Listado de Campa&ntilde;as</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-suitcase"></i>
                <span>Productos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('products/list')}}"><i class="fa fa-circle-o"></i> Listado de Productos</a></li>
                <li><a href="{{url('products/create')}}"><i class="fa fa-circle-o"></i> Nuevo Producto</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-archive"></i>
                <span>Syslog</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('syslog/list')}}"><i class="fa fa-circle-o"></i>Ver Errores</a></li>                
              </ul>
              <ul class="treeview-menu">
                <li><a href="{{url('syslog/history')}}"><i class="fa fa-circle-o"></i>Ver Historico</a></li>                
              </ul>
            </li>
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('users/list')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li><a href="{{url('users/create')}}"><i class="fa fa-circle-o"></i> Nuevo Usuario</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>