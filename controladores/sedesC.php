<?php

class sedesC{

    // Crear Sedes 
    public function crearSedesC(){

        if(isset($_POST["sedeN"])){

            $tablaBD = "sedes";
            $sede = array("nombre"=>$_POST["sedeN"]);

            $resultado = sedesM::crearSedeM($tablaBD, $sede);

            if($resultado == true){

                echo  '<script>
                
                
                window.location = "http://localhost:8080/FBC/sedes";
                
                </script>';
            }


        }


    }

    // VER SEDES DE BARBERIA 
    static public function verSedesC($columna, $valor){

    $tablaBD = "sedes";
    $resultado = sedesM::verSedesM($tablaBD, $columna, $valor);

    return $resultado;

    }

    // ELIMINAR SEDES

    public function borrarSedeC(){

        if(substr($_GET["url"], 6)){

            $tablaBD = "sedes";
            $id = substr($_GET["url"], 6);
            $resultado = sedesM::borrarSedeM($tablaBD, $id);

            if($resultado == true){

                echo  '<script>
                
                
                window.location = "http://localhost:8080/FBC/sedes";
                
                </script>';
            }


        }

    }

    //Editar Sedes


    public function editarSedeC(){


        $tablaBD = "sedes";

        $id = substr($_GET["url"], 11);

        $resultado = sedesM::editarSedeM($tablaBD, $id);

        echo ' <div class="form-group">

                <h2>Nombre:</h2>
                <input type="text" name="sedeEdi" class="form-control input-lg" value="'.$resultado["nombre"].'">
                <input type="hidden" name="sedeId" class="form-control input-lg" value="'.$resultado["id"].'">
                <br>

        <button class="btn btn-success" type="submit">Guardar</button>

        </div>';
    }


    //Actializar Sedes 

    public function actualizarSedeC(){


        if(isset($_POST["sedeEdi"])){

            $tablaBD = "sedes";
            $datosC = array("id"=>$_POST["sedeId"], "nombre"=>$_POST["sedeEdi"]);
            $resultado = sedesM::actualizarSedeM($tablaBD, $datosC);

            if($resultado == true){

                echo  '<script>
                
                
                window.location = "http://localhost:8080/FBC/sedes";
                
                </script>';
            }
        }
    }
}  


?>