<?php
namespace Curso\Service;

use Application\Service\UsuarioInterface;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\ServiceManager;
use Zend\Db\RowGateway\RowGateway;

class UsuarioService implements UsuarioInterface, ServiceManagerAwareInterface {
	
	protected $serviceLocator;
	
	protected $nombre;
	protected $apellidoPaterno;
	protected $apellidoMaterno;
	
	public function setServiceManager(ServiceManager $serviceManager) {
		$this->sm = $serviceManager;
	}
	
	public function getServiceManager(){
		return $this->sm;
	}
	
	public function testDB(){
		$adapter = $this->getServiceManager()->get('Zend\Db\Adapter\Adapter');
		
		$result = $adapter->query('SELECT * FROM `alumnos` WHERE `clave` = 1', array());
		
		echo get_class($result).'<br />';
		
		$data = $result->current();
		
		print_r($data);
	}

	public function loadById($user_id){
		$adapter = $this->getServiceManager()->get('Zend\Db\Adapter\Adapter');
		
		$result = $adapter->query('SELECT * FROM `alumnos` WHERE `clave` = ?', array($user_id));
		$data = $result->current();
		return $data;
// 		if ($data != null){
// 			$this->hydrator($data);
// 			return true;
// 		}
		
// 		return false;
	}
	
	function loadAll() {
		$adapter = $this->getServiceManager ()->get ( 'Zend\Db\Adapter\Adapter' );
		$result = $adapter->query ( 'SELECT * FROM `alumnos`', Adapter::QUERY_MODE_EXECUTE );
		$data = $result->toArray ();
		return $data;
	}
	
	function deleteById($user_id) {
	
		$adapter = $this->getServiceManager ()->get ( 'Zend\Db\Adapter\Adapter' );
		// query the database
		$resultSet = $adapter->query ( 'SELECT * FROM `alumnos` WHERE `clave` = ?', array (
				$user_id
		) );
	
		// get array of data
		$rowData = $resultSet->current ()->getArrayCopy ();
	
		// row gateway
		$rowGateway = new RowGateway ('clave', 'alumnos', $adapter );
		$rowGateway->populate ( $rowData,true );
	
	
	
		// or delete this row:
		return $rowGateway->delete ();
	}
	
	function add($data){
		$adapter = $this->getServiceManager ()->get ( 'Zend\Db\Adapter\Adapter' );
		$rowGateway = new RowGateway ('clave', 'alumnos', $adapter );
	
		$rowGateway->populate( $data);
		$rowGateway->save();
	
	}
	
	function editById($user_id, $data){
		$adapter = $this->getServiceManager ()->get ( 'Zend\Db\Adapter\Adapter' );
		// query the database
		$resultSet = $adapter->query ( 'SELECT * FROM `alumnos` WHERE `clave` = ?', array (
				$user_id
		) );
	
		// get array of data
		$rowData = $resultSet->current ()->getArrayCopy ();
	
		// row gateway
		$rowGateway = new RowGateway ('clave', 'alumnos', $adapter );
		$rowGateway->populate ( $rowData,true );
		$rowGateway->nombre = $data['nombre'];
		$rowGateway->calificaciones =$data['calificaciones'];
		$rowGateway->save();

	}
	
	function hydrator($data){
// 		$this->setNombre($data->clave);
// 		$this->setApellidoPaterno($data->nombre);
// 		$this->setApellidoMaterno($data->calificaciones);
	}
	/**
	 * @return the $nombre
	 */
	public function getNombre() {
		return $this->nombre.' '.$this->apellidoPaterno.' '.$this->apellidoMaterno;
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