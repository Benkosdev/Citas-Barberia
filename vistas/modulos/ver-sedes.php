<?php
if ($_SESSION["rol"] != "cliente") {

    echo '<script>
       window.location = "inicio";           
    </script>';

    return;
}
?>

<div class="content-wrapper">


    <section class="content-header">
        <h1>Agende su Cita </h1>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-body"> 
   
           

            

            <?php 

              


            $columna = null;
            $valor = null;

             $resultado = sedesC::verSedesC($columna, $valor);

            foreach ($resultado as $key => $value) {
                

                echo '<div class="col-lg-3 col-xs-6">
               
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>'.$value["nombre"].'</h3>'; 



 
                    $columna = "id_sede";
                    $valor = $value["id"];

                    $barberos =  barberosC::verBarberosC($columna, $valor);


                    foreach ($barberos as $key => $value) {
                        echo '<a href="barbero/'.$value["id"].'" style="color: black;"><p>'.$value["apellido"].' '.$value["nombre"].'</p></a>';
                    } 

                   
                               
      
                  echo '</div>
                </div>
              </div>'; 
             
      
                      
                }
                       
            ?>

            
</div>
          

            </div>

        </div>
    </section>

</div>


