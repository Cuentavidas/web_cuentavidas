<?php

class Recuerdo {

	public $ID_RECUERDO;
	public $AUTOR;
	public $TITULO;
	public $DESCRIPCION;
	public $ID_PROVINCIA;
	public $URL_VIDEO;
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

	/*public function insert() {
		$this->decode();
		$result = DB::execute("INSERT INTO recuerdo (idprovincia, idsubida, titulo, nombre, descripcion, urlVideo, urlPoster, fecha_alta, ultima_actualizacion, visible) VALUES (:idprovincia, :idsubida, :titulo, :nombre, :descripcion, :urlVideo, :urlPoster, :fecha_alta, :ultima_actualizacion, :visible)", array(":idprovincia" => $this->idprovincia, ":idsubida" => $this->idsubida, ":titulo" => $this->titulo, ":nombre" => $this->nombre, ":descripcion" => $this->descripcion, ":urlVideo" => $this->urlVideo, ":urlPoster" => $this->urlPoster, ":fecha_alta" => $this->fecha_alta, ":ultima_actualizacion" => $this->ultima_actualizacion, ":visible" => $this->visible));
		$this->idrecuerdo = ($result > 0 ? $result : NULL);
		$this->encode();
		return $result > 0;
	}
	
	public function update() {
		$this->decode();
		$result = DB::execute("UPDATE recuerdo SET idprovincia=:idprovincia, idsubida=:idsubida, titulo=:titulo, nombre=:nombre, descripcion=:descripcion, urlVideo=:urlVideo, urlPoster=:urlPoster, fecha_alta=:fecha_alta, ultima_actualizacion=:ultima_actualizacion, visible=:visible WHERE idrecuerdo=:idrecuerdo", array(":idrecuerdo" => $this->idrecuerdo, ":idprovincia" => $this->idprovincia, ":idsubida" => $this->idsubida, ":titulo" => $this->titulo, ":nombre" => $this->nombre, ":descripcion" => $this->descripcion, ":urlVideo" => $this->urlVideo, ":urlPoster" => $this->urlPoster, ":fecha_alta" => $this->fecha_alta, ":ultima_actualizacion" => $this->ultima_actualizacion, ":visible" => $this->visible));
		$this->encode();
		return $result > 0;
	}
	
	public function delete() {
		$this->decode();
		$result = DB::execute("DELETE FROM recuerdo WHERE idrecuerdo=:idrecuerdo", array(":idrecuerdo" => $this->idrecuerdo));
		$this->encode();
		return $result > 0;
	}*/
}
?>
