<?php
require('db/requiers.php');
require('class/classCamiseta.php');

/*se ejecutan eventos dependiendo de lo solicitado*/
$varPost=filter_input_array(INPUT_POST);
$camiseta=new camisetaFt();

$vrtCtr=$varPost['vrtCrt'];
switch ($varPost) {
	case 'ciudad':
		# code...
		  $idRegion=$varPost['idDepto'];
          $ciudad = $camiseta->traeCiudad($idRegion);
          //printVar($ciudad);
          echo json_encode($ciudad);
		break;
	
	default:
		# code...
		break;
}
?>