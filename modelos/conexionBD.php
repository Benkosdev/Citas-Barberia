<?php 
class conexionBD{


/* he cambiado a static porque evita errores */
    static public function cBD(){


        $bd = new PDO("mysql:host=localhost;dbname=barberia_fbc", "root", "");


        $bd -> exec("set names utf8");
 
        return $bd;
    }
}


?>