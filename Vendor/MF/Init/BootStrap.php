<?php 
//classe dedicada a rotas caso crie alguma
namespace MF\Init;

abstract class BootStrap{


	private $route;

	public function __construct(){
		$this->initRoute();
		$this->run($this->getUrl());
	}

	protected function getRoute(){

		return $this->route;
	}
	protected function setRoute(array $route){
		$this->route= $route;
	}

	protected function getUrl(){
		return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
	}
	protected function run($url){
		$rota = $this->getRoute();
		foreach ($rota as $key => $route) {
			if($url==$route['route']){
				$class = "App\\Controller\\".ucfirst($route['controller']);
				$controle = new $class;
				$action = $route['action'];
				$controle->$action();
			}
		}
	}
	

}

?>