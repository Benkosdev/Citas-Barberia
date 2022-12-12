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
          <a href="http://localhost:8080/FBC/ver-sedes">
            <i class="fa fa-home"></i>
            <span>Agenda tu Cita</span>
          </a>
        </li>

        <li>
          <a href="http://localhost:8080/FBC/perfil-cliente">
            <i class="fa fa-home"></i>
            <span>Datos y Actualización</span>
          </a>
        </li>

      
<!-- Revizar la siguiente informacion -->
     <!--    <li>
          <a href="http://localhost:8080/FBC/ver-sedes">
            <i class="fa fa-home"></i>
            <span>Pide tu cita</span>
          </a>
        </li> -->

        <li>

        <?php 

              echo '    <a href="http://localhost:8080/FBC/historial/'.$_SESSION["id"].'">';




        ?>
      
            <i class="fa fa-calendar-check-o"></i>
            <span>Historial</span>
          </a>
        </li>
        </ul>  
     
    </section>
    <!-- /.sidebar -->
  </aside>