<?php 
namespace App\Model;




use MF\Molder\Model;

class Produto extends Model
{
	private $id_tempero;
	private $id_usuario;
	
	private $id_empresa;
	private $qtd;

	public function __get($valor)
	{
		return $this->$valor;
	}

	public function __set($attr,$valor)
	{
		return $this->$attr = $valor;
	}
	
	public function cadastrar()
	{
		$query = "INSERT INTO venda(id_tempero,id_usuario,id_empresa,qtd)VALUES(:tempero,:usuario,:empresa,:qtd)";

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':tempero',$this->__get('id_tempero'));
		$stmt->bindValue(':usuario',$this->__get('id_usuario'));
		$stmt->bindValue(':empresa',$this->__get('id_empresa'));
		$stmt->bindValue(':qtd',$this->__get('qtd'));
		$stmt->execute();
	}
	public function validarCampos()
	{
		$validar = true;
		if(strlen($this->__get('qtd')) == null || $this->__get('qtd') == 0){
			$validar = false;
		}
		return $validar;
	}
	public function getVendas()
	{
		$query = "  SELECT t.nome_tempero,v.qtd,e.nome_emrpesa, u.nome_usuario
					FROM venda v
					left join empresa e on v.id_empresa = e.id_empresa
					left join usuario u on u.id_usuario = v.id_usuario
					left join tempero t on t.id_tempero = v.id_tempero";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	
}



?>