<?php 


require_once "../controladores/barberosC.php";
require_once "../modelos/barberosM.php";

class barberosA{


    public $bId;

    public function EdBarberoA(){


        $columna = "id";
        $valor = $this->bId;

        $resultado = barberosC::barberoC($columna, $valor);

        echo json_encode($resultado);


    }
}


if(isset($_POST["bId"])){

$ediBarberos = new barberosA();
$ediBarberos -> bId = $_POST["bId"];
$ediBarberos -> EdBarberoA();

}



?>