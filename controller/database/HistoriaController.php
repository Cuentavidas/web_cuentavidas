<?php
class HistoriaController {
	public static function selectAll() {
		$historiaArray = DB::execute("SELECT * FROM HISTORIA", NULL, "Historia");
		return $historiaArray;
	}
	
	public static function selectByIdHistoria($idhistoria) {
		$historiaArray = DB::execute("SELECT * FROM HISTORIA WHERE ID_HISTORIA=:idhistoria", array(":idhistoria" => $idhistoria), "Historia");
		if (count($historiaArray) > 0 ) {
			$historia = $historiaArray[0];
			return $historia;
		}
		return NULL;
	}

	public static function selectByRecuerdo($recuerdo, $onlyVisible = false) {
		$historiaArray = DB::execute("SELECT * FROM HISTORIA WHERE ID_RECUERDO=:idrecuerdo AND VISIBLE=1 ORDER BY ULTIMA_ACTUALIZACION DESC", array(":idrecuerdo" => $recuerdo->ID_RECUERDO), "Historia");
		return $historiaArray;
	}
}
?>
