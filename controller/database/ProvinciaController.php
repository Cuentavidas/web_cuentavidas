<?php

class ProvinciaController {

	public static function selectAll() {

		$provinciaArray = DB::execute("SELECT * FROM PROVINCIA ORDER BY NOMBRE ASC ", NULL, "Provincia");
		return $provinciaArray;

	}
	
	public static function selectByIdProvincia($idprovincia) {

		$provinciaArray = DB::execute("SELECT provincia.* FROM provincia WHERE idprovincia=:idprovincia", array(":idprovincia" => $idprovincia), "Provincia");
		if (count($provinciaArray) > 0 ) {
			$provincia = $provinciaArray[0];
			return $provincia;
		}
		return NULL;
	}

}
?>
