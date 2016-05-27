<?php
class camisetaFt {

	
	function traeCiudad($idRegion){

	//DB_DataObject::debugLevel(5);
		//Crea una nueva instancia de $tabla a partir de DataObject
		$objDBO = DB_DataObject::Factory('FtCiudad');
		$objDBO -> selectadd();
		$objDBO -> selectadd('idCiudad,nombre');
		$objDBO -> orderBy("idCiudad ASC");
		$objDBO -> whereAdd("idDepto=" . $idRegion);
		//$objDBO -> limit('1');
		$objDBO -> find();
		
		$count = 0;
		while ($objDBO -> fetch()) {
			$ret[$count]->idCiudad = $objDBO->idCiudad;
			$ret[$count]->nombre = utf8_encode($objDBO->nombre);
			$count++;
		}
		//$ret = $ret + 1;
		//Libera el objeto DBO
		return $ret;
		$objDBO -> free();


		}

	function traeCamisetas(){
		//DB_DataObject::debugLevel(5);
		$camisetast= DB_DataObject::Factory('FtCamiseta');
		$camisetast->selectadd();
		$camisetast->selectadd('id,idRefe,articuloSerial,nombre,cantidadXS,cantidadS,cantidadM,cantidadL,cantidadXL');
		$camisetast->groupBy('idRefe');
		$camisetast->orderBy('RAND()');

		$camisetast->find();
		$count = 0;
		while ($camisetast -> fetch()) {
			$ret[$count] -> id = $camisetast -> id;
			$ret[$count] -> nombre = $camisetast -> nombre;
			$ret[$count] -> idRefe = $camisetast -> idRefe;
			$ret[$count] -> articuloSerial = $camisetast -> articuloSerial;
			$ret[$count] -> cantidadXS = $camisetast -> cantidadXS;
			$ret[$count] -> cantidadS = $camisetast -> cantidadS;
			$ret[$count] -> cantidadM = $camisetast -> cantidadM;
			$ret[$count] -> cantidadL = $camisetast -> cantidadL;
			$ret[$count] -> cantidadXL = $camisetast -> cantidadXL;
			$count++;
		}
		return $ret;
		$objDBO -> free();

	}
	/*Funcion para traer los datos de la camiseta seleccionada*/
	function traeDatosCamiseta($codCamiseta){
		//DB_DataObject::debugLevel(5);
		$camiseta= DB_DataObject::Factory('FtCamiseta');
		$camiseta->selectadd();
		$camiseta->selectadd('id,idRefe,articuloSerial,nombre,cantidadXS,cantidadS,cantidadM,cantidadL,cantidadXL');
		$camiseta->whereAdd("articuloSerial ='".$codCamiseta."'");
		$camiseta->find();
		$count = 0;
		while ($camiseta -> fetch()) {
			$camisa[$count] -> id = $camiseta -> id;
			$camisa[$count] -> nombre = $camiseta -> nombre;
			$camisa[$count] -> idRefe = $camiseta -> idRefe;
			$camisa[$count] -> articuloSerial = $camiseta -> articuloSerial;
			$camisa[$count] -> cantidadXS = $camiseta -> cantidadXS;
			$camisa[$count] -> cantidadS = $camiseta -> cantidadS;
			$camisa[$count] -> cantidadM = $camiseta -> cantidadM;
			$camisa[$count] -> cantidadL = $camiseta -> cantidadL;
			$camisa[$count] -> cantidadXL = $camiseta -> cantidadXL;
			$count++;
		}
		return $camisa;
		$camiseta-> free();

	}
	/*Camisetas relacionadas*/
	function traeDatosRelacionados($relacionadas){
		//DB_DataObject::debugLevel(5);
		$camiseta= DB_DataObject::Factory('FtCamiseta');
		$camiseta->selectAdd();
		$camiseta->selectAdd('id,idRefe,articuloSerial,nombre,cantidadXS,cantidadS,cantidadM,cantidadL,cantidadXL');
		$camiseta->whereAdd("idRefe ='".$relacionadas."'");
		$camiseta->find();
		$count = 0;
		while ($camiseta -> fetch()) {
			$camisa[$count] -> id = $camiseta -> id;
			$camisa[$count] -> nombre = $camiseta -> nombre;
			$camisa[$count] -> idRefe = $camiseta -> idRefe;
			$camisa[$count] -> articuloSerial = $camiseta -> articuloSerial;
			$camisa[$count] -> cantidadXS = $camiseta -> cantidadXS;
			$camisa[$count] -> cantidadS = $camiseta -> cantidadS;
			$camisa[$count] -> cantidadM = $camiseta -> cantidadM;
			$camisa[$count] -> cantidadL = $camiseta -> cantidadL;
			$camisa[$count] -> cantidadXL = $camiseta -> cantidadXL;
			$count++;
		}
		return $camisa;
		$camiseta-> free();
	}

	/*Validación de los códigos*/
	function valicaCodigo($codigo){
		//DB_DataObject::debugLevel(5);
		//printVar($codigo);
		$codigos=DB_DataObject::Factory('FtLote');
		$codigos->lote=$codigo;
		$return =false;
		$find=$codigos->find();
		if($find>0){
			$return = true;
		}
		
		//printVar($return);
		return $return;
	}

	function registraSolicitante($campos){
		//printVar($campos);
		//DB_DataObject::debugLevel(3);
		$dbdata = DB_DataObject::Factory('FtUsuario');
		$dbdata->nombre = $campos['nombre'];
		$dbdata->apellido =  $campos['apellido'];
		$dbdata->email = $campos['email'];
		$dbdata->telefono = $campos['telefono'];
		$dbdata->genero = $campos['genero'];
		$dbdata->idDepto = $campos['idDepto'];
		$dbdata->idCiudad = $campos['idCiudad'];
		$dbdata->tipoDocumento = $campos['tipoDocumento'];
		$dbdata->documento = $campos['documento'];
		$dbdata->fechaNacimiento = $campos['fnacimiento'];
		$dbdata->deseoInformacion = $campos['deseoInformacion'];
		$dbdata->autorizaNestle = $campos['autorizaNestle'];
		$dbdata->aceptoTerminos = $campos['aceptoTerminos'];
		$dbdata->fecha = date("Y-m-d H:i:s");

		$dbdata -> insert();

		$dbdata -> free();
		return $dbdata->id;
	}
	/*Valida cedula registrada*/
	function cedulaRegistrada($cedula){
		$dbdata = DB_DataObject::Factory('FtUsuario');
		$dbdata->selectAdd();
		$dbdata->selectAdd('id,documento');
		$dbdata->whereAdd("documento ='".$cedula."'");
		$dbdata->find();
		$count = 0;
		while ($dbdata -> fetch()) {
			$cedulaE[$count] -> id = $dbdata -> id;
			$cedulaE[$count] -> documento = $dbdata -> documento;
			$count++;
		}
		//printVar($existe);
		return $cedulaE;
		$dbdata-> free();
	}
}
?>
