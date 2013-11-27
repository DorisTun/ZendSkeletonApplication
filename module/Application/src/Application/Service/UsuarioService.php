<?php
namespace Application\Service;

class UsuarioService implements UsuarioInterface {
	
	protected $nombre;
	protected $apellidoPaterno;
	protected $apellidoMaterno;
	/**
	 * @return the $nombre
	 */
	public function getNombre() {
		return $this->nombre;
	}

	/**
	 * @return the $apellidoPaterno
	 */
	public function getApellidoPaterno() {
		return $this->apellidoPaterno;
	}

	/**
	 * @return the $apellidoMaterno
	 */
	public function getApellidoMaterno() {
		return $this->apellidoMaterno;
	}

	/**
	 * @param field_type $nombre
	 */
	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	/**
	 * @param field_type $apellidoPaterno
	 */
	public function setApellidoPaterno($apellidoPaterno) {
		$this->apellidoPaterno = $apellidoPaterno;
	}

	/**
	 * @param field_type $apellidoMaterno
	 */
	public function setApellidoMaterno($apellidoMaterno) {
		$this->apellidoMaterno = $apellidoMaterno;
	}
 
}