<?php 
namespace App\Controller;



use MF\Controller\Action;

use MF\Molder\Container;

use App\Model\Usuario;

use App\Model\Tempero;

use App\Model\Empresa;

class indexController extends Action
{

	
	public function index()
	{
		$this->validarAutenticao();
		$usuario = Container::getModel('Usuario');
		$tempero = Container::getModel('Tempero');
		$empresa = Container::getModel('Empresa');
		$this->view->usuario  = $usuario->getFuncionarios();
		$this->view->tempero = $tempero->listarTemperos();
		$this->view->empresa =$empresa->listarEmpresas();
		$this->render('pagina_index','layout');
		

		
		

		
		
		
		

		
	}
		
	public function cadastrarColaborador()
	{
		$this->validarAutenticao();
			
		
		$this->render('pagina_cadastrar_funcionario','layout');
		print_r($this->view->usuario);
		
		
	
	}
	public function vender()
	{

		$this->validarAutenticao();
		$usuario = Container::getModel('Usuario');
		$tempero = Container::getModel('Tempero');
		$empresa = Container::getModel('Empresa');
		$this->view->usuario  = $usuario->getFuncionarios();
		$this->view->tempero = $tempero->listarTemperos();
		$this->view->empresa = $empresa->listarEmpresas();
		
		$this->render('pagina_vender','layout');
		$this->view->venda = isset($_GET['venda']) ? $_GET['venda'] : '';
		$this->view->erro = isset($_GET['erro']) ? $_GET['erro'] :'';

	

		
		
		

	}
	public function dashboard()
	{
		$this->validarAutenticao();
			$this->render('pagina_dashboard','layout');
		

	}
	public function cadastrarProduto()
	{
		
		$this->validarAutenticao();
		$this->render('cadastrar_produto','layout');
		
		
		
		
	}
	public function cadastrarEmpresa()
	{
		$this->validarAutenticao();

		$this->view->erro_cadastro = isset($_GET['erro']) ? $_GET['erro'] : '';
		$this->render('pagina_cadastrar_empresa','layout');
		

	}
	public function cadastroSucesso()
	{ 

		
	$this->validarAutenticao();
		$this->render('pagina_cadastro_sucesso','layout');
	}
	public function login()
	{
		$this->render('login','layout_login');
	}
	public function sair()
	{
		session_start();
		session_destroy();
		header('location:/login');
	}
	public function validarAutenticao()
	{
		session_start();
		error_reporting(1);
		if(!isset($_SESSION['nome']) || $_SESSION['nome'] == '' || !isset($_SESSION['id']) || $_SESSION['id'] == ''){
			header('location:/login');
	
		}
	}





	/*-----------------------------------------------------------------------------*/
	public function cadastro_colaborador()
	{

		$usuario = Container::getModel('Usuario');
		$usuario->__set('nome',$_POST['nome']);
		$usuario->__set('status',$_POST['selecao_cargo']);
		$usuario->__set('senha',$_POST['senha']);
		$usuario->__set('email',$_POST['email']);
		
		 if(count($usuario->getUsuario()) == 0 && $usuario->validarUsuario() == true){
		 	$usuario->salvar();
		 	$this->view->validar = true;
		 	header('location:/cadastro_sucesso');
			
		 }else{
		 	header('location:/cadastrarColaborador');
			
		 }
		
		
	}
	public function cadastro_tempero()
	{
		$valor = $_POST['valor'];
		$atual = str_replace(',', '.', $valor);
		$data = date('y-m-d');
		$tempero = Container::getModel('Tempero');
		$tempero->__set('nome',$_POST['nome']);
		$tempero->__set('qtd',$_POST['qtd']);
		$tempero->__set('peso',$_POST['peso']);
		$tempero->__set('valor',$atual);
		$tempero->__set('codigo_barras',$_POST['codigo_barra']);
		$tempero->__set('id_classificacao',$_POST['tipo']);
		$tempero->__set('data_cadastro',$data);

		print_r($tempero);
		if($tempero->validarCampos() == true){
			$tempero->salvar();
			header('location:/cadastro_sucesso');
		}else{
			echo 'ola';
			header('location:/cadastrarProduto?erro=cadastro_tempero');
		}
		
		
	}
	public function cadastrar_empresa()
	{
		$empresa = Container::getModel('Empresa');

		$empresa->__set('nome',$_POST['nome']);
		$empresa->__set('cnpj',$_POST['cnpj']);
		$empresa->__set('telefone',$_POST['telefone']);
		$empresa->__set('cep',$_POST['cep']);
		$empresa->__set('bairro',$_POST['bairro']);
		$empresa->__set('rua',$_POST['rua']);
		print_r($empresa->validarCampos());
		if($empresa->validarCampos() == true){
			$empresa->salvar();
			header('location:/cadastro_sucesso');
		}else{
			header('location:/cadastrarEmpresa?erro=cadastro');
		}
		
	}
	public function cadastrar_produto()
	{
		$produto = Container::getModel('Produto');
		$produto->__set('id_tempero',$_POST['produto']);
		$produto->__set('id_usuario',$_POST['usuario']);
		$produto->__set('id_empresa',$_POST['empresa']);
		$produto->__set('qtd',$_POST['qtd']);
		if($produto->validarCampos()){
			$produto->cadastrar();
			header('location:/vender?venda=ok');

		}
		else{
			header('location:/vender?erro=null');
		}
		
		
		

		
	}

	

}
?>

