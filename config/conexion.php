<?php 

class Conexion
{

	public function conexionDatabase()
	{
		$host = "host=localhost;";
		$dbname = "dbname=db-despegaPOS";
		$username = "root";
		$pass = "";
		
		try 
		{
			$conectar = new PDO("mysql:".$host.$dbname, $username, $pass);
			return $conectar;

		} 
		catch (Exception $e) 
		{
			echo "Error!".$e->getMessage()."<br>";
			die();
		}

		
	}
/*
	public function set_names()
	{
		//return $this->dbh->query("SET NAMES 'utf8'");
		return true;
	}
*/
	public function ruta()
	{
		return "http://localhost/Despega-POS/";
	}
}
