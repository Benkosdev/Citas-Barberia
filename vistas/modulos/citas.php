<?php
/* if ($_SESSION["id"] != substr($_GET["url"], 6)) {

    echo '<script>
       window.location = "inicio";           
    </script>';

    return;
} */
?>



<div class="content-wrapper">


    <section class="content-header">

        <?php


         $columna = "id";
        $valor = substr($_GET["url"], 6);

        $resultado = barberosC::barberoC($columna, $valor);

        if ($resultado["servicios"] == "C_Clasico") {

            echo '<h1>Cortes clasicos con: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>';
        } else if ($resultado["servicios"] == "C_Moderno") {

            echo '<h1>Cortes Modernos con: '. $resultado["apellido"].' '.$resultado["nombre"].'</h1>';
        } else if ($resultado["servicios"] == "C_Barba") {

            echo '<h1>Cuidado de la Barba con : '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>';
        } else {

            echo '<h1>Cuidado de la Barba con : '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>';
        } 

       
        //LLAMADO DE SEDE

        $columna = "id";
        $valor = $resultado["id_sede"];
        $sede = sedesC::verSedesC($columna, $valor);

        echo '<br>
        <h1>Sede: '. $sede["nombre"].'</h1>';

        ?>


    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">
            <div id="calendar"></div>

            </div>

        </div>



    </section>

</div>


<!-- ::::::::::::::::::::::::::::::::COMIENZO DE BLOQUE DE CITA MODAL:::::::::::::::::::::::::::::::::::::::::::::: -->
<!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->

<div class="modal fade" rol="dialog" id="CitaModal">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post">
				
				<div class="modal-body">
					
					<div class="box-body">

						<?php

						$columna = "id";
						$valor = substr($_GET["url"], 6);

						$resultado = barberosC::barberoC($columna, $valor);

						echo '<div class="form-group">
							
								


								<input type="hidden" name="bId" value="'.$resultado["id"].'">
													

							</div>';

							$columna = "id";
							

							$valor = $resultado["id_sede"];
							 
							$sede = sedesC::verSedesC($columna, $valor);
							
							echo '<div class="form-group">
							
									<input type="hidden" name="sId" value ="'.$sede["id"].'">

								</div>';

						?>

                        <div class=form-group"" >


                            <h2>Seleccionar Cliente</h2>


                            <?php


                                echo '<select clas="form-control input-lg" name="nombreC">

                                <option>Cliente...</option>';

                                $columna = null;
                                $valor = null;

                                $resultado = clientesC::verClientesC($columna, $valor);

                                foreach ($resultado as $key => $value) {
                                    echo '<option value="'.$value["nombre"].'  '.$value["apellido"].'">'.$value["apellido"].'  '.$value["nombre"].'</option>';
                                }


                            ?>
                            



                            </select>


                        </div>

                        <div class="form-group">
                            
                            <h2>Celular:</h2>
                            
                            <input type="text" class="form-control input-lg" name="celularC" value="">

                        </div>
						
						<div class="form-group">
							
							<h2>Fecha:</h2>
							
							<input type="text" class="form-control input-lg" id="fechaC" value="" readonly>

						</div>

						<div class="form-group">
							
							<h2>Hora:</h2>
							
							<input type="text" class="form-control input-lg" id="horaC" value="" readonly>

						</div>
 
						<div class="form-group">
							
							
							<input type="hidden" class="form-control input-lg" name="fyhIC" id="fyhIC" value="" readonly>

							<input type="hidden" class="form-control input-lg" name="fyhFC" id="fyhFC" value="" readonly>

						</div>                   

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Pedir Cita</button>

					<button type="button" class="btn btn-danger">Cancelar</button>

				</div>
 
                <?php

                $enviarC = new CitasC();
                $enviarC->PedirCitaBarberoC(); 

    ?>			

			</form>

		</div>

	</div>

</div>
