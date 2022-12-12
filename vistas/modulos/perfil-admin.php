<?php

if($_SESSION["rol"] != "administrador"){


    /* Si lo anterior no se cumple ir a la pagina de inicio */
    echo '<script>
    
    window.location = "inicio";       
    </script>';

    return;
}

?>

<div class="content-wrapper">

<section class="content" >

<div class="box" >
    <div class="box-body">

        <?php 

        $editarPerfil = new administradorC(); 
        $editarPerfil -> editarPerfilAdministradorC();
        $editarPerfil -> actualizarPerfilAdministrador();

        ?>

        
            </div>
        </div>
    </section>
</div>