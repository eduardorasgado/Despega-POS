<?php 

require_once("../modelos/usuariosModel.php");

class UsuariosController
{
	public function registrarUsuarioController()
	{
		if (isset($_POST["nombre"])) 
		{
			$datos = [
				"nombre" => $_POST["nombre"],
				"apellidos" => $_POST["apellidos"],
				"cedula" => $_POST["cedula"],
				"telefono" => $_POST["telefono"],
				"correo" => $_POST["correo"],
				"direccion" => $_POST["direccion"],
				"cargo" => $_POST["cargo"],
				"usuario" => $_POST["usuario"],
				"password" => $_POST["password"],
				"password2" => $_POST["password2"],
				"estado" => $_POST["estado"]
			];

			$response = usuariosModel::registrarUsuariosModel($datos,"usuarios");
		}
	}
}