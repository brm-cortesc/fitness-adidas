<?php
require('db/requires.php');
ini_set('display_errors','0');
/*se ejecutan eventos dependiendo de lo solicitado*/
$varPost=filter_input_array(INPUT_POST);
$camiseta=new camisetaFt();

//printVar($varPost);
$vrtCtr=$varPost['vrtCrt'];
//printVar($vrtCtr);
switch ($vrtCtr) {
	/*Trae ciudades por departamento*/
	case 'ciudad':
		# code...
	//echo 'Hola';
		  $idRegion=$varPost['idDepto'];
          $ciudad = $camiseta->traeCiudad($idRegion);
          //printVar($ciudad);
          echo json_encode($ciudad);
		break;
	/*Verifica si ya se encuentra registrada la cedula*/
	case 'cc':
		# code...
		break;
	/*Registro de usuario*/
	case 'registrar':
		# code...
		break;
	/*Valida código de redención*/	
	case 'validacodigo':
		# code...
		break;
	/*Trae datos de camiseta*/
	case 'camiseta':
		# code...
		$codCamiseta=strtoupper($varPost['codCamiseta']);
		//printVar($codCamiseta);
		$datosC=$camiseta->traeDatosCamiseta($codCamiseta);
		$codCamisetaR=$camiseta->traeDatosRelacionados($varPost['relacionadas']);
		echo json_encode(array("camisetas"=>$datosC, "relacionadas"=>$codCamisetaR));
		break;
	
	default:
		# code...
		break;
}
?>