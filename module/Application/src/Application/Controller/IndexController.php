<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//use Application\Service\UsuarioService;
use Curso\Service\UsuarioService;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	echo "Hola Mundo Estoy en el ACTION INDEX";
        return new ViewModel();
    }
    
    public function guardarAction(){
    	
    	echo "Hola Estoy en guardar".'<br />';
    	
    	$params = $this->params()->fromRoute();
    	print_r($params);
    	 
    	$usuario = $this->getServiceLocator()->get('Curso\Service\UsuarioService');
    	$usuario->testDB();
    	//$usuario->loadById($params['clave']);
    	
    	$usuario->save();
    	
    	echo get_class($usuario);
    	 
    	$parametros['objeto_usuario'] = $usuario;
    	 
    	return new ViewModel($parametros);
    }
    
    public function borrarAction(){
    	 
    	echo "Hola Estoy en borrar".'<br />';
    	
    	$params = $this->params()->fromRoute();
    	print_r($params);
    	 
    	$usuario = $this->getServiceLocator()->get('Curso\Service\UsuarioService');
    	$usuario->testDB();
    	 
    	$usuario->delete('clave');
    	 
    	echo get_class($usuario);
    
    	$parametros['objeto_usuario'] = $usuario;
    
    	return new ViewModel($parametros);
    }
    
    public function modificarAction(){
    
    	echo "Hola Estoy en modificar".'<br />';
    
    	$params = $this->params()->fromRoute();
    	print_r($params);
    
    	$usuario = $this->getServiceLocator()->get('Curso\Service\UsuarioService');
    	$usuario->testDB();
    	//$usuario->loadById($params['clave']);
    
    	$usuario->update();
    
    	echo get_class($usuario);
    
    	$parametros['objeto_usuario'] = $usuario;
    
    	return new ViewModel($parametros);
    }
    
    public function holaAction()
    {
    	echo "Hola Mundo estoy en el ACTION HOLA consulta".'<br />';
    	
    	$params = $this->params()->fromRoute();
    	print_r($params);
    	
    	$usuario = $this->getServiceLocator()->get('Curso\Service\UsuarioService');
    	$usuario->testDB();
     	$usuario->loadById($params['clave']);
    	
     	//$usuario->save();
     	
    	
//     	$usuario->setNombre("Doris Vianey");
//     	$usuario->setApellidoMaterno("Tun");
//     	$usuario->setApellidoPaterno("Caamal");
    	
    	echo get_class($usuario);
    	
    	//$parametros['nombre'] = 'Doris Tun';
    	$parametros['objeto_usuario'] = $usuario;
    	
    	return new ViewModel($parametros);
    }
}
