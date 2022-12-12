<?php 

require_once "conexionBD.php";

 class administradorM extends conexionBD{

    //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    //:::::::::::::::::::::::Ingreso Administrador:::::::::::::::::::::::::::::::::::::::::

    static public function IngresarAdministradorM($tablaBD, $datosC){

        $pdo = conexionBD::cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD WHERE usuario = :usuario");

        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

        $pdo -> execute();
        return $pdo -> fetch();
 
        $pdo -> close();
        $pdo = null;

    }


    //Ver perfil Administrador
    static public function verPerfilAdministradorC($tablaBD, $id){


        $pdo = conexionBD::cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD WHERE id = :usuario");

        $pdo -> bindParam(":usuario", $id, PDO::PARAM_INT);

        $pdo -> execute();
        return $pdo -> fetch();
 
        $pdo -> close();
        $pdo = null;
    }


    //Actializar Perfil Administrador

    static public function actualizarPerfilAdministradorM($tablaBD, $datosC){


        $pdo = conexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, 
        nombre = :nombre, apellido = :apellido, foto = :foto WHERE id = :id");


        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);


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