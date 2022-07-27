<?php 
//classe dedicada aos contruotres das classes para trabalhar com o banco de dados
 namespace MF\Molder;


 
abstract class Model 
{
	public $conexao;
	public function __construct($db){
		$this->conexao = $db;
		
	}
}


?>