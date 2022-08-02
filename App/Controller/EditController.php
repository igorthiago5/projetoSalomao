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

			
			
			$usuario->__set('nome',$_POST['nome']);
			$usuario->__set('email',$_POST['email']);
			$usuario->__set('senha',$_POST['senha']);
			$usuario->__set('status',$_POST['status']);
			$usuario->__set('id',$_POST['id_atual']);
			$usuario->update();

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