<?php

class RecuerdoController {

	public static function selectAll() {
		$recuerdoArray = DB::execute("SELECT recuerdo.* FROM recuerdo ORDER BY fecha_alta DESC", NULL, "Recuerdo");
		return $recuerdoArray;
	}
	
	public static function selectByIdRecuerdo($idrecuerdo) {
		$recuerdoArray = DB::execute("SELECT * FROM RECUERDO WHERE ID_RECUERDO=:idrecuerdo", array(":idrecuerdo" => $idrecuerdo), "Recuerdo");

		if (count($recuerdoArray) > 0 ) {
			$recuerdo = $recuerdoArray[0];
			return $recuerdo;
		}

		return NULL;
	}

	public static function selectByProvincia($provincia, $currentPage = 0) {
		$recuerdoArray = DB::execute("SELECT * FROM RECUERDO WHERE ID_PROVINCIA=:idprovincia ORDER BY fecha_alta DESC LIMIT " . ($currentPage * MAX_VIDEOS_PER_PAGE) . ", " . MAX_VIDEOS_PER_PAGE, array(":idprovincia" => $provincia), "Recuerdo");
		return $recuerdoArray;
	}

	public static function selectBySubida($subida) {
		$recuerdoArray = DB::execute("SELECT * FROM RECUERDO WHERE ID_RECUERDO=:idsubida ORDER BY FECHA_ALTA DESC", array(":idsubida" => $subida->idsubida), "Recuerdo");
		return $recuerdoArray;
	}

	public static function selectVisible($currentPage = 0) {
		$recuerdoArray = DB::execute("SELECT * FROM RECUERDO WHERE VISIBLE=1 ORDER BY FECHA_ALTA DESC LIMIT " . ($currentPage * MAX_VIDEOS_PER_PAGE) . ", " . MAX_VIDEOS_PER_PAGE, NULL, "Recuerdo");
		return $recuerdoArray;
	}

	public static function selectVisiblePortada() {
		$recuerdoArray = DB::execute("SELECT * FROM RECUERDO WHERE VISIBLE=1 ORDER BY FECHA_ALTA DESC LIMIT " . 0 . ", " . 20, NULL, "Recuerdo");
		return $recuerdoArray;
	}
	
	public static function selectByIdRecuerdoAndVisible($idrecuerdo) {
		$recuerdoArray = DB::execute("SELECT * FROM RECUERDO WHERE ID_RECUERDO=:idrecuerdo AND VISIBLE=1 ORDER BY FECHA_ALTA DESC", array(":idrecuerdo" => $idrecuerdo), "Recuerdo");
		if (count($recuerdoArray) > 0 ) {
			$recuerdo = $recuerdoArray[0];
			return $recuerdo;
		}
		return NULL;
	}
	
	public static function getVisibleCount() {
		$recuerdoArray = DB::execute("SELECT COUNT(*) AS count FROM RECUERDO WHERE VISIBLE=1", NULL, NULL);
		$recuerdoArray = $recuerdoArray[0];
		return $recuerdoArray["count"];
	}

	public static function getVisibleCountByProvincia($idProvincia) {
		$recuerdoArray = DB::execute("SELECT COUNT(*) AS count FROM RECUERDO WHERE visible=1 AND ID_PROVINCIA=" . $idProvincia , NULL, NULL);
		$recuerdoArray = $recuerdoArray[0];
		return $recuerdoArray["count"];
	}
}

?>
