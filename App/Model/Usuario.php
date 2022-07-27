<?php 

namespace App\Model;

use MF\Molder\Model;
error_reporting(1);

class Usuario extends Model
{
	
	private $id;
	private $nome;
	private $email;
	private $senha;
	private $status;
	

	public function __set($attr,$valor)
	{
		return $this->$attr = $valor;
	}
	public function __get($valor)
	{
		return $this->$valor;
	}

	public function salvar()
	{
		$query = "INSERT INTO usuario(nome_usuario,id_status,senha1,email)
		VALUES(:nome,:status,:senha,:email)";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome',$this->__get('nome'));
		$stmt->bindValue(':status',$this->__get('status'));
		$stmt->bindValue(':senha',$this->__get('senha'));
		$stmt->bindValue(':email',$this->__get('email'));
		$stmt->execute();
		
	}
	public function getUsuario()
	{
		$query ="SELECT nome_usuario,email,id_usuario FROM usuario where email = :email OR nome_usuario = :nome";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome',$this->__get('nome'));
		$stmt->bindValue(':email',$this->__get('email'));
		$stmt->execute();
		$dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $dados;
	}
	public function validarUsuario()
	{
		$validar = true;
		if(strlen($this->__get('nome')) < 3){
			$validar = false;
		}
		if(strlen($this->__get('email')) < 3){
			$validar = false;
		}
		if(strlen($this->__get('senha')) < 3){
			$validar = false;
		}
		if(strlen($this->__get('status')) <=0 ){
			$validar = false;
		}
		
		return $validar;


	}
	public function getFuncionarios()
	{
		$query = "SELECT id_usuario, nome_usuario,email,id_usuario,t1.nome_status FROM usuario t
		inner join usuario_status t1 on t.id_status = t1.id_status";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		$dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $dados;
	}
	public function autenticarUsuario()
	{

		$query ="SELECT email,senha1, nome_usuario, id_usuario,id_status FROM usuario WHERE email = :email AND senha1 = :senha";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':senha',$this->__get('senha'));
		$stmt->bindValue(':email',$this->__get('email'));
		$stmt->execute();
		$dados = $stmt->fetch(\PDO::FETCH_ASSOC); //conusta somente com uma linha, se fosse com muitas seria usando um fetchAll, assim teria que usar um foreach para acessar os dados

		// Se id_usuario e nome_usuaio forem diferente de vazio, ou seja, tenha dados neles, será executado uma atribuição ao nome
		if($dados['id_usuario'] != '' && $dados['nome_usuario'] !=''){
			$this->__set('id',$dados['id_usuario']);
			$this->__set('nome',$dados['nome_usuario']);
			$this->__set('status',$dados['id_status']);
			
		}
		return $this;
	}
}

?>