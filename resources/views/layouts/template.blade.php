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
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href=" {{ asset('bootstrap/css/bootstrap.css') }}">
    

  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
   
    <div class="wrapper" >
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">                
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SIGinventario</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->

        <!-- barra titulo-->
        <nav class="navbar navbar-static-top" role="navigation">
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
              <a href="{{url('articulo')}}">
                <i class="fa fa-edit"></i> <span>Articulos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>            
            </li> 

            <li class="treeview">
              <a href="{{url('departamento')}}">
                <i class="fa fa-edit"></i> <span>Departamentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>             
            </li> 

            <li class="treeview">
              <a href="{{url('proveedor')}}">
                <i class="fa fa-edit"></i> <span>Proveedores</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>             
            </li>                  
        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        
        @yield('content')
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">        
        <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">DSI115_G08</a>.</strong> Todos los derechos reservados.
      </footer>

     

    </div><!-- ./wrapper -->
     <!-- jQuery-->
     <script type="text/javascript" src="{{asset('plugins/jQuery/jQuery.js')}}"></script>
        <!-- js de bootstrap-->
     <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- AdminLTE App pone el foother al final de la pagina-->
     <script src="{{asset('dist/js/app.min.js')}}"></script>  
        <!-- para poner mascaras a los input-->
     <script type="text/javascript" src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
   
  </body>
</html>
