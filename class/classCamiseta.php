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
			$ret[$count] -> idCiudad = $objDBO -> idCiudad;
			$ret[$count] -> nombre = $objDBO -> nombre;
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


	}
?>