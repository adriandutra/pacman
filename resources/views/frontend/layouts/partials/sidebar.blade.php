@inject('bladeHelper', 'App\Helpers\BladeHelper')

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar fixed">

<ul class="nav menu" id="accordion" >
<li class='panel parent' id='p_20'>
								
								<a data-parent='#accordion' data-toggle='collapse' href='#s_20'>
								
								<span >
								<svg class='glyph'>
									<use xlink:href='#stroked-gear'></use>
								</svg></span>Sistema</a><ul class='children collapse panel-collapse' id='s_20'><li>
													<a  class='submodule' href="{{url('system/users')}}" id='a_2'>
														<svg class='glyph'>
														<use xlink:href='#stroked-male-user'></use>
														</svg>
															Usuarios
													</a>
													</li><li>
													<a  class='submodule' href='roles' id='a_3'>
														<svg class='glyph'>
														<use xlink:href='#stroked-lock'></use>
														</svg>
															Roles & Perm
													</a>
													</li><li>
													<a  class='submodule' href="{{url('system/notifications')}}" id='a_5'>
														<svg class='glyph'>
														<use xlink:href='#stroked-app-window'></use>
														</svg>
															Notificaciones
													</a>
													</li><li>
													<a  class='submodule' href="{{url('system/ftp')}}" id='a_18'>
														<svg class='glyph'>
														<use xlink:href='#stroked-male-user'></use>
														</svg>
															Usuarios FTP
													</a>
													</li></ul></li><li class='panel parent' id='p_21'>
								
								<a data-parent='#accordion' data-toggle='collapse' href='#s_21'>
								
								<span >
								<svg class='glyph'>
									<use xlink:href='#stroked-bag'></use>
								</svg></span>Comercial</a><ul class='children collapse panel-collapse' id='s_21'><li>
													<a  class='submodule' href="{{url('comercial/providers')}}" id='a_43'>
														<svg class='glyph'>
														<use xlink:href='#stroked-film'></use>
														</svg>
															Proveedor Contenidos
													</a>
													</li><li>
													<a  class='submodule' href="{{url('comercial/resellers')}}" id='a_8'>
														<svg class='glyph'>
														<use xlink:href='#stroked-chevron-right'></use>
														</svg>
															Operadores
													</a>
													</li><li>
													<a  class='submodule' href="{{url('comercial/services')}}" id='a_27'>
														<svg class='glyph'>
														<use xlink:href='#stroked-chevron-right'></use>
														</svg>
															Servicios
													</a>
													</li><li>
													<a  class='submodule' href="{{url('comercial/packages')}}" id='a_26'>
														<svg class='glyph'>
														<use xlink:href='#stroked-chevron-right'></use>
														</svg>
															Packs
													</a>
													</li><li>
													<a  class='submodule' href="{{url('comercial/products')}}" id='a_14'>
														<svg class='glyph'>
														<use xlink:href='#stroked-chevron-right'></use>
														</svg>
															Productos
													</a>
													</li><li>
													<a  class='submodule' href='customers' id='a_29'>
														<svg class='glyph'>
														<use xlink:href='#stroked-chevron-right'></use>
														</svg>
															Clientes
													</a>
													</li></ul></li><li class='panel parent' id='p_22'>
								
								<a data-parent='#accordion' data-toggle='collapse' href='#s_22'>
								
								<span >
								<svg class='glyph'>
									<use xlink:href='#stroked-video'></use>
								</svg></span>Contenidos</a><ul class='children collapse panel-collapse' id='s_22'><li>
													<a  class='submodule' href="{{url('content/applications')}}" id='a_30'>
														<svg class='glyph'>
														<use xlink:href='#stroked-laptop-computer-and-mobile'></use>
														</svg>
															Aplicaciones
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/genres')}}" id='a_6'>
														<svg class='glyph'>
														<use xlink:href='#stroked-table'></use>
														</svg>
															G&eacute;neros
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/ordengenres')}}" id='a_44'>
														<svg class='glyph'>
														<use xlink:href='#stroked-table'></use>
														</svg>
															Orden G&eacute;neros Home
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/metadata')}}" id='a_15'>
														<svg class='glyph'>
														<use xlink:href='#stroked-tag'></use>
														</svg>
															Metadata
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/mediaimages')}}" id='a_24'>
														<svg class='glyph'>
														<use xlink:href='#stroked-landscape'></use>
														</svg>
															Im&aacute;genes
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/livelist')}}" id='a_7'>
														<svg class='glyph'>
														<use xlink:href='#stroked-camcorder'></use>
														</svg>
															Live Streaming
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/newslist')}}" id='a_32'>
														<svg class='glyph'>
														<use xlink:href='#stroked-map'></use>
														</svg>
															Noticias
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/listseries')}}" id='a_39'>
														<svg class='glyph'>
														<use xlink:href='#stroked-film'></use>
														</svg>
															Series
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/outstandinglist')}}" id='a_38'>
														<svg class='glyph'>
														<use xlink:href='#stroked-table'></use>
														</svg>
															Novedades
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/categorylist')}}" id='a_37'>
														<svg class='glyph'>
														<use xlink:href='#stroked-table'></use>
														</svg>
															Categorias
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/cmstexts')}}" id='a_36'>
														<svg class='glyph'>
														<use xlink:href='#stroked-table'></use>
														</svg>
															Texto
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/mediaaudios')}}" id='a_35'>
														<svg class='glyph'>
														<use xlink:href='#stroked-music'></use>
														</svg>
															Music Files
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/listaudiodata')}}" id='a_34'>
														<svg class='glyph'>
														<use xlink:href='#stroked-music'></use>
														</svg>
															Music MetaData
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/musicgenres')}}" id='a_33'>
														<svg class='glyph'>
														<use xlink:href='#stroked-table'></use>
														</svg>
															Generos Musicales
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/advertisinglist')}}" id='a_31'>
														<svg class='glyph'>
														<use xlink:href='#stroked-notepad'></use>
														</svg>
															Publicidad
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/listvodhls')}}" id='a_23'>
														<svg class='glyph'>
														<use xlink:href='#stroked-film'></use>
														</svg>
															VOD Hls
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/mediafiles')}}" id='a_19'>
														<svg class='glyph'>
														<use xlink:href='#stroked-film'></use>
														</svg>
															VOD Files
													</a>
													</li><li>
													<a  class='submodule' href="{{url('content/trailers')}}" id='a_25'>
														<svg class='glyph'>
														<use xlink:href='#stroked-film'></use>
														</svg>
															VOD Trailers
													</a>
													</li></ul></li><li class='panel parent' id='p_41'>
								
								<a data-parent='#accordion' data-toggle='collapse' href='#s_41'>
								
								<span >
								<svg class='glyph'>
									<use xlink:href='#stroked-desktop'></use>
								</svg></span>CDN</a><ul class='children collapse panel-collapse' id='s_41'><li>
													<a  class='submodule' href="{{url('cdn/mediaservers')}}" id='a_40'>
														<svg class='glyph'>
														<use xlink:href='#stroked-gear'></use>
														</svg>
															Media Servers
													</a>
													</li><li>
													<a  class='submodule' href="{{url('cdn/pops')}}" id='a_42'>
														<svg class='glyph'>
														<use xlink:href='#stroked-app-window-with-content'></use>
														</svg>
															POPS
													</a>
													</li></ul></li>
<li role="presentation" class="divider"></li>
<li><a href="/exit"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
</ul>
</div><!--/.sidebar-->