<?php 
namespace App\Model;



use MF\Molder\Model;



class Empresa   extends Model
{
	private $nome;
	private $cnpj;
	private $telefone;
	private $cep;
	private $bairro;
	private $rua;

	public function __get($valor)
	{
		return $this->$valor;
	}
	public function __set($attr,$valor)
	{
		return $this->$attr = $valor;
	}
	public function salvar()
	{
		$query = "INSERT INTO empresa(nome_emrpesa, cnpj, data_cadastro, telefone, cep, bairro, rua) VALUES(:nome,:cnpj,now(),:telefone,:cep,:bairro,:rua)";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome',$this->__get('nome'));
		$stmt->bindValue(':cnpj',$this->__get('cnpj'));
		$stmt->bindValue(':telefone',$this->__get('telefone'));
		$stmt->bindValue(':cep',$this->__get('cep'));
		$stmt->bindValue(':bairro',$this->__get('bairro'));
		$stmt->bindValue(':rua',$this->__get('rua'));
		$stmt->execute();

	}
	public function validarCampos()
	{
		$validar = true;
		if(strlen($this->__get('nome')) < 2){
			$validar = false;
		}
		if(strlen($this->__get('cnpj')) < 2){
			$validar = false;
		}
		if(strlen($this->__get('telefone')) < 2){
			$validar = false;
		}
		if(strlen($this->__get('cep')) < 2){
			$validar = false;
		}
		if(strlen($this->__get('bairro')) < 2){
			$validar = false;
		}
			if(strlen($this->__get('rua')) < 2){
			$validar = false;
		}
		return $validar;

	}
	public function listarEmpresas()
	{
		$query = "SELECT nome_emrpesa,rua,id_empresa from empresa";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		$dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $dados;
		
		
	}
	

	
}



?>