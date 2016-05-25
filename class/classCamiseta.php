<?php
class camisetaFt {

	
	public function traeCiudad($idRegion){

	//DB_DataObject::debugLevel(5);
		//Crea una nueva instancia de $tabla a partir de DataObject
		$objDBO = DB_DataObject::Factory('MgmCiudad');
		$objDBO -> selectadd();
		$objDBO -> selectadd('id,ciudad');
		$objDBO -> orderBy("id ASC");
		$objDBO -> whereAdd("idRegion=" . $idRegion);
		//$objDBO -> limit('1');
		$objDBO -> find();
		
		$count = 0;
		while ($objDBO -> fetch()) {
			$ret[$count] -> id = $objDBO -> id;
			$ret[$count] -> ciudad = $objDBO -> ciudad;
			$count++;
		}
		//$ret = $ret + 1;
		//Libera el objeto DBO
		return $ret;
		$objDBO -> free();


		}

		public function traeDireccion($idCiudad){
		//DB_DataObject::debugLevel(5);
			//Crea una nueva instancia de $tabla a partir de DataObject
		$objDBO = DB_DataObject::Factory('MgmTienda');
		$objDBO -> selectadd();
		$objDBO -> selectadd('id,direccion');
		$objDBO -> orderBy("id ASC");
		//$objDBO -> limit('1');
		$objDBO -> whereAdd("idCiudad=" . $idCiudad);
		$objDBO -> find();
		
		$count = 0;
		while ($objDBO -> fetch()) {
			$ret[$count] -> id = $objDBO -> id;
			$ret[$count] -> direccion = $objDBO -> direccion;
			$count++;
		}
		//$ret = $ret + 1;
		//Libera el objeto DBO
		$objDBO -> free();
		return $ret;
		}
	


	}
?>