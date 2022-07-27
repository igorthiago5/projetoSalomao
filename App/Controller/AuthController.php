<?php 
namespace App\Controller;



use MF\Controller\Action;

use MF\Molder\Container;

class AuthController extends Action
{
	public function  autenticar()
	{
		$usuario = Container::getModel('Usuario');
		$usuario->__set('email',$_POST['email']);
		$usuario->__set('senha',$_POST['senha']);
		$dados = $usuario->autenticarUsuario();
		if($dados->__get('nome') != '' && $dados->__get('id') != ''){
			session_start();
			$_SESSION['nome'] = $dados->__get('nome');
			$_SESSION['id'] =$dados->__get('id');
			header('location:/');
		}
		else{
			header('location:/login?erro=login_errado');
		}
		
	}
}


?>