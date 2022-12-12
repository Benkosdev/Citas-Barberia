

<div class="content-wrapper">


    <section class="content-header">
        <h1>Gestionar Barberos</h1>
    </section>

    <section class="content">

        <div class="box">


            <div class="box-header">

                <!-- Boton crear barbero -->
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#crearBarbero">
                    Crear Barbero
                </button>
            </div>

            <div class="box-body">

                <table class="table table-bordered table-hover table-striped DT">

                    <thead>

                        <tr>
                            <th>Nº</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Sede</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>

                            <th>Editar / Borrar</th>
                        </tr>
                    </thead>

                    <tbody>


                        <!-- MOSTRAR BARBEROS EN PAGINA DE GESTION -->

                        <?php

                        $columna = null;
                        $valor = null;

                        $resultado = barberosC::verBarberosC($columna, $valor);


                        foreach ($resultado as $key => $value) {

                            echo '<tr>

                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["apellido"] . '</td>
                        <td>' . $value["nombre"] . '</td>';


                            if ($value["foto"] == "") {

                                echo '<td> <img src="vistas/img/defecto.png" width="40px"> </td>';
                            } else {

                                echo '<td> <img src="' . $value["foto"] . '"width="40px"> </td>';
                            }


                            $columna = "id";
                            $valor = $value["id_sede"];

                            $sedes = sedesC::verSedesC($columna, $valor);

                            echo '<td>' . $sedes["nombre"] . '</td>


                        <td>' . $value["usuario"] . '</td>
                        <td>' . $value["clave"] . '</td>                      
                        
                                             
                        
                      <td>                                    
                            <div class="btn-group">                          
                                

                                 <button class="btn btn-success editarBarbero" bId="' . $value["id"] . '"data-toggle="modal" data-target="#editarBarbero">
                                  <i class="fa fa-pencil">Editar</i></button>
                              
                                
                                
                                    <button class="btn btn-danger eliminarBarbero" bId="' . $value["id"] . '" imgB="' . $value["foto"] . '"> <i class="fa fa-times"></i>Borrar</button>
                                
         
                            </div>
                        </td>
          
                    </tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </section>
</div>

<div class="modal fade" rol="dialog" id="crearBarbero">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" role="form">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">

                            <h2>Apellido</h2>
                            <input type="text" name="apellido" class="form-control input-lg" required>
                            <input type="hidden" name="rolB" value="barbero">

                            <div class="form-group">
                                <h2>Nombre</h2>
                                <input type="text" name="nombre" class="form-control input-lg" required>
                            </div>

                            <!-- Seleccion/llamado de SEDE -->
                            <div class="form-group">

                                <h2>Sede:</h2>

                                <select name="sede" class="form-control input-lg">

                                    <option>Seleccionar</option>


                                    <?php

                                    $columna = null;
                                    $valor = null;

                                    $resultado = sedesC::verSedesC($columna, $valor);

                                    foreach ($resultado as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                                    }

                                    ?>

                                </select>

                            </div>
                        </div>

                        <!-- Seleccion de servicios -->
                        <div class="form-group">

                            <h2>Servicios:</h2>

                            <select name="servicios" class="form-control input-lg">

                                <option>Seleccionar</option>

                                <option value="C_Clasico">Corte Clasico</option>
                                <option value="C_Moderno">Corte Moderno</option>
                                <option value="C_Barba">Cuidado de la Barba</option>
                                <option value="otros">Otro</option>
                            </select>

                        </div>


                        <div class="form-group">
                            <h2>Usuario</h2>
                            <input type="text" name="usuario" class="form-control input-lg" required>
                        </div>

                        <div class="form-group">
                            <h2>Contraseña</h2>
                            <input type="text" name="clave" class="form-control input-lg" required>
                        </div>
                    </div>
                </div>

                <!-- Botones de envio y cancelacion -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>


                <?php

                $crear = new barberosC();
                $crear->crearBarberoC();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- :::::::::::::::::::::::::::::::MODIFICACION DE MODAL:::::::::::::::::::::::::::::::::::::::::: -->
<div class="modal fade" rol="dialog" id="editarBarbero">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" role="form">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">

                            <h2>Apellido</h2>
                            <input type="text" name="apellidoE" class="form-control input-lg" id="apellidoE" required>
                            <input type="hidden" id="bId" name="bId">

                            <div class="form-group">
                                <h2>Nombre</h2>
                                <input type="text" name="nombreE" class="form-control input-lg" id="nombreE" required>
                            </div>

                            <!-- Seleccion de servicios -->
                            <div class="form-group">

                                <h2>Servicios:</h2>

                                <select name="serviciosE" class="form-control input-lg">

                                    <option id="serviciosE"></option>

                                    <option value="C_Clasico">Corte Clasico</option>
                                    <option value="C_Moderno">Corte Moderno</option>
                                    <option value="C_Barba">Cuidado de la Barba</option>
                                    <option value="otros">Otro</option>
                                </select>

                            </div>



                            <div class="form-group">
                                <h2>Usuario</h2>
                                <input type="text" name="usuarioE" class="form-control input-lg" id="usuarioE" required>
                            </div>

                            <div class="form-group">
                                <h2>Contraseña</h2>
                                <input type="text" name="claveE" class="form-control input-lg" id="claveE" required>
                            </div>
                        </div>
                    </div>

                    <!-- Botones de de actualizacion -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

                    <?php

                    $actualizar = new barberosC();
                    $actualizar->actualizarBarberoC();
                    ?>
            </form>
        </div>
    </div>
</div>


<?php

$borrarB = new barberosC();
$borrarB->borrarBarberoC();


?>