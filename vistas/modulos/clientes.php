
<!--  Gestion de clientes , CRUD-->

<?php

if ($_SESSION["rol"] != "aministrador" && $_SESSION["rol"] != "barbero") {

    echo '<script>
       window.location = "inicio";   
    
    
    </script>';


    return;
}

?>

<div class="content-wrapper">


    <section class="content-header">
        <h1>Gestionar Clientes</h1>
    </section>

    <section class=" content">

        <div class="box">


            <div class="box-header">

                <!-- Boton crear barbero -->
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#crearCliente">
                    Crear Cliente
                </button>
            </div>

            <div class="box-body">

                <table class="table table-bordered table-hover table-striped DT">

                    <thead>

                        <tr>
                            <th>Nº</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Celular</th>
                            <th>Foto</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>

                            <th>Editar / Borrar</th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- MOSTRAR CLIENTES EN PAGINA DE GESTION -->

                             <?php
                                 $columna = null;
                                 $valor = null;
                                 
                             $resultado = clientesC::verClientesC($columna, $valor);

                            /*  var_dump ($resultado);  
 
                             return; 
                              */
                             foreach($resultado as $key => $value){    
                                
                                 
                                /* var_dump($value);

                                return; */

                              
                                                   
							
                                 echo '<tr>
                           
                                 <td>'.($key+1).'</td>
                                <td>'.$value["apellido"].'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["celular"].'</td>';									

					        	if($value["foto"] == ""){

										echo '<td><img src="vistas/img/defecto.png" width="40px"></td>';

									}else{

										echo '<td><img src="'.$value["foto"].'" width="40px"></td>';

									}
									

									echo '<td>'.$value["usuario"].'</td>

									<td>'.$value["clave"].'</td>

                                <td>
                                    <div class="btn-group">

                                        <button class="btn btn-success editarCliente" data-toggle="modal" cId="'.$value["id"].'" imgC="'.$value["foto"].'" data-target="#editarCliente">
                                            <i class="fa fa-pencil">Editar</i></button>
   
                                        <button class="btn btn-danger eliminarCliente" cId="'.$value["id"].'" imgC="'.$value["foto"].'"> <i class="fa fa-times"></i>Borrar</button>

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

<div class="modal fade" rol="dialog" id="crearCliente">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" role="form">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">

                            <h2>Apellido</h2>
                            <input type="text" name="apellido" class="form-control input-lg" required>
                            <input type="hidden" name="rolC" value="cliente">

                            <div class="form-group">
                                <h2>Nombre</h2>
                                <input type="text" name="nombre" class="form-control input-lg" required>
                            </div>


                            <div class="form-group">
                                <h2>Celular</h2>
                                <input type="text" name="celular" class="form-control input-lg" >
                            </div>                            
                        </div>



                        <div class="form-group">
                            <h2>Usuario</h2>
                            <input type="text" name="usuario" id="usuario" class="form-control input-lg" required>
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

                $crear = new clientesC();
                $crear->crearClientesC();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- :::::::::::::::::::::::::::::::MODIFICACION DE MODAL:::::::::::::::::::::::::::::::::::::::::: -->
<div class="modal fade" rol="dialog" id="editarCliente">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" role="form">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">

                            <h2>Apellido</h2>
                            <input type="text" name="apellidoE" class="form-control input-lg" id="apellidoE" required>
                            <input type="hidden" id="cId" name="cId">

                            <div class="form-group">
                                <h2>Nombre</h2>
                                <input type="text" name="nombreE" class="form-control input-lg" id="nombreE" required>
                            </div>

                            <div class="form-group">
                                <h2>Celular</h2>
                                <input type="text" name="celularE" class="form-control input-lg" id="celularE">
                            </div>

                            
                            <!-- Seleccion de servicios. CONSIDERARLO PARA MOSTRAR LUEGO -->
                            <!-- <div class="form-group">

                                <h2>Servicios:</h2>

                                <select name="serviciosE" class="form-control input-lg">

                                     <option id="serviciosE"></option>

                                    <option value="C_Clasico">Corte Clasico</option>
                                    <option value="C_Moderno">Corte Moderno</option>
                                    <option value="C_Barba">Cuidado de la Barba</option>
                                    <option value="otros">Otro</option>
                                </select>

                            </div> -->

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

                    $actualizar = new clientesC();
                    $actualizar->actualizarClientesC();
                    ?>
            </form>
        </div>
    </div>
</div>


<?php

$borrarC = new clientesC();
$borrarC -> borrarClienteC();


?>