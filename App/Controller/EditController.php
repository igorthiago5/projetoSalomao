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
		$dados = null;
		$usuario = Container::getModel('Usuario');
		$this->view->dados_atualizados = $usuario->getFuncionarios();
		print_r($this->view->dados_atualizados['email']);

			
		$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
		$this->view->acao = $acao;
		if($acao == 'atualizar'){
			
			$confirmar_senha = $_POST['confirmar_senha'];
			$usuario->__set('id',$_POST['id_atual']);
			$usuario->__set('nome',$_POST['nome']);
			$usuario->__set('email',$_POST['email']);
			$usuario->__set('senha',$_POST['senha']);
			$usuario->__set('status',$_POST['status']);
			if($usuario->validarSenha($confirmar_senha) == true && count($usuario->certificarUsuario()) == 0){
				// print_r($usuario->validarSenha($confirmar_senha));
				// print_r(count($usuario->certificarUsuario()));
			 $usuario->update();
			$this->view->dados_atualizados = $usuario->getFuncionarios();

				
			
			}	
			else{
				
				header('location:edit?acao=erro');
				
			}
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