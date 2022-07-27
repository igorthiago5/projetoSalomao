<?php 
//classe dedicada .para controladores, caso crie algum
namespace MF\Controller;

abstract class Action{
	protected $view;
	
	public function __construct(){
		$this->view= new \stdClass();
	}


	protected  function render($view,$layout)
	{

			$this->view->page  = $view;
		if(!file_exists($layout)){
			require_once '../App/View/'.$layout.'.phtml';
			}
			else{
				$this->content();
			}
		
	}

	protected function content(){
		$classeAtual =  get_class($this);
		$novaClasse = str_replace('App\\Controller\\','', $classeAtual);
		$novaClasse =  ucfirst(str_replace('Controller','', $novaClasse));
		require_once '../App/View/'.$novaClasse.'/'.$this->view->page.'.phtml';
	}
	protected function getPagina()
	{
		$url = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
		return $url;
	
	}

	
}

?>