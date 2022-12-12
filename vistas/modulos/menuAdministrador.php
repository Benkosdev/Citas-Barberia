<?php

if($_SESSION["rol"] != "administrador"){

	echo '<script>

	window.location = "inicio";
	</script>';

	return;

}

?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">

        <li>
          <a href="http://localhost:8080/FBC/inicio">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
          </a>
        </li>

        
<!-- Revizar la siguiente informacion -->
    <!--     <li>
          <a href="http://localhost:8080/FBC/sedes">
            <i class="fa fa-home"></i>
            <span>Sedes</span>
          </a>
        </li> -->

             
    </section>
    <!-- /.sidebar -->
  </aside>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">
          
          <li>
            <a href="http://localhost:8080/FBC/inicio">
              <i class="fa fa-home"></i>
              <span>Inicio</span>
            </a>
          </li>
          <li>
            <a  href="http://localhost:8080/FBC/ver-sedes">
              <i class="fa fa-home"></i>
              <span>Agenda una Cita</span>
            </a>
          </li>

        <li>
          <a href="http://localhost:8080/FBC/barberos">
            <i class="fa fa-home"></i>
            <span>Barberos</span>
          </a>
        </li>

<!-- Revizar la siguiente informacion -->
        <li>
          <a href="http://localhost:8080/FBC/sedes">
            <i class="fa fa-home"></i>
            <span>Sedes</span>
          </a>
        </li>

      

        <li>
          <a href="http://localhost:8080/FBC/clientes">
            <i class="fa fa-calendar-check-o"></i>
            <span>Historial</span>
          </a>
        </li>
        </ul>  
     
    </section>
    <!-- /.sidebar -->
  </aside>