<?php
require('db/requires.php');
require('class/classCamiseta.php');

/*se ejecutan eventos dependiendo de lo solicitado*/
$varPost=filter_input_array(INPUT_POST);
$camiseta=new camisetaFt();

printVar($varPost);
$vrtCtr=$varPost['vrtCrt'];
printVar($vrtCtr);
switch ($vrtCtr) {
	case 'ciudad':
		# code...
	//echo 'Hola';
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