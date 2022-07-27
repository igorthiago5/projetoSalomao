<?php 
//classe decicada à conexao do banco de dados e uso dos contrutores
namespace MF\Molder;

use App\Connection;


abstract class Container
{
	public static  function getModel($model)
	{
	
		$class = "\\App\\Model\\".ucfirst($model);
		$conexao = Connection::getBd();
		return new $class($conexao); //aqui é passado o parâmetro para o contrutor
	}
}

?>