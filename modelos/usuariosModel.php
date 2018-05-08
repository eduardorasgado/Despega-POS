<?php 


require_once("../config/conexion.php");

class UsuariosModel extends Conexion
{
	//LISTANDO USUARIOS
	public function getUsuarios($tabla)
	{
		$stmt = Conexion::conexionDatabase();
		Conexion::set_names();
		
		$query = "SELECT * FROM usuarios";

		$stmt->prepare($query);

		$stmt->execute();

		$resultado = $stmt->fetchAll();

		$stmt = null;

		return $resultado;
	}

	public function registrarUsuarioModel($datos, $tabla)
	{
		$stmt = Conexion::conexionDatabase();
		Conexion::set_names();

		$query = "INSERT INTO $tabla VALUES(null,:nombre,:apellidos,:cedula,:telefono,:correo,:direccion,:cargo,:usuario,:password,:password2,now(),:estado);";


		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":password2", $datos["password2"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		$stmt->prepare($query);

		if ($stmt->execute()) 
		{
			return true;
		}

		return false;
	}

	public function editarUsuarioModel($datos, $tabla)
	{
		$stmt = Conexion::conexionDatabase();
		Conexion::set_names();

		$query = "UPDATE $tabla SET nombre= :nombre,apellidos= :apellidos,cedula= :cedula,telefono= :telefono,correo= :correo,direccion= :direccion,cargo= :cargo,usuario= :usuario,password= :password,password2= :password2,estado= :estado WHERE id_usuario = :id_usuario";


		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":password2", $datos["password2"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		$stmt->prepare($query);

		if ($stmt->execute()) 
		{
			return true;
		}

		return false;
	}

	public function getUsuarioModel($datos, $tabla)
	{
		$stmt = Conexion::conexionDatabase();
		Conexion::set_names();

		$query = "SELECT * FROM $tabla WHERE id_usuario = :id_usuario";

		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);

		$stmt->prepare($query);

		if ($stmt->execute()) 
		{
			return $stmt->fetch();
		}

		return false;
	}

	//EDITAR EL ESTADO DEL USUARIO, activa y desactiva
	//el estado

	public function editarEstadoModel($dato, $estado $tabla)
	{
		$stmt = Conexion::conexionDatabase();
		Conexion::set_names();

		$query = "UPDATE $tabla SET (estado= :estado WHERE id_usuario = :id_usuario);";


		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		$stmt->prepare($query);

		if ($stmt->execute()) 
		{
			return true;
		}

		return false;
	}

	//validar correo y cedula de usuario
	public function getCedulaCorreoUsuarioModel($datos, $tabla)
	{
		$stmt = Conexion::conexionDatabase();
		Conexion::set_names();

		$query = "SELECT * FROM $tabla WHERE cedula = :cedula OR correo = :correo";

		$stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["email"], PDO::PARAM_STR);

		$stmt->prepare($query);

		if ($stmt->execute()) 
		{
			$resultado = $stmt->fetchAll();
			$stmt = null;
			return $resultado;
		}

		return false;
	}

}
