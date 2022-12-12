<?php 
//Restringe acceso a quienes no sean administradores a ciertas funciones

if($_SESSION["rol"] != "administrador") {

    echo '<script>
       window.location = "inicio";       
    
    </script>';

    return;
}
?>

<div class="content-wrapper">
    <section class="content-header">
    <h1>Editar Sede</h1>
        </section>

        <section class="content">

            <div class="box">

            <div class="box-body">

            <form method="post">

            <?php

            $editarS = new sedesC();
            $editarS -> editarSedeC();
            $editarS -> actualizarSedeC();
            
              
            
            ?>


               
            </form>
            </div>
        </div>
    </section>
</div>