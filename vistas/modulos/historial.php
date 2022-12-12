<?php

if($_SESSION["id"] != substr($_GET["url"], 10)){

	echo '<script>

	window.location = "inicio";
	</script>';

	return;
}

?>

<div class="content-wrapper">


<section class="ocontent-header">
    <h1>Su Historial de Citas</h1>
</section>

<section class="content">

    <div class="box">
        
        <div class="box-body">

            <table class="table table-bordered table-hover table-striped DT">

                <thead>

                    <tr>
                        <th>Fecha y Hora</th>
                        <th>Barbero</th>
                        <th>Sede</th>
                    </tr>
                </thead>

                <tbody>


                    <!-- Segmento de Historial de Citas-->

                    <?php

                    $resultado = CitasC::VerCitasC();

                    foreach ($resultado as $key => $value) {

                        if($_SESSION["celular"] == $value["celular"]){


                            echo '<tr>
                            <td>'.$value["inicio"].'</td>';

                            $columma = "id";
                            $valor = $value["id_barbero"];
                            $barbero = barberosC::barberoC($columma, $valor);

                            echo '<td>'.$barbero["apellido"].' '.$barbero["nombre"].'</td>';
    
                            $columma = "id";
                            $valor = $value["id_sede"];

                            $sede = sedesC::verSedesC($columma, $valor);

                            echo '<td>'.$sede["nombre"].'</td>';
                        
                           
                        echo '</tr>';
                        }                
    
                        }                     
                   
                    ?>            

                </tbody>
            </table>
        </div>

    </div>
</section>
</div>

