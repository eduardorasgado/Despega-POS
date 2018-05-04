<?php 

class Conexion
{
	protected $dbh;

	public function conexionDatabase()
	{
		$host = "host=localhost;";
		$dbname = "dbname=db-despegaPOS";
		$username = "root";
		$pass = "";
		
		try 
		{
			$conectar = $this->dbh = new PDO("mysql:".$host.$dbname, $username, $pass);
			return $conectar;

		} 
		catch (Exception $e) 
		{
			echo "Error!".$e->getMessage()."<br>";
			die();
		}

		
	}

	public function set_names()
	{
		return $this->dbh->query("SET NAMES 'utf8'");
	}

	public function ruta()
	{
		return "http://localhost/proyecto/";
	}
}
