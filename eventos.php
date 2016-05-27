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
		/*Se revisa el formato del código*/
		$codigo1=$varPost['codigo1'];
		$codigo2=$varPost['codigo2'];
		$codigo3=$varPost['codigo3'];
		$primerCarater1=substr($codigo1, 0, 2);
		$primerCarater2=substr($codigo2, 0, 2);
		$primerCarater3=substr($codigo3, 0, 2);
		$finalCaracter1=substr($codigo1, 5, 4);
		$finalCaracter2=substr($codigo2, 5, 4);
		$finalCaracter3=substr($codigo3, 5, 4);
		//printVar($primerCarater1);
		if($primerCarater1=='L5' || $primerCarater1=='L6'){
			$caracter1="pasa";
		}else{
			$caracter1='na';
		}
		if($primerCarater2=='L5' || $primerCarater2=='L6'){
			$caracter2="pasa";
		}else{
			$caracter2='na';
		}
		if($primerCarater3=='L5' || $primerCarater3=='L6'){
			$caracter3="pasa";
		}else{
			$caracter3='na';
		}
		if($finalCaracter1=='3620' && $finalCaracter2=='3620' && $finalCaracter3=='3620'){
			$fcaracter="pasa";
		}else{
			$fcaracter='na';		
		}
		if($caracter1=='pasa' && $caracter2=='pasa' && $caracter3=='pasa' && $fcaracter=='pasa'){
			$codValido='valido';
		}else{
			$codValido='na';
		}
		if($codValido=='valido'){
			$campos['codigo1']=$varPost['codigo1'];
			$campos['codigo2']=$varPost['codigo2'];
			$campos['codigo3']=$varPost['codigo3'];

			for ($i=1; $i <= 3; $i++) {
				$conteoF=$campos['codigo'.$i];
				printVar($conteoF);
				$codigos[$i]=$camiseta->valicaCodigo($conteoF);
				//printVar($codigos[$i]);
				# code...
			}
			if($codigos[1] && $codigos[2] && $codigos[3]){
			$mensaje="codvalidos";

			}else{
			$mensaje="codnovalidos";

			}
			$codigosC=count($codigo1);
		}else{
			$mensaje="noaplica";
		}
			echo json_encode($mensaje);
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