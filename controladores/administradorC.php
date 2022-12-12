<?php 

class administradorC{
    //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    //:::::::::::::::::::::::::: Ingreso de administrador ::::::::::::::::::::::

    public function IngresarAdministradorC(){

        if(isset($_POST["usuario-Ing"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])){

                $tablaBD = "admin";

                $datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);

                $resultado = administradorM::IngresarAdministradorM($tablaBD, $datosC);

                if($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){

                    $_SESSION["Ingresar"] = true;

                    $_SESSION["id"] = $resultado["id"];
                    $_SESSION["usuario"] = $resultado["usuario"];
                    $_SESSION["clave"] = $resultado["clave"];
                    $_SESSION["nombre"] = $resultado["nombre"];
                    $_SESSION["apellido"] = $resultado["apellido"];
                    $_SESSION["foto"] = $resultado["foto"];
                    $_SESSION["rol"] = $resultado["rol"];
                     

                    echo '<script>                    
                    
                    window.location = "inicio";
                    
                    </script>';
                }else{ 

                    echo '<div class="alert alert-danger">Error al ingresar, ingrese nuevamente sus datos.</div>';

                }
             }
    
        }

    }

    //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // ::::::::::::::::::::Ver perfil de Administrador:::::::::::::::::::::::
    
    public function verPerfilAdministradorC(){

        $tablaBD = "admin";
        $id =  $_SESSION["id"];
        $resultado = administradorM::verPerfilAdministradorC($tablaBD, $id);

        echo '<tr>
                <td>'.$resultado["usuario"].'</td>

                <td>'.$resultado["clave"].'</td>

                <td>'.$resultado["nombre"].'</td>

                <td>'.$resultado["apellido"].'</td>';


                if ($resultado["foto"] != "" ){

                    echo '<td> <img src="http://localhost:8080/FBC/'.$resultado["foto"].'" class="img-responsive" width="40px"> </td>';


                } else{

                    echo '<td> <img src="http://localhost:8080/FBC/vistas/img/defecto.png" class="img-responsive" width="40px"> </td>';



                }
                
                               

             echo '<td>                            
              <a href="http://localhost:8080/FBC/perfil-admin/'.$resultado["id"].'">
                <button class="btn btn-success"> <i class="fa fa-pencil"></i></button>
              </a>

             </td>                            
    </tr>';
 

    }


    //Editar Perfil

    public function editarPerfilAdministradorC(){

        $tablaBD = "admin";

        $id =  $_SESSION["id"];

        $resultado = administradorM::verPerfilAdministradorC($tablaBD, $id);

        echo '<form method="post" enctype="multipart/form-data">

        <div class="row">


            <div class="col-md-6 col-x6-12">
                <h2>Nombre:</h2>
                <input type="text" class="input-lg" name="nombreP" value="'.$resultado["nombre"].'">
                <input type="hidden" class="input-lg" name="idP" value="'.$resultado["id"].'">

                <h2>Apellido:</h2>
                <input type="text" class="input-lg" name="apellidoP" value="'.$resultado["apellido"].'">

                <h2>Usuario:</h2>
                <input type="text" class="input-lg" name="usuarioP" value="'.$resultado["usuario"].'">

                <h2>Contraseña:</h2>
                <input type="text" class="input-lg" name="claveP" value="'.$resultado["clave"].'">            
            </div>


            <div class="col-md-6 col-x6-12">

                <br><br>
                <input type="file" name="imgP">
                <br>';

                if($resultado["foto"] == "" ){

                    echo ' <img src="http://localhost:8080/FBC/vistas/img/defecto.png" width="200px">';

                } else{

                    echo ' <img src="http://localhost:8080/FBC/'.$resultado["foto"].'" width="200px">';


                }

               

               echo '<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

                <br><br>

                <button type="submit" class="btn btn-success">Guardar Cambios</button>


            </div>
        </div>


        </form>';



    }


    //Actualizar Perfil Administrador
    public function  actualizarPerfilAdministrador(){

        if(isset($_POST["idP"])){

            $rutaImg = $_POST["imgActual"];

            if(isset($_FILES["imgP"]["tmp_name"]) && !empty($_FILES["imgP"]["tmp_name"])){

                if(!empty($_POST["imgActual"])){


                    unlink($_POST["imgActual"]);

                }

                if($_FILES["imgP"]["type"] == "image/png"){


                    $nombre = mt_rand(10,99);
                    $rutaImg = "vistas/img/administradores/A-".$nombre.".png";

                     $foto = imagecreatefrompng($_FILES["imgP"]["tmp_name"]);

                     imagepng($foto, $rutaImg);


                }


            }


            //Revisar esta variable y su asignacion 
            //::::::::::::::::::::::::::::::::::::::::::
            $tablaBD = "admin";

            $datosC = array("id"=>$_POST["idP"], "usuario"=>$_POST["usuarioP"], "apellido"=>$_POST["apellidoP"],
             "nombre"=>$_POST["nombreP"], "clave"=>$_POST["claveP"], "foto"=>$rutaImg);

             $resultado = administradorM::actualizarPerfilAdministradorM($tablaBD, $datosC);

             if($resultado == true){
 //Cambi perfil admin por perfil-administrador
                echo '<script>                 
                window.location = "http://localhost:8080/FBC/perfil-admin/'.$_SESSION["id"].'";               
                </script>';
             }



        }

    }

}

?>

