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
		$cedula=$varPost['prodCedula'];
		//printVar($cedula);

		$existe=$camiseta->cedulaRegistrada($cedula);
		//printVar($existe[0]->id);
		if($existe[0]->id!=NULL || $existe[0]->id!=0){
			$mensaje='existeC';
		}else{
			$mensaje='noexiste';
		}
		echo json_encode($mensaje);
		break;
	/*Registro de usuario*/
	case 'registrar':
		# code...
		//printVar($varPost);
		/*Datos de usauario*/
		$campos['nombre']=$varPost['nombre'];
		$campos['apellido']=$varPost['apellido'];
		$campos['email']=$varPost['email'];
		$campos['telefono']=$varPost['telefono'];
		$campos['genero']=$varPost['genero'];
		$campos['idDepto']=$varPost['idDepto'];
		$campos['idCiudad']=$varPost['idCiudad'];
		$campos['tipoDocumento']=$varPost['tipodoc'];
		$campos['documento']=$varPost['documento'];
		$campos['fnacimiento']=$varPost['nacimiento'];
		$campos['deseoInformacion']=$varPost['iemail'].",".$varPost['itelefono'];
		$campos['autorizaNestle']=$varPost['autorizo'];
		$campos['aceptoTerminos']=$varPost['terminos'];
		$guardaUsu=$camiseta->registraSolicitante($campos);
		/*Redime camiseta*/
			$camps['tallaSelec']=$varPost['tallaSelec'];
			$camps['lote']=$varPost['cod1'].",".$varPost['cod2'].",".$varPost['cod3'];
			$camps['idUsuario']=$guardaUsu;
			$camps['refeCamiseta']=$varPost['codCamisetaRede'];

			$redime=$camiseta->usuarioCamisetaLote($camps);
			$datosCamiseta=$camiseta->traeDatosCamiseta($camps['refeCamiseta']);
			//printVar($datosCamiseta[0]->cantidadXS);
			if($camps['tallaSelec']=='xs'){
				$canitdadxsme=$datosCamiseta[0]->cantidadXS-1;
				$camps['cantidadXS']=$canitdadxsme;
			}else if($camps['tallaSelec']=='s'){
				$canitdadsme=$datosCamiseta[0]->cantidadS-1;
				$camps['cantidadS']=$canitdadsme;
			}else if($camps['tallaSelec']=='m'){
				$canitdadmme=$datosCamiseta[0]->cantidadM-1;
				$camps['cantidadM']=$canitdadmme;
			}else if($camps['tallaSelec']=='l'){
				$canitdadlme=$datosCamiseta[0]->cantidadL-1;
				$camps['cantidadL']=$canitdadlme;
			}else if($camps['tallaSelec']=='xl'){
				$canitdadxlme=$datosCamiseta[0]->cantidadXL-1;
				$camps['cantidadXL']=$canitdadxlme;
			}
			
			
			//die();
			$redimeAct=$camiseta->redimeCamiseta($camps);
		//printVar($guardaUsu);
		if($guardaUsu>0){
			$mensaje="exitoso";
		}else{
			$mensaje="noguarda";
		}
		echo json_encode($mensaje);
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
				//printVar($conteoF);
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
		/*Provicional*/
		case 'redime':
			# code...
		//printVar($varPost);
		//$camps['tallaSelec']=$varPost['tallaSelec'];
		$cedula=$varPost['prodCedula'];
		if(isset($cedula) && $cedula!=''){
			$existe=$camiseta->cedulaRegistrada($cedula);
			//printVar($existe[0]->id);
		//die();

		/*Comprueba que el usuario no tenga más de dos camisetas*/
		$idUsuario=$existe[0]->id;
		$total=$camiseta->cuentaUsuario($idUsuario);

		if(isset($varPost['codCamisetaRede']) && $varPost['codCamisetaRede']!=''){
			//printVar($total);
			if(isset($varPost['cod1']) && $varPost['cod1']!='' && isset($varPost['cod2']) && $varPost['cod2']!='' && isset($varPost['cod3']) && $varPost['cod3']!=''){
					if($total<2){
					$camps['tallaSelec']=$varPost['tallaSelec'];
					$camps['lote']=$varPost['cod1'].",".$varPost['cod2'].",".$varPost['cod3'];
					$camps['idUsuario']=$existe[0]->id;
					$camps['refeCamiseta']=$varPost['codCamisetaRede'];
		
					$redime=$camiseta->usuarioCamisetaLote($camps);
					$datosCamiseta=$camiseta->traeDatosCamiseta($camps['refeCamiseta']);
					//printVar($datosCamiseta[0]->cantidadXS);
					if($camps['tallaSelec']=='xs'){
						$canitdadxsme=$datosCamiseta[0]->cantidadXS-1;
						$camps['cantidadXS']=$canitdadxsme;
					}else if($camps['tallaSelec']=='s'){
						$canitdadsme=$datosCamiseta[0]->cantidadS-1;
						$camps['cantidadS']=$canitdadsme;
					}else if($camps['tallaSelec']=='m'){
						$canitdadmme=$datosCamiseta[0]->cantidadM-1;
						$camps['cantidadM']=$canitdadmme;
					}else if($camps['tallaSelec']=='l'){
						$canitdadlme=$datosCamiseta[0]->cantidadL-1;
						$camps['cantidadL']=$canitdadlme;
					}else if($camps['tallaSelec']=='xl'){
						$canitdadxlme=$datosCamiseta[0]->cantidadXL-1;
						$camps['cantidadXL']=$canitdadxlme;
					}
					
					
					//die();
					$redimeAct=$camiseta->redimeCamiseta($camps);
					if($redimeAct=='1'){
						echo json_encode('redime');
					}
					}else{
						echo json_encode('maximo');
					}
			}else{
				echo json_encode('novienecod');
			}
			
		}else{
			echo json_encode('nocamiseta');
		}
		
		}else{
			echo json_encode('vacio');
		}
		
		

		
			break;
	
	default:
		# code...
		break;
}
?>