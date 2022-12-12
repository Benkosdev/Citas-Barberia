<?php


require_once "../controladores/clientesC.php";
require_once "../modelos/clientesM.php";


class clientesA{

    public $pId;

    public function EdClientesA(){



        $columna = "id";
        $valor = $this->cId;

        $resultado = clientesC::verClientesC($columna, $valor);

        echo json_encode($resultado);
    }

    public $Norepetir;

    public function NoRepetirUsuarioA(){

        
        $columna = "usuario";

        $valor = $this->Norepetir;

        $resultado = clientesC::verClientesC($columna, $valor);

        echo json_encode($resultado);

    }

}

if(isset($_POST["cId"])){


    $editarC = new clientesA();
    $editarC -> cId = $_POST["cId"];
    $editarC -> EdClientesA();
}


if(isset($_POST["Norepetir"])){


    $noRepetirUsuario = new clientesA();
    $noRepetirUsuario -> Norepetir = $_POST["Norepetir"];
    $noRepetirUsuario -> NoRepetirUsuarioA();

}

?>