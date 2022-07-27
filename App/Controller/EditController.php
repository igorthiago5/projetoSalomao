<?php 
namespace  App\Controller;


use MF\Controller\Action;

use App\Model\Usuario;

use MF\Molder\Container;

class EditController extends Action
{
	public function edit()
	{
		$this->validarAutenticao();
		
		$usuario = Container::getModel('Usuario');
		$this->view->usuario = $usuario->getFuncionarios();
		$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
		if($acao == 'atualizar'){
			echo 'ola';

		}
		$this->render('pagina_edit','layout');


	}
	public function validarAutenticao()
	{
		session_start();
		error_reporting(1);
		if(!isset($_SESSION['nome']) || $_SESSION['nome'] == '' || !isset($_SESSION['id']) || $_SESSION['id'] == ''){
			header('location:/login');
	
		}
	}

	
}








?>