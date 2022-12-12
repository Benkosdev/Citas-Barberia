<?php
class clientesC{

public function crearClientesC(){

    if(isset($_POST["rolC"])){

        $tablaBD = "clientes";

        $datosC = array("apellido"=>$_POST["apellido"], "nombre"=>$_POST["nombre"], "celular"=>$_POST["celular"],
        "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"], "rol"=>$_POST["rolC"]);


        $resultado = clientesM::crearClientesM($tablaBD, $datosC);

        if($resultado == true){

            echo '<script>

            window.location = "clientes";
                       
            
            </script>';

            }

        }
    }

        //Ver Clientes // FUNCIONANDO

        static public function verClientesC($columna, $valor){


            $tablaBD = "clientes";

            $resultado = clientesM::verClientesM($tablaBD, $columna, $valor);

            return $resultado;
        }
        
                             
                              

        //Borrar CLientes // FUNCIONANDO

        public function borrarClienteC(){


            if(isset($_GET["cId"])){

                $tablaBD = "clientes";
                $id = $_GET["cId"];

                if($_GET["imgC"] != ""){

                    unlink($_GET["imgC"]);
                }

                $resultado = clientesM::borrarClienteM($tablaBD, $id);

                if($resultado == true){

                    echo '<script>        
                    window.location = "clientes";                                                  
                    </script>';
        
                }
            }
        }


        //Actualizar clientes // FUNCIONANDO

        public function actualizarClientesC(){

            if(isset($_POST["cId"])){
                $tablaBD = "clientes";

                $datosC = array("id"=>$_POST["cId"], "apellido"=>$_POST["apellidoE"], "nombre"=>$_POST["nombreE"],
                "celular"=>$_POST["celularE"], "usuario"=>$_POST["usuarioE"], "clave"=>$_POST["claveE"]);

                $resultado = clientesM::actualizarClientesC($tablaBD, $datosC);

                if($resultado == true){

                    echo '<script>        
                    window.location = "clientes";                                                  
                    </script>';
        
                }

            }
        }
// Ingreso de clientes LOGIN // FUNCIONANDO

        public function IngresarClienteC(){

            if(isset($_POST["usuario-Ing"])){

                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-A0-9]+$/', $_POST["clave-Ing"])){

                    $tablaBD = "clientes";

                    $datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);

                    $resultado = clientesM::IngresarClienteM($tablaBD, $datosC);

                    if($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){

                        $_SESSION["Ingresar"] = true;

                        $_SESSION["id"] = $resultado["id"];
                        $_SESSION["usuario"] = $resultado["usuario"];
                        $_SESSION["clave"] = $resultado["clave"];
                        $_SESSION["apellido"] = $resultado["apellido"];
                        $_SESSION["nombre"] = $resultado["nombre"];
                        $_SESSION["documento"] = $resultado["documento"];
                        $_SESSION["foto"] = $resultado["foto"];
                        $_SESSION["celular"] = $resultado["celular"];
                        $_SESSION["rol"] = $resultado["rol"];

                        echo '<script>

                        window.location = "inicio";
                        
                        </script>';

                     
                }
            }
        }
    }


        // Ver perfil  del cliente  / LO MUESTRA PRO SIN REGISTROS
        public function verPerfilClientesC(){
            
            //start
          /*   function showfix($data)
            {
                $format = print_r('<pre>');
                $format = print_r($data);
                $format = print_r('</pre>');
            
                return $format;
            }
//end  */

                $tablaBD = "clientes";
        
                $id = $_SESSION["id"];
        
                $resultado = clientesM::verPerfilClientesM($tablaBD, $id);
                
                
                
                //showfix($resultado);      puedo ver lo que pido a la bd                        
        
                echo '<tr>                    
                                    
                       
                        <td>'.$resultado["usuario"].'</td>
                        <td>'.$resultado["clave"].'</td>
                        <td>'.$resultado["nombre"].'</td>
                        <td>'.$resultado["apellido"].'</td>
                        <td>'.$resultado["celular"].'</td>';
        
                        if($_SESSION["foto"] == ""){
        
                            echo '<td><img src="vistas/img/defecto.png" width="40px"></td>';
        
                        }else{
        
                            echo '<td><img src="'.$resultado["foto"].'" width="40px"></td>';
        
                        }                       
        
                        echo '<td>'.$resultado["documento"].'</td>
        
                        <td>                            
                            <a href="http://localhost:8080/FBC/perfil-C/'.$_SESSION["id"].'">  
                                <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                            </a>
        
                        </td>         
                       </tr>';
                }  
             
                
                

    
                    
                    //Editar Perfil Cliente


                    public function editarPerfilClienteC(){                   


                        $tablaBD = "clientes";

                                                    
                        $id = $_SESSION["id"];

                        $resultado = clientesM::verPerfilClientesM($tablaBD, $id);

                            echo '<form method="post" enctype="multipart/form-data">
                            <div class="row">
        
                                <div class="col-md-6 col-xs-12">
                                
                                <h2>usuario:</h2>
                                <input type="text" class="input-lg" name="usuarioPerfil" value="'.$resultado["usuario"].'">
                                
                                <h2>Clave:</h2>
                                <input type="text" class="input-lg" name="clavePerfil" value="'.$resultado["clave"].'">



                                    <h2>Nombre:</h2>
                                    <input type="text" class="input-lg" name="nombrePerfil" value="'.$resultado["nombre"].'">
                                    <input type="hidden" class="input-lg" name="cId" value="'.$resultado["id"].'">
        
                                    <h2>Apellido:</h2>
                                    <input type="text" class="input-lg" name="apellidoPerfil" value="'.$resultado["apellido"].'">
        
                                   
                                    <h2>celular:</h2>
                                    <input type="text" class="input-lg" name="celularPerfil" value="'.$resultado["celular"].'">
        
        
                                    <h2>Documento:</h2>
                                    <input type="text" class="input-lg" name="documentoPerfil" value="'.$resultado["documento"].'">

        
                                </div>
                                <div class="col-md-6 col-xs-12">
        
                                    <br> <br>
        
                                    <input type="file" name="imgPerfil">  
                                    <br>';

                                    if($resultado["foto"] != ""){

                                        echo '<img src="http://localhost:8080/FBC/'.$resultado["foto"].'" width="200px" class="img-responsive">';
        
                                    }else {
        
                                        echo '<img src="http://localhost:8080/FBC/vistas/img/defecto.png" width="200px" class="img-responsive">';
        
                                    }
        
        
                                    echo '<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">
        
                                    <br><br>
        
                                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
        
                                </div>
        
                            </div>
        
                        </form>';
                        
                        
                    }


                    // ACTUALIZAR PERFIL DEL cliente

                    public function actualizarPerfilCliente(){

                        if(isset($_POST["cId"])){

                            $rutaImg = $_POST["imgActual"];

                            if(isset($_FILES["imgPerfil"]["tmp_name"]) && !empty(($_FILES["imgPerfil"]["tmp_name"]))){

                                if(!empty($_POST["imgActual"])){

                                    unlink($_POST["imgActual"]);
                        }

                                
                                if($_FILES["imgPerfil"]["type"] == "image/png"){

					$nombre = mt_rand(100,999);

					$rutaImg = "vistas/img/clientes/clientes".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);

					imagepng($foto, $rutaImg);

				}

                if($_FILES["imgPerfil"]["type"] == "image/jpeg"){

					$nombre = mt_rand(100,999);

					$rutaImg = "vistas/img/clientes/clientes".$nombre.".jpg";

					$foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);

					imagejpeg($foto, $rutaImg);

				}

			}


                        $tablaBD = "clientes";
                        $datosC = array("id"=>$_POST["cId"], "nombre"=>$_POST["nombrePerfil"], "apellido"=>$_POST["apellidoPerfil"], "celular"=>$_POST["celularPerfil"], 
                        "usuario"=>$_POST["usuarioPerfil"], "clave"=>$_POST["clavePerfil"], "documento"=>$_POST["documentoPerfil"] ,"celular"=>$_POST["celularPerfil"], "foto"=>$rutaImg);

                       

                        $resultado = clientesM::actualizarPerfilClienteM($tablaBD, $datosC);


                        if($resultado == true){


                            echo '<script>
                            
                            window.location = "http://localhost:8080/FBC/perfil-C/'.$_SESSION["id"].'";
                            
                            </script>';
                        }

                    }                

                }         
                
            }           
    ?>