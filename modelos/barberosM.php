<?php 

require_once "conexionBD.php";

class barberosM extends conexionBD{

    // CREAR BARBEROS

    static public function crearBarberoM($tablaBD, $datosC){


        $pdo = conexionBD::cBD()->prepare("INSERT INTO $tablaBD(apellido, nombre, id_sede, servicios, usuario, clave, rol)
         VALUES (:apellido, :nombre, :id_sede, :servicios, :usuario, :clave, :rol)");

         $pdo ->  bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
         $pdo ->  bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
         $pdo ->  bindParam(":id_sede", $datosC["id_sede"], PDO::PARAM_INT);
         $pdo ->  bindParam(":servicios", $datosC["servicios"], PDO::PARAM_STR);
         $pdo ->  bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
         $pdo ->  bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
         $pdo ->  bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

         if($pdo -> execute()){

            return true;
            
         }

         // Cierre de pdo y conexion vaciada con null
         $pdo -> close();
         $pdo = null;
    }

    // Mostrar BARBEROS


    static public function verBarberosM($tablaBD, $columna, $valor){

        if ($columna != null) {

            $pdo = conexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
            

			$pdo->execute();

			return $pdo -> fetchAll();


        }else{

            $pdo = conexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
			$pdo->execute();
			return $pdo -> fetchAll();  

            //REVISAR siguiente pdo da error  fuera d ela funcion, ensyar luego...
          $pdo -> close();
        $pdo = null;  
        }
    }

// Editar Barbero
    static public function barberoM($tablaBD, $columna, $valor){

        if ($columna != null) {

            $pdo = conexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo->execute();

			return $pdo -> fetch();
              
            //el siguiente pdo tiene errores fuera de la funcion, llave, , probar luego...
        $pdo -> close();
       $pdo = null;  
        }    

     
      
    }

    //ACTUALIZAR BARBEROS

    static public function actualizarBarberoM($tablaBD, $datosC){

        $pdo = conexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, 
        nombre = :nombre, usuario = :usuario, clave = :clave, servicios = :servicios WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":servicios", $datosC["servicios"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
            
         }
         // Cierre de pdo y conexion vaciada con null
         $pdo -> close();
         $pdo = null;
    }

    //Eliminar barbero

    static public function borrarBarberoM($tablaBD, $id){
        $pdo = conexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if($pdo -> execute()){
            return true;
            
         }
         // Cierre de pdo y conexion vaciada con null
         $pdo -> close();
         $pdo = null;


    }

    // INGRESAR BARBERO

    static public function IngresarBarberoM($tablaBD, $datosC){


        $pdo = conexionBD::cBD()->prepare("SELECT usuario, clave, apellido, nombre, servicios, foto, rol, id  
             FROM $tablaBD WHERE usuario = :usuario");


        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);


        $pdo -> execute();

        return $pdo -> fetch();
        

        $pdo -> close();
        $pdo = null;

        }

        // VER PERFIL BARBERO

        static public function verPerfilBarberoM($tablaBD, $id){

            $pdo = conexionBD::cBD()-> prepare("SELECT usuario, clave, apellido, nombre, servicios, foto, rol, id, horarioE, horarioS, id_sede  
            FROM $tablaBD WHERE id = :id");


       $pdo->bindParam(":id", $id, PDO::PARAM_STR);


       $pdo -> execute();

       return $pdo ->fetch();
       

       $pdo -> close();
       $pdo = null;

        }

        
        // ACTUALIZAR PERFIL BARBERO

        static public function actualizarPerfilBarberoM($tablaBD, $datosC ){

        $pdo = conexionBD::cBD()->prepare("UPDATE $tablaBD SET id_sede =  :id_sede, apellido = :apellido, nombre = :nombre,
         foto = :foto, usuario = :usuario, clave = :clave, horarioE = :horarioE, horarioS = :horarioS WHERE id = :id");



     $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT); 
     $pdo -> bindParam(":id_sede", $datosC["sede"], PDO::PARAM_INT );
    $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
    $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
    $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
    $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
    $pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
    $pdo -> bindParam(":horarioE", $datosC["horarioE"], PDO::PARAM_STR);
    $pdo -> bindParam(":horarioS", $datosC["horarioS"], PDO::PARAM_STR); 

    


    if($pdo -> execute()){
        return true;
        
     }
     // Cierre de pdo y conexion vaciada con null
     $pdo -> close();
     $pdo = null;

    }
}


?>






