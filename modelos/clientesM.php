<?php 
require_once "conexionBD.php";

class clientesM extends conexionBD{


    //crear clientes

    static public function crearClientesM($tablaBD, $datosC){

        $pdo = conexionBD::cBD()->prepare(" INSERT INTO $tablaBD(apellido, nombre, celular,
         usuario, clave, rol) VALUES (:apellido, :nombre, :celular, :usuario, :clave, :rol)");


        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":celular", $datosC["celular"], PDO::PARAM_STR);
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

        if($pdo -> execute()){

            return true;
            }
            $pdo -> close();
            $pdo = null;  
    }

    //Ver clientes // FUNCIONANDO

    static public function verClientesM($tablaBD, $columna, $valor){

        if($columna != null){

            $pdo = conexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo->bindParam(":".$columna, $valor, PDO::PARAM_STR);

            $pdo ->execute();
            return $pdo->fetch();

        }else{

            $pdo = conexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY id DESC");
            
            $pdo -> execute();

            return $pdo -> fetchAll(); 
              
        }

        $pdo -> close();
        $pdo = null;   
    }

    //Borrar clientes // FUNCIONANDO

    static public function borrarClienteM($tablaBD, $id){

        $pdo = conexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if($pdo -> execute()){

            return true;
            }
            $pdo -> close();
            $pdo = null;      
    }

    //Actualizar Clientes // FUNCIONANDO


    static public function actualizarClientesC($tablaBD, $datosC){

        $pdo = conexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre,
         celular = :celular, usuario = :usuario, clave = :clave WHERE id = :id");

            $pdo -> bindParam("id", $datosC["id"], PDO::PARAM_INT);            
            $pdo -> bindParam("apellido", $datosC["apellido"], PDO::PARAM_STR);
            $pdo -> bindParam("nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam("celular", $datosC["celular"], PDO::PARAM_STR);
            $pdo -> bindParam("usuario", $datosC["usuario"], PDO::PARAM_STR);
            $pdo -> bindParam("clave", $datosC["clave"], PDO::PARAM_STR);

            if($pdo -> execute()){

                return true;
                }
                $pdo -> close();
                $pdo = null;      
        }

        //Ingreso de los CLientes LOGIN // FUNCIONANDO

        static public function IngresarClienteM($tablaBD, $datosC){


        $pdo = conexionBD::cBD()->prepare("SELECT usuario, clave, apellido, nombre, documento, foto, celular, rol, id  
             FROM $tablaBD WHERE usuario = :usuario");


        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);


        $pdo -> execute();

        return $pdo -> fetch();
        

        $pdo -> close();
        $pdo = null;

        }

        // Ver perfil del cliente // ERRORES- FUNCIONANDO, NO MUESTRA REGISTROS.

        static public function verPerfilClientesM($tablaBD, $id){

            $pdo = conexionBD::cBD()->prepare("SELECT usuario, clave, apellido, celular, nombre, documento, foto, rol, id FROM $tablaBD WHERE id = :id");
    
            $pdo->bindParam(":id", $id, PDO::PARAM_INT);
    
            $pdo->execute();
    
            return $pdo ->  fetch();
    
            $pdo -> close();
            $pdo = null;
    
        }      

        // Actualizar Perfil del cliente

        static public function actualizarPerfilClienteM($tablaBD, $datosC){


            $pdo = conexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, nombre = :nombre,
            apellido = :apellido, celular = :celular, documento = :documento, foto = :foto WHERE  id = :id");

            $pdo -> bindParam("id", $datosC['id'], PDO::PARAM_INT);
            $pdo -> bindParam("usuario", $datosC['usuario'], PDO::PARAM_STR);
            $pdo -> bindParam("clave", $datosC['clave'], PDO::PARAM_STR);
            $pdo -> bindParam("nombre", $datosC['nombre'], PDO::PARAM_STR);
            $pdo -> bindParam("apellido", $datosC['apellido'], PDO::PARAM_STR);
            $pdo -> bindParam("celular", $datosC['celular'], PDO::PARAM_STR);
            $pdo -> bindParam("documento", $datosC['documento'], PDO::PARAM_STR);
            $pdo -> bindParam("foto", $datosC['foto'], PDO::PARAM_STR);

        

            if($pdo ->execute()){

                return true;
            }

            $pdo -> close();
            $pdo = null;

        }    

    }                                          
                                          
?>    