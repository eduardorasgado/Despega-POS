<?php 

require_once("../modelos/usuariosModel.php");

class UsuariosController
{

	public function showUsuarios()
	{
		$usuarios = UsuariosModel::getUsuarios("usuarios");
		
		return $usuarios;
	}

	public function registrarUsuarioController()
	{
		if (isset($_POST["nombre"])) 
		{
			$datos = [
				"nombres" => $_POST["nombres"],
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

			$response = UsuariosModel::registrarUsuarioModel($datos,"usuarios");

			return $response;
		}
	}

	public function editarUsuarioController($datos)
	{



		if (isset($_POST["nombres"])) 
		{
			$response = false;
			if ($password1 == $password2) 
			{
				$datos = [
					"id_usuario" => $_POST["id_usuario"],
					"nombres" => $_POST["nombres"],
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

				$response = UsuariosModel::editarUsuarioModel($datos,"usuarios");

			}
			else
			{
				$errors[] = "Contraseña incorrecta";
				return $errors;
			}
			
			return $response;
		}
	}

	public function getUsuarioController($id_usuario)
	{
		if (isset($id_usuario)) 
		{
			$datos = [
				"id_usuario" => $id_usuario,
			];

			$response = UsuariosModel::getUsuarioModel($datos,"usuarios");


			return $response;
		}
	}

	public function editarEstadoController($id_user, $estado)
	{
		if (isset($id_user))
		{
			//esto se envia via ajax
			
			if ($estado == "0")
			{
				$estado = 1;
			}
			else if ($estado == "1") {
				$estado = 0;
			}
			
			$datos = [
				"id_usuario" => $id_user,
				"estado" => $estado
			];

			$response = UsuariosModel::editarEstadoModel($datos,"usuarios");

			return $response;
		}
	}

	public function getCedulaCorreoUsuarioController($cedula, $email)
	{
		$datos = [
			"cedula" => $cedula,
			"email" => $email
		];

		$response = UsuariosModel::editarEstadoModel($datos,"usuarios");

		return $response;
	}

	public function validarUsuarioInputController($datos)
	{
		
		$response = UsuariosModel::editarEstadoModel($datos,"usuarios");


		//si nombre no existe, se guarda usuario
		if (!$response)
		{
			//Si las passwords coinciden
			if ($password1 == $password2) 
			{
				//Si esta vacio id_usuario
				if (empty($_POST["id_usuario"])) 
				{
					return true;
				}
				else
				{
					$errors[] = "El usuario existe";
					return $errors;
				}
				
			}
			else
			{
				//Si los passwords no coinciden
				$errors[] = "Las contraseñas no coinciden";
				return $errors;

			}

		}
		//Si el nombre existe
		else
		{
			return false;
		}
	}
}