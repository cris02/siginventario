<!DOCTYPE html>
<html>
 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGinventario</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/font-awesome.css') }}">   
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
  
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.css')}}">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href=" {{ asset('bootstrap/css/bootstrap.css') }}">
	

     <!-- our styles -->
    <link rel="stylesheet" href=" {{ asset('bootstrap/css/style.css') }}">
    <!-- estilo para datatables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables/jquery.dataTables.min.css')}}">  
    @yield('css')

     <!-- jQuery-->
     <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
     <script src="{{asset('plugins/jQuery/jQuery.js')}}"></script>
    

  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
   
    <div class="wrapper">
        <header class="main-header">

            <!-- Logo wrapper-->
    		        <!-- Header Navbar: style can be found in header.less -->                     
            
    		    <div class="logo navbar-fixed-top">                
              <!-- logo for regular state and mobile devices -->
              <div class="pull-right">
                <img src="{{asset('dist/img/logo.png')}}" class="logo" alt="logo Image" id='logo'>
              </div>
              <div >
                <span class="logo-lg"><b>SIGinventario</b></span>   
              </div>

            </div>
            <!-- barra titulo-->
    		
             <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
    		 
    		      <!-- Sidebar toggle button-->  		 
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">MENU</span>
              </a>
    		           
              <!-- Navbar Right Menu (menu derecho de mensajeria no estan necesario) -->
              <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                   
            @if (Auth::user()->perfil_id==2)
             <!-- Notifications -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Tiene 10 requisiciones pendientes</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> Ir a requisiciones
                        </a>
                      </li>                    
                    </ul>
                  </li>                 
                </ul>
              </li>
              @endif
                 
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <!-- Nombre del usuario en barra de menu -->
                        <img src="{{asset('dist/img/icono_persona.png')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                      </a>
                      <ul class="dropdown-menu">            
                        <!-- Menu Footer-->
                        <li class="user-footer">                   
                          <div class="pull-right">
                            <a href="{{route('usuario.edit',Auth::user()->id)}}" class="btn btn-default btn-flat">EditarPerfil</a>
                            <a href="{{url('logout')}}" class="btn btn-default btn-flat">Salir</a>
                          </div>
                        </li>
                      </ul>
                    </li>                   
                  </ul>
              </div>
    		  
            </nav>
        </header>
      
      <!-- Left side column. contains the logo and sidebar --> 
      <aside class="main-sidebar" >
        <!-- sidebar: style can be found in sidebar.less -->

         <!--seccion de menus a la izquierda -->
        <section class="sidebar">   
   
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU PRINCIPAL</li>  

                <li class="treeview">
              <a href="{{url('home')}}">
                <i class="fa fa-home"></i> <span>INICIO</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>            
            </li>
                @if (Auth::user()->perfil_id==2)
                  @include('layouts.menus.admin_bodega')
                @else
                      @if (Auth::user()->perfil_id==4)
                        @include('layouts.menus.depto')
                      @else
                          @if (Auth::user()->perfil_id==3)
                            @include('layouts.menus.admin_financiero')
                          @else
                              @if (Auth::user()->perfil_id==1)
                                @include('layouts.menus.admin_sistema')                    
                              @endif                        
                          @endif
                      @endif
                @endif                              
        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
	  

            <!-- Content Wrapper. Contains page content content-wrapper-->
      	  <div class="content-wrapper">
      	    <div class="container col-md-12">
              <div class="col-md-12">
              
                  @if (session()->has('flash_notification.message'))
                      <div class="alert alert-{{ session('flash_notification.level') }} " id="msj">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          {!! session('flash_notification.message') !!}
                      </div>
                  @endif		
                        
                  @yield('content')

              </div>
            </div> 
          </div> <!-- /.content-wrapper -->
       
      
          <footer class="main-footer">               
                <strong>Copyright &copy; 2016 DSI215_G08 Todos los derechos reservados.</strong>        
          </footer>  
      
             
    </div><!-- ./wrapper -->

       <!-- AdminLTE App-->
     <script src="{{asset('dist/js/app.js')}}"></script> 
 
        <!-- para poner mascaras a los input-->
     <script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>      

     <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>

        <!-- js de bootstrap-->
     <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
     <script >
       $('#msj').delay(1500).fadeOut(2000);;
     </script>
     @yield('script')
   
  </body>
</html>