<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Barber Club</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost:8080/FBC/vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost:8080/FBC/vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost:8080/FBC/vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost:8080/FBC/vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="http://localhost:8080/FBC/vistas/dist/css/skins/_all-skins.min.css"> 

<!-- 
   <link rel="stylesheet" href="http://localhost:8080/FBC/vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost:8080/FBC/vistas/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->



 <!-- FULL CALENDAR -->
 
 <link rel="stylesheet" href="http://localhost:8080/FBC/vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="http://localhost:8080/FBC/vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print"> 

  




  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini login-page">
  <!-- Site wrapper -->


  <!-- Bloque para permitir menus luego de estar loeguado -->

  <?php

if(isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true){

  echo '<div class="wrapper">';

  include "modulos/cabecera.php";

  if($_SESSION["rol"] == "administrador"){

    include "modulos/menuAdministrador.php";

  }else if($_SESSION["rol"] == "cliente"){

    include "modulos/menuCliente.php";

  }else if($_SESSION["rol"] == "barbero"){

    include "modulos/menuBarbero.php";

  }

  

  $url = array();

  if(isset($_GET["url"])){

    $url = explode("/", $_GET["url"]);

    if ($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "perfil-administrador" || $url[0] == "perfil-admin" 
    || $url[0] == "sedes" || $url[0] == "editarSede"  || $url[0] == "barberos" || $url[0] == "clientes" 
    || $url[0] == "perfil-cliente" || $url[0] == "perfil-C" || $url[0] == "ver-sedes" || $url[0] == "barbero" 
    || $url[0] == "historial" || $url[0] == "perfil-barbero" || $url[0] == "perfil-B"  || $url[0] == "citas"){

      include "modulos/".$url[0].".php";  
    }

    }else{
  
        include "modulos/inicio.php";
      }
  
  
      echo '</div>';
  
    } else if (isset($_GET["url"])) {
  
      if ($_GET["url"] == "seleccionar") {
  
        include "modulos/seleccionar.php";
  
    }else if($_GET["url"] == "ingreso-administrador") {
  
        include "modulos/ingreso-administrador.php";
  
    }else if($_GET["url"] == "ingreso-cliente") {
  
        include "modulos/ingreso-cliente.php";
      
    }else if($_GET["url"] == "ingreso-barbero") {
  
      include "modulos/ingreso-barbero.php";
    }






  }else {

    include "modulos/seleccionar.php";

  }
    ?>





  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->


  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="http://localhost:8080/FBC/vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="http://localhost:8080/FBC/vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="http://localhost:8080/FBC/vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="http://localhost:8080/FBC/vistas/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="http://localhost:8080/FBC/vistas/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="http://localhost:8080/FBC/vistas/dist/js/demo.js"></script>

  <!-- Edicion y eliminacion de barberos -->
  <script src="http://localhost:8080/FBC/vistas/js/barberos.js"></script>

  <!-- Edicion y eliminacion de barberos -->
  <script src="http://localhost:8080/FBC/vistas/js/clientes.js"></script>



<!-- DataTables -->
<!-- <script src="http://localhost:8080/FBC/vistas/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="http://localhost:8080/FBC/vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://localhost:8080/FBC/vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="http://localhost:8080/FBC/vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> 
 -->


<!-- fullCalendar -->
<!-- <script src="http://localhost:8080/FBC/vistas/bower_components/moment/moment.js"></script>
  <script src="http://localhost:8080/FBC/vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script> -->

  <script src="http://localhost:8080/FBC/vistas/bower_components/moment/moment.js"></script>
<script src="http://localhost:8080/FBC/vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="http://localhost:8080/FBC/vistas  /bower_components/fullcalendar/dist/locale/es.js"></script>

<!-- Traduccion SPANISH -->

<script src="http://localhost:8080/FBC/vistas/bower_components/fullcalendar/dist/locale/es.js"></script>
 


  <script>
    $(document).ready(function () {
      $('.sidebar-menu').tree()
    }) 
   

    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()


// FullCalendar Script


        $('#calendar').fullCalendar({
  
          hiddenDays: [0,6], 

          defaultView: 'agendaWeek',

          events: [

         <?php 
         

            $resultado = CitasC::VerCitasC();

            foreach ($resultado as $key => $value) {
              
              if($value["id_barbero"] == substr($_GET["url"], 8)){

                echo '{ 
                  id: '.$value["id"].',
                  title:  "'.$value["nyaCli"].'",
                  start:"'.$value["inicio"].'",
                  end:"'.$value["fin"].'"
                },'; 
              }else if ($value["id_barbero"] == substr($_GET["url"], 6)){
            
             echo '{
                id: '.$value["id"].',
                title:  "'.$value["nyaCli"].'",
                start:"'.$value["inicio"].'",
                end:"'.$value["fin"].'"
             },';
            
              }
              
            }
          ?>
          ], 



          dayClick:function(date,jsEvent,view){

            $('#CitaModal').modal();

            var fecha = date.format();
            var hora2 = ("01:00:00").split(":");


            fecha = fecha.split("T");

            var dia = fecha[0];

            var hora = (fecha[1].split(":"));

            var h1 = parseFloat(hora[0]);
            var h2 = parseFloat(hora2[0]);

            var horaFinal = h1+h2; 

            $('#fechaC').val(dia);

            $('#horaC').val(h1+":00:00");

            $('#fyhIC').val(fecha[0]+" "+h1+":00:00");

            $('#fyhFC').val(fecha[0]+" "+horaFinal+":00:00");
        

          }          
        })
  
  </script>
</body>

</html>