<?php  

class barberosC{


    // CREAR BARBEROS

    public function crearBarberoC(){

        if(isset($_POST["rolB"])){

            $tablaBD = "barberos";

            $datosC = array("rol"=>$_POST["rolB"], "apellido"=>$_POST["apellido"], "nombre"=>$_POST["nombre"], 
             "id_sede"=>$_POST["sede"], "servicios"=>$_POST["servicios"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"]);

            $resultado = barberosM::crearBarberoM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>
                
                window.location = "barberos";
                
                
                </script>';
            }
        }

    }
        // Mostrar Barberos

    static public function verBarberosC($columna, $valor){

        $tablaBD = "barberos";

        $resultado = barberosM::verBarberosM($tablaBD, $columna, $valor);

        return $resultado;   

    }

     
// Editar Barbero

    static public function barberoC($columna, $valor){

        $tablaBD = "barberos";

        $resultado = barberosM::barberoM($tablaBD, $columna, $valor);

        return $resultado;

    }

    // ACTUALIZAR BARBERO

    public function actualizarBarberoC(){

        if(isset($_POST["bId"])){

            $tablaBD  = "barberos";

             $datosC = array("id"=>$_POST["bId"], "apellido"=>$_POST["apellidoE"],
              "nombre"=>$_POST["nombreE"], "usuario"=>$_POST["usuarioE"], "clave"=>$_POST["claveE"],
              "servicios"=>$_POST["serviciosE"]);


              $resultado = barberosM::actualizarBarberoM($tablaBD, $datosC);

              
            if($resultado == true){

                echo '<script>
                
                window.location = "barberos";
                                
                </script>';
            }

        }

    }    


    //Borarr Barberos

    public function borrarBarberoC(){

        if(isset($_GET["bId"])){

            $tablaBD = "barberos";

            $id = $_GET["bId"];

            if($_GET["imgB"] != ""){


                unlink($_GET["imgB"]);


            }

            $resultado = barberosM::borrarBarberoM($tablaBD, $id);

            if($resultado == true){

                echo '<script>
                
                window.location = "barberos";
                
                
                </script>';
            }



        }    

    }  

    // INGRESO DE SESION BARBEROS


    public function IngresarBarberoC(){


        if(isset($_POST["usuario-Ing"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-A0-9]+$/', $_POST["clave-Ing"])){

                $tablaBD = "barberos";

                $datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);

                $resultado = barberosM::IngresarBarberoM($tablaBD, $datosC);

                if($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){

                    $_SESSION["Ingresar"] = true;

                    $_SESSION["id"] = $resultado["id"];
                    $_SESSION["usuario"] = $resultado["usuario"];
                    $_SESSION["clave"] = $resultado["clave"];
                    $_SESSION["apellido"] = $resultado["apellido"];
                    $_SESSION["nombre"] = $resultado["nombre"];
                    $_SESSION["servicios"] = $resultado["servicios"];
                    $_SESSION["foto"] = $resultado["foto"];
                    $_SESSION["rol"] = $resultado["rol"];

                    echo '<script>

                    window.location = "inicio";
                    
                    </script>';

                 
            }
        }
    }

}



// VER PERFIL BARBERO
public function verPerfilBarberoC(){

$tablaBD = "barberos";

$id = $_SESSION["id"];

$resultado = barberosM::verPerfilBarberoM($tablaBD, $id);

echo '<tr>                    
                                    
                       
<td>'.$resultado["usuario"].'</td>
<td>'.$resultado["clave"].'</td>
<td>'.$resultado["nombre"].'</td>
<td>'.$resultado["apellido"].'</td>';


if($_SESSION["foto"] == ""){

    echo '<td><img src="vistas/img/defecto.png" width="40px"></td>';

}else{

    echo '<td><img src="'.$resultado["foto"].'" width="40px"></td>';

}                       


$columna = "id";
$valor = $resultado["id_sede"];

$sede = sedesC::verSedesC($columna, $valor);

echo '<td>'.$sede["nombre"].'</td>';


echo ' <td>

Desde: '.$resultado["horarioE"].'
<br>
Hasta: '.$resultado["horarioS"].'



</td>

<td>                            
    <a href="http://localhost:8080/FBC/perfil-B/'.$_SESSION["id"].'">  
        <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
    </a>

</td>         
</tr>';
}


// EDITAR PERFIL BARBERO

public function editarPerfilBarberoC(){

    $tablaBD = "barberos";
    $id = $_SESSION["id"];

    $resultado = barberosM::verPerfilBarberoM($tablaBD, $id);


    echo '  <form method="post" enctype="multipart/form-data">




    <div class="row">

        <div class="col-md-6 col-xs-12">
            <h2>Nombre:</h2>
            <input type="text" class="input-lg" name="nombrePerfil" value="'.$resultado["nombre"].'">
            <input type="hidden" name="bId" value="'.$resultado["id"].'">


            <h2>Apellido:</h2>
            <input type="text" class="input-lg" name="apellidoPerfil" value="'.$resultado["apellido"].'">

            <h2>Usuario:</h2>
            <input type="text" class="input-lg" name="usuarioPerfil" value="'.$resultado["usuario"].'">

            <h2>Contraseña:</h2>
            <input type="text" class="input-lg" name="clavePerfil" value="'.$resultado["clave"].'">';


            $columna = "id";
            $valor = $resultado["id_sede"];

            $sede = sedesC::verSedesC($columna, $valor);

        echo '<h2>Sede Actual: '.$sede["nombre"].'</h2>  
        <h4>Cambiar Sede</h4>                          
            <select name="sedePerfil">';
                       
            
            $columna = null;
            $valor = null;

            $sede = sedesC::verSedesC($columna, $valor);


            foreach ($sede as $key => $value) {
                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
            }



        echo '</select>      

           <div class="form-group">
                <h2>Horario:</h2>
                 Desde: <input type="time" class="input-lg" name="hePerfil" value="'.$resultado["horarioE"].'">
                 Hasta: <input type="time" class="input-lg" name="hsPerfil" value="'.$resultado["horarioS"].'">
            </div>

       </div>

        <div class="col-md-6 col-xs-12">
            <br><br>

            <input type="file" name="imgPerfil">
            <br>';

            if($resultado["foto"] == ""){

            echo '   <img src="http://localhost:8080/FBC/vistas/img/defecto.png" class="imge-responsive" width="200px" alt="">';

            }else {


                echo '   <img src="http://localhost:8080/FBC/'.$resultado["foto"].'" class="imge-responsive" width="200px">';


            }

          echo  '<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

            <br><br>

            
            <button type="submit" class="btb btn-success">Guardar Cambios</button>


        </div>
    </div>
</form>';



}


    // ACTUALIZAR PERFIL BARBERO

    public function actualizarPerfilBarbero(){

        if(isset($_POST["bId"])){

            $rutaImg = $_POST["imgActual"];

            if(isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])){


                    if(!empty($_POST["imgActual"])){

                           unlink($_POST["imgActual"]);
 
                    }

                    if($_FILES["imgPerfil"]["type"] == "image/png"){

                        $nombre = mt_rand(100,99);

                        $rutaImg = "vistas/img/barberos/Bar-".$nombre.".png";

                        $foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);

                        imagepng($foto, $rutaImg);
                    }


                    if($_FILES["imgPerfil"]["type"] == "image/jpeg"){



                        $nombre = mt_rand(100,99);

                        $rutaImg = "vistas/img/barberos/Bar-".$nombre.".jpg";

                        $foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);

                        imagejpeg($foto, $rutaImg);
                    }
            }


            $tablaBD = "barberos";

            $datosC = array("id"=>$_POST["bId"], "nombre"=>$_POST["nombrePerfil"], "apellido"=>$_POST["apellidoPerfil"],
            "usuario"=>$_POST["usuarioPerfil"], "clave"=>$_POST["clavePerfil"], "sede"=>$_POST["sedePerfil"], 
            "horarioE"=>$_POST["hePerfil"], "horarioS"=>$_POST["hsPerfil"], "foto"=>$rutaImg);

            
            $resultado = barberosM::actualizarPerfilBarberoM($tablaBD, $datosC);
             
            
            if($resultado == true){
                echo '<script>
                
                window.location = "http://localhost:8080/FBC/perfil-B/'.$_SESSION["id"].'";
                </script>';
            }



        }
   
    }
    
}    

?>