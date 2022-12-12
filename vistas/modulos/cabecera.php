<header class="main-header">
    <!-- Logo -->
    <a href="http://localhost:8080/FBC/inicio" class="logo"> 
            <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>FBC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Barber Shop</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
   
          <li class="dropdown user user-menu">
            <a href="#" class="drop down-toggle" data-toggle="dropdown">


            <?php
            if( $_SESSION["foto"] == "") {

              echo '<img src="http://localhost:8080/FBC/vistas/img/defecto.png" class="user-image" alt="User Image">';
            
            }else{

              echo '<img src="http://localhost:8080/FBC/'.$_SESSION["foto"].'" class="user-image" alt="User Image">';

            }                     
            
            ?>


             <!--  <img src="vistas/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <!-- Llamado del nombre y apellido al loguearse -->
              <span class="hidden-xs"><?php echo $_SESSION["nombre"]; echo ""; echo $_SESSION["apellido"];   ?></span>

            </a>
            <ul class="dropdown-menu">                      
           
             
              <li class="user-footer">                
                <div class="pull-left">

                <?php 

                echo '<a href="http://localhost:8080/FBC/perfil-'.$_SESSION["rol"].'" class="btn btn-primary btn-flat">Perfil</a>';
        
                
                ?>
                  

                </div>

                <div class="pull-right">
                  <a href="http://localhost:8080/FBC/salir" class="btn btn-danger btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        
        </ul>
      </div>
    </nav>
  </header>