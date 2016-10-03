<!DOCTYPE html>
<html>
 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGinventario</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">   
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.css')}}">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href=" {{ asset('bootstrap/css/bootstrap.css') }}">

	

     <!-- our styles -->
    <link rel="stylesheet" href=" {{ asset('bootstrap/css/style.css') }}">
    

  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
   
    <div class="wrapper">
      <header class="main-header">

        <!-- Logo wrapper-->
		        <!-- Header Navbar: style can be found in header.less -->
                 
        
		 <a href="#" class="logo navbar-fixed-top">                
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SIGinventario</b></span>
		  
         </a>
        <!-- barra titulo-->
		
         <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
		 
		 <!-- Sidebar toggle button-->
		 
         
		 <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
		           
          <!-- Navbar Right Menu (menu derecho de mensajeria no estan necesario) -->
          <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
             
           
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <!-- Nombre del usuario en barra de menu -->
                  <img src="{{asset('dist/img/icono_persona.png')}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">NameUser</span>
                </a>
                <ul class="dropdown-menu">            
                  <!-- Menu Footer-->
                  <li class="user-footer">                   
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Salir</a>
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
                
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-list-alt"></i> <span>Articulos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>  
               <ul class="treeview-menu">
                <li><a href="{{url('articulo')}}"><i class="fa fa-circle-o"></i>Productos</a></li>
                <li><a href="{{url('unidad')}}"><i class="fa fa-circle-o"></i>Unidad de Medida</a></li>
                <li><a href="{{url('especifico')}}"><i class="fa fa-circle-o"></i>Especificos</a></li>               
              </ul>          
            </li> 

            <li class="treeview">
              <a href="{{url('departamento')}}">
                <i class="glyphicon glyphicon-object-align-vertical"></i> <span>Departamentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>             
            </li> 

            <li class="treeview">
              <a href="{{url('proveedor')}}">
                <i class="glyphicon glyphicon-shopping-cart"></i> <span>Proveedores</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>             
            </li>                  
        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
	  

      <!-- Content Wrapper. Contains page content content-wrapper-->
	  <div class="content-wrapper">
	  <div class="container col-md-12">
      <div class="col-md-12">
        
        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! session('flash_notification.message') !!}
            </div>
        @endif		
              
          @yield('content')

        </div>
      </div> <!-- /.content-wrapper -->
    </div> 
       
          <footer class="main-footer">               
                <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">DSI115_G08</a>.</strong> Todos los derechos reservados.              
          </footer>
       


    </div>
	 <footer class="main-footer">               
                <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">DSI115_G08</a>.</strong> Todos los derechos reservados.              
    </footer>   
    </div>
	    
    </div>
	
    	
        <!--<nav class="navbar navbar-inverse navbar-fixed-bottom">
          
        </nav> -->
		
     

    </div><!-- ./wrapper -->
     <!-- jQuery-->
     <script src="{{asset('plugins/jQuery/jQuery.js')}}"></script>
        <!-- js de bootstrap-->
     <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
 
        <!-- para poner mascaras a los input-->
     <script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>

         <!-- AdminLTE App-->
     <script src="{{asset('dist/js/app.min.js')}}"></script> 
   
  </body>
</html>
