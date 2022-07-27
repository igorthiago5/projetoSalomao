<?php 
namespace App;
use MF\Init\BootStrap;

class Route extends BootStrap
{
	protected function initRoute(){
		$route['index'] = [
			'route'=>'/',
			'controller'=>'indexController',
			'action'=>'index'
		];
		$route['cadastrarColaborador'] = [
				'route'=>'/cadastrarColaborador',
				'controller' =>'indexController',
				'action'=>'cadastrarColaborador'
		];
		$route['vender'] = [
				'route'=>'/vender',
				'controller' =>'indexController',
				'action'=>'vender'
		];
		$route['dashboard'] = [
				'route'=>'/dashboard',
				'controller' =>'indexController',
				'action'=>'dashboard'
		];
			$route['cadastrarProduto'] = [
				'route'=>'/cadastrarProduto',
				'controller' =>'indexController',
				'action'=>'cadastrarProduto'
		];
			$route['cadastrarEmpresa'] = [
				'route'=>'/cadastrarEmpresa',
				'controller' =>'indexController',
				'action'=>'cadastrarEmpresa'
		];
		$route['cadastro_colaborador'] = [
			'route' =>'/cadastro_colaborador',
			'controller' =>'indexController',
			'action'=>'cadastroColaborador'


		];
		$route['cadastro_sucesso'] = [
			'route' =>'/cadastro_sucesso',
			'controller' =>'indexController',
			'action'=>'cadastroSucesso'


		];
		$route['cadastro_tempero'] = [
			'route' =>'/cadastro_tempero',
			'controller' =>'indexController',
			'action'=>'cadastro_tempero'


		];
			$route['cadastro_empresa'] = [
			'route' =>'/cadastro_empresa',
			'controller' =>'indexController',
			'action'=>'cadastrar_empresa'


		];
		$route['cadastrar_produto'] = [
			'route'=>'/cadastrar_produto',
			'controller' =>'indexController',
			'action'=>'cadastrar_produto'

		];
		$route['login'] = [
			'route'=>'/login',
			'controller' =>'indexController',
			'action'=>'login'

		];
		$route['autenticar'] = [
			'route'=>'/autenticar',
			'controller' =>'AuthController',
			'action'=>'autenticar'

		];
			$route['sair'] = array(
			'route' =>'/sair',
			'controller' =>'indexController',
			'action'=> 'sair'
		);
				$route['Edition'] = array(
			'route' =>'/edit',
			'controller' =>'EditController',
			'action'=> 'edit'
		);
				$route['alterar_dados'] = array(
			'route' =>'/alterar',
			'controller' =>'EditController',
			'action'=> 'alterarDados'
		);
		


		$this->setRoute($route);
	}
	

	
	
}







?>