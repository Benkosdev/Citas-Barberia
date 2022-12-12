<?php
class CitasC{
	//Pedir Cita cliente
	public function EnviarCitaC(){


		

		if(isset($_POST["bId"])){
 
			$tablaBD = "citas";

			$bId = substr($_GET["url"], 8);

			$datosC = array("bId"=>$_POST["bId"], "cId"=>$_POST["cId"], "nyaC"=>$_POST["nyaC"], "sId"=>$_POST["sId"],
              "celularC"=>$_POST["celularC"], "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"]);

			


		$resultado = CitasM::EnviarCitaM($tablaBD, $datosC);
       
		 	if($resultado == true){
	
				echo '<script>

				window.location = "barbero/"'.$bId.';
				</script>';
			}  
		}
		
	}


	// Mostrar Citas en Calendatio
	//static quita error en Js de non-static Model method 

	public static function VerCitasC(){

		$tablaBD = "citas";
		$resultado = CitasM::VerCitasM($tablaBD);
		return $resultado;

	}


	//Pedir citas como barbero


	public function PedirCitaBarberoC(){


		if(isset($_POST["bId"])){


			$tablaBD = "citas";

			$bId = substr($_GET["url"], 6);

			$datosC = array("bId"=>$_POST["bId"], "sId"=>$_POST["sId"], "nombreC"=>$_POST["nombreC"], 
			 "celularC"=>$_POST["celularC"],"fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"]);

				$resultado = CitasM::PedirCitaBarberoM($tablaBD, $datosC);

				if($resultado == true){


					echo '<script>
					
					window.location
					
					window.location = "citas/"'.$bId.';
					
					</scrip>';
				}


		}


	}
}

?>