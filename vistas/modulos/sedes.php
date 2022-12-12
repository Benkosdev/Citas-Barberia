<?php

if ($_SESSION["rol"] != "administrador") {

    echo '<script>
       window.location = "inicio";   
    
    
    </script>';


    return;
}
?>

<div class="content-wrapper">


    <section class="content-header">
        <h1>Gestionar Sedes Barbería</h1>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-header">

                <form method="post">

                    <div class="col-md-6 col-xs-12">
                        <input type="text" class="form-control" name="sedeN" placeholder="Ingrese sede">
                    </div>


                    <button type="submit" class="btn btn-primary">Crear Sede</button>

                </form>

                <?php

                $crearC = new sedesC();
                $crearC->crearSedesC();
                
                ?>

            </div>
            <div class="box-body">

                <table class="table table-bordered table-hover table-striped">

                    <thead>
                        <tr>
                            <th>Sede Nº</th>
                            <th>Nombre</th>
                            <th>Editar / Borrar</th>
                        </tr>
                    </thead>

        <tbody>
        </tbody>

                    <!-- VER SEDES DE BARBERIA -->
                    <!-- Botones de eliminar y Editar -->
                    <?php

                    $columna = null;
                    $valor = null;

                    $resultado = sedesC::verSedesC($columna, $valor);

                    foreach ($resultado as $key => $value) {

                        echo '<tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["nombre"] . '</td>
                        <td>
                            <div class="btn-group">
                                <a href="http://localhost:8080/FBC/editarSede/' . $value["id"] . '">
                                    <button class="btn btn-success"> <i class="fa fa-pencil"></i>Editar</button>
                                </a>

                                
                                <a href="http://localhost:8080/FBC/sedes/' . $value["id"] . '">
                                    <button class="btn btn-danger"> <i class="fa fa-times"></i>Borrar</button>
                                </a>
         
                            </div>
                        </td>
        
                    </tr>';
                    }

                    ?>
                </table>
            </div>

        </div>
    </section>

</div>


<?php


$borrarC = new sedesC();
$borrarC->borrarSedeC();

?>