<?php 
namespace App;

class Connection{

	public static function getBd(){
		try {

		return new \PDO("mysql:host=localhost;dbname=salomao;","dev","1234567");
		
			
		} catch (\PDOException $e) {
			echo $e->getMessage();	
		}
	}
}

?>