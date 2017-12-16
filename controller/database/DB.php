<?php

class DB {

	private static $pdo;

	public static function connect() {
		DB::$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
	}
	
	public static function query($query) {
		if (!isset(DB::$pdo))
			DB::connect();
		
		return DB::$pdo->query($query);
	}
	
	public static function execute($query, $params=NULL, $toClass=NULL) {
		if (!isset(DB::$pdo))
			DB::connect();
		
		$pdostmt = DB::$pdo->prepare($query);
		if (!is_null($params)) {
			$pdostmt->execute($params);
		} else
			$pdostmt->execute();
		if (isset($toClass))
			$pdostmt->setFetchMode(PDO::FETCH_CLASS, $toClass);
		
		$errorInfo = $pdostmt->errorInfo();
		if ($errorInfo[0] != "0") {
			error_log("Error al ejecutar una consulta en la base de datos: " . print_r($errorInfo, true));
			mail("DavidMartinDeCastro@gmail.com", "[ERROR] MySQL " . DB_NAME, "[" . date(DATE_RFC2822) . "]\n" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . "\n\nError al ejecutar una sentencia SQL:\n" . print_r($errorInfo, true), "From: noreply@phpmail.com\nContent-type: text/plain; charset=utf-8");
		}
		
		// SELECT or SHOW
		if (strpos($query, "SELECT") === 0 || strpos($query, "SHOW") === 0)
			return $pdostmt->fetchAll();
		
		// INSERT
		if (strpos($query, "INSERT") === 0) {
			if ($pdostmt->rowCount() > 0)
				return intval(DB::$pdo->lastInsertId());
			return -1;
		}
		
		// UPDATE y DELETE
		return $pdostmt->rowCount();
	}
}
?>
