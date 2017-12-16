<?php
class Provincia {

	public $ID_PROVINCIA;
	public $NOMBRE;
	public $ENLACE;
	//public $area;

	function __construct() {
		$this->encode();
	}
	
	private function encode() {
		$vars = array_keys(get_object_vars($this));
		foreach($vars as $var)
			$this->$var = is_null($this->$var) ? NULL : utf8_encode($this->$var);
	}
	
	private function decode() {
		$vars = array_keys(get_object_vars($this));
		foreach($vars as $var)
			$this->$var = is_null($this->$var) ? NULL : utf8_decode($this->$var);
	}

	/*public function insert() {
		$this->decode();
		$result = DB::execute("INSERT INTO provincia (nombre, enlace, area) VALUES (:nombre, :enlace, :area)", array(":nombre" => $this->nombre, ":enlace" => $this->enlace, ":area" => $this->area));
		$this->idprovincia = ($result > 0 ? $result : NULL);
		$this->encode();
		return $result > 0;
	}
	
	public function update() {
		$this->decode();
		$result = DB::execute("UPDATE provincia SET nombre=:nombre, enlace=:enlace, area=:area WHERE idprovincia=:idprovincia", array(":idprovincia" => $this->idprovincia, ":nombre" => $this->nombre, ":enlace" => $this->enlace, ":area" => $this->area));
		$this->encode();
		return $result > 0;
	}
	
	public function delete() {
		$this->decode();
		$result = DB::execute("DELETE FROM provincia WHERE idprovincia=:idprovincia", array(":idprovincia" => $this->idprovincia));
		$this->encode();
		return $result > 0;
	}*/
}
?>
