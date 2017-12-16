<?php
class Historia {

	public $ID_HISTORIA;
	public $ID_RECUERDO;
	public $TITULO;
	public $AUTOR;
	public $TEXTO;
	public $FECHA_ALTA;
	public $ULTIMA_ACTUALIZACION;
	public $VISIBLE;

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

	public function insert() {
		$this->decode();
		$result = DB::execute("INSERT INTO historia (idrecuerdo, titulo, autor, texto, fecha_alta, ultima_actualizacion, visible) VALUES (:idrecuerdo, :titulo, :autor, :texto, :fecha_alta, :ultima_actualizacion, :visible)", array(":idrecuerdo" => $this->idrecuerdo, ":titulo" => $this->titulo, ":autor" => $this->autor, ":texto" => $this->texto, ":fecha_alta" => $this->fecha_alta, ":ultima_actualizacion" => $this->ultima_actualizacion, ":visible" => $this->visible));
		$this->idhistoria = ($result > 0 ? $result : NULL);
		$this->encode();
		return $result > 0;
	}
	
	public function update() {
		$this->decode();
		$result = DB::execute("UPDATE historia SET idrecuerdo=:idrecuerdo, titulo=:titulo, autor=:autor, texto=:texto, fecha_alta=:fecha_alta, ultima_actualizacion=:ultima_actualizacion, visible=:visible WHERE idhistoria=:idhistoria", array(":idhistoria" => $this->idhistoria, ":idrecuerdo" => $this->idrecuerdo, ":titulo" => $this->titulo, ":autor" => $this->autor, ":texto" => $this->texto, ":fecha_alta" => $this->fecha_alta, ":ultima_actualizacion" => $this->ultima_actualizacion, ":visible" => $this->visible));
		$this->encode();
		return $result > 0;
	}
	
	public function delete() {
		$this->decode();
		$result = DB::execute("DELETE FROM historia WHERE idhistoria=:idhistoria", array(":idhistoria" => $this->idhistoria));
		$this->encode();
		return $result > 0;
	}
}
?>
