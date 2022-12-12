<?php

require_once "conexionBD.php";

class CitasM extends conexionBD{

	//Pedir Cita cliente
	static public function EnviarCitaM($tablaBD, $datosC){ 

		$pdo = conexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_barbero, id_sede, id_cliente, nyaCli, celular, inicio, fin) 
		VALUES (:id_barbero, :id_sede, :id_cliente, :nyaCli,  :celular, :inicio, :fin)");

        
      
		$pdo -> bindParam(":id_barbero", $datosC["bId"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_sede", $datosC["sId"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_cliente", $datosC["cId"], PDO::PARAM_INT);
 
		$pdo -> bindParam(":nyaCli", $datosC["nyaC"], PDO::PARAM_STR);
		$pdo -> bindParam(":celular", $datosC["celularC"], PDO::PARAM_STR);
		$pdo -> bindParam(":inicio", $datosC["fyhIC"], PDO::PARAM_STR);
		$pdo -> bindParam(":fin", $datosC["fyhFC"], PDO::PARAM_STR); 
        
	

	 if($pdo->execute()){   
			return true;
		}

		$pdo -> close();
		$pdo = null;
	}

	//Mostra Citas En Calendario


	static public function VerCitasM($tablaBD){


		$pdo = conexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

		$pdo ->  execute();

		return $pdo -> fetchAll();


		$pdo -> close();
		$pdo = null;


	}

// Pedir citas como barbero

static public function PedirCitaBarberoM($tablaBD, $datosC){

$pdo = conexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_barbero, id_sede, nyaCli, celular, inicio, fin) 
VALUES (:id_barbero, :id_sede, :nyaCli, :celular, :inicio, :fin)");



 
$pdo -> bindParam(":id_barbero", $datosC["bId"], PDO::PARAM_INT);
$pdo -> bindParam(":id_sede", $datosC["sId"], PDO::PARAM_INT);


$pdo -> bindParam(":nyaCli", $datosC["nombreC"], PDO::PARAM_STR);
$pdo -> bindParam(":celular", $datosC["celularC"], PDO::PARAM_STR);
$pdo -> bindParam(":inicio", $datosC["fyhIC"], PDO::PARAM_STR);
$pdo -> bindParam(":fin", $datosC["fyhFC"], PDO::PARAM_STR); 



if($pdo->execute()){   
	return true;
}

$pdo -> close();
$pdo = null;


}



}

?> 