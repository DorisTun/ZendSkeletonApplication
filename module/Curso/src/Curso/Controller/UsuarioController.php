<?php

namespace Curso\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UsuarioController extends AbstractActionController
{
		public function indexAction()
	    { 	    
	    	//Sellama al servicio
	    	$usuario=$this->getServiceLocator()->get('Curso\Service\UsuarioService');
	      	$params=$this->params()->fromRoute();
	      	/////////////////////
	       	
	    	$data['all']=$usuario->loadAll();
	        return new ViewModel($data);
	    }
	    
	    public function DeleteAction(){
	    	$usuario=$this->getServiceLocator()->get('Curso\Service\UsuarioService');
	    	$params=$this->params()->fromRoute();
	    	 
	    
	    	$data['delete']=$usuario->deleteById($params['id']);
	    
	    	return $this->redirect()->toRoute('usuario');
	    
	    }
	    
	    public function AddAction(){
	    
	    	$prg = $this->prg('/usuario/index', true);
	    	$usuario=$this->getServiceLocator()->get('Curso\Service\UsuarioService');
	    	if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
	    		$datos=array();
	    		$datos['clave']=$this->params()->fromPost('clave');
	    		$datos['nombre']=$this->params()->fromPost('nombre');
	    		$datos['calificaciones']=$this->params()->fromPost('calificaciones');
	    		$usuario->add($datos);
	    		 
	    		return $prg;
	    	}
	    	 
	    
	    	return new ViewModel();
	    }
	    
	    public function EditAction(){
	    
	    	$prg = $this->prg('/usuario/index', true);
	    	$usuario=$this->getServiceLocator()->get('Curso\Service\UsuarioService');
	    	$params=$this->params()->fromRoute();
	    	$data['datos']=$usuario->loadById($params['id']);
	    	//////
	    	if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
	    		$datos=array();
	    		$datos['nombre']=$this->params()->fromPost('nombre');
	    		$datos['calificaciones']=$this->params()->fromPost('calificaciones');
	    		$usuario->editById($this->params()->fromPost('clave'), $datos);
	    		// returned a response to redirect us
	    		return $prg;
	    	}
	    
	    
	    	return new ViewModel($data);
	    }
}