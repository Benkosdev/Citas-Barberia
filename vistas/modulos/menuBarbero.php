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
          

        <?php 
        echo '<a href="http://localhost:8080/FBC/citas/'.$_SESSION["id"].'">'; 
                        
               
        ?> 


            <i class="fa fa-home"></i>
            <span>Agendar Citas</span>
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
          <a href="http://localhost:8080/FBC/clientes">
            <i class="fa fa-home"></i>
            <span>Clientes</span>
          </a>
        </li>
        </ul>  
     
    </section>
    <!-- /.sidebar -->
  </aside>