<?php 

require_once "conexionBD.php";

class sedesM extends conexionBD {

    // Crear sede

    static public function crearSedeM($tablaBD, $sede){


        $pdo = conexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre) VALUES (:nombre)");

        $pdo -> bindParam(":nombre", $sede["nombre"], PDO::PARAM_STR);
        
        if($pdo -> execute()){

            return true;
        }else{
            return false;
        }

        $pdo -> close();
        $pdo = null;
    }

    // VER SEDES BARBERIA

    static public function verSedesM($tablaBD, $columna, $valor){

        if($columna == null){
            $pdo = conexionBD::cBD()->prepare("SELECT * FROM $tablaBD"); 
            $pdo -> execute();
            return $pdo ->fetchAll();


        }else{

            $pdo = conexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetch();


        }
    }

    //Borrar Sedes Barberia

    static public function borrarSedeM($tablaBD, $id){

        $pdo = conexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if($pdo -> execute()){
            return true;
        }else{
            return false;
        }

        $pdo -> close();
        $pdo = null;

    }


    //Editar Sedes

    static public function editarSedeM($tablaBD, $id){


        $pdo = conexionBD::cBD()->prepare("SELECT id, nombre FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);
        $pdo -> execute();
        return $pdo -> fetch();
        $pdo -> close();
        $pdo = null;
        
    }

    //Actualizar SEDE

    static public function actualizarSedeM($tablaBD, $datosC){

        $pdo = conexionBD::cBD()->prepare("UPDATE $tablaBD SET  nombre = :nombre WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);


        $pdo ->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }else{
            return false;
        }

        $pdo -> close();
        $pdo = null;

    
    }
}


?>