<?php
namespace Application\Service;

interface UsuarioInterface {
	public function getNombre();
	public function getApellidoPaterno();
	public function getApellidoMaterno();
	
	public function setNombre($nombre);
	public function setApellidoMaterno($apellido_materno);
	public function setApellidoPaterno($apellido_paterno);
}