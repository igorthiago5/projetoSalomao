<?php 
namespace App\Model;




use MF\Molder\Model;

class Tempero extends Model
{
	private $nome;
	private $valor;
	private $data_cadastro ;
	private $qtd;
	private $id_classificacao;
	private $peso;
	private $codigo_barras;

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
		$query ="INSERT INTO tempero(nome_tempero,data_cadastro,quantidade,id_classificacao,peso,valor_tempero,codigo_barra) VALUES(:nome,now(),:qtd,:id,:peso,:valor,:codigo_barra)";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome',$this->__get('nome'));
		$stmt->bindValue(':qtd',$this->__get('qtd'));
		$stmt->bindValue(':id',$this->__get('id_classificacao'));
		$stmt->bindValue(':peso',$this->__get('peso'));
		$stmt->bindValue(':valor',$this->__get('valor'));
		$stmt->bindValue(':codigo_barra',$this->__get('codigo_barras'));
		$stmt->execute();
	}
	public function validarCampos()
	{
		$validar = true;
		if(strlen($this->__get('nome')) == null){
			$validar = false;
		}
		if(strlen($this->__get('codigo_barras')) == null ){
			$validar = false;
		}
		if(strlen($this->__get('valor'))  == null ){
			$validar = false;
		}
		if(strlen($this->__get('qtd')) == null){
			$validar = false;
		}
		if(strlen($this->__get('peso')) == null){
			$validar = false;
		}
		
		return $validar;
	}
	public function listarTemperos()
	{
		$query ="SELECT t1.id_tempero,t1.nome_tempero,t1.quantidade,t1.valor_tempero, t2.nome FROM tempero t1
		INNER JOIN classificacao t2 ON t1.id_classificacao = t2.id_classificacao";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		$dados =  $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $dados;
	}
}


?>