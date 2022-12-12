<?php 

require_once "controladores/plantillaC.php";

require_once "controladores/administradorC.php";
require_once "modelos/administradorM.php";

require_once "controladores/sedesC.php";
require_once "modelos/sedesM.php";

require_once "controladores/barberosC.php";
require_once "modelos/barberosM.php";

require_once "controladores/clientesC.php";
require_once "modelos/clientesM.php";

require_once "controladores/citasC.php";
require_once "modelos/citasM.php";


$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();

?> 