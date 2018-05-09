<?php 


require_once("../config/conexion.php");

class UsuariosModel extends Conexion
{
	//LISTANDO USUARIOS
	public function getUsuarios($tabla)
	{
		$query = "SELECT * FROM $tabla";

		$stmt = Conexion::conexionDatabase()->prepare($query);
		//Conexion::set_names();
		
		if ($stmt->execute()) 
		{
			$resultado = $stmt->fetchAll();
			$stmt = null;
			return $resultado;
		}
		else
		{
			return false;
		}
		
	}

	public function registrarUsuarioModel($datos, $tabla)
	{

		$query = "INSERT INTO $tabla VALUES(null,:nombres,:apellidos,:cedula,:telefono,:correo,:direccion,:cargo,:usuario,:password,:password2,now(),:estado);";

		$stmt = Conexion::conexionDatabase()->prepare($query);
		//Conexion::set_names();

		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
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

		if ($stmt->execute()) 
		{
			return true;
		}

		return false;
	}

	public function editarUsuarioModel($datos, $tabla)
	{
		$query = "UPDATE $tabla SET nombres= :nombres,apellidos= :apellidos,cedula= :cedula,telefono= :telefono,correo= :correo,direccion= :direccion,cargo= :cargo,usuario= :usuario,password= :password,password2= :password2,estado= :estado WHERE id_usuario = :id_usuario";

		$stmt = Conexion::conexionDatabase()->prepare($query);
		//Conexion::set_names();

		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
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

		if ($stmt->execute()) 
		{
			return true;
		}

		return false;
	}

	public function getUsuarioModel($datos, $tabla)
	{
		$query = "SELECT * FROM $tabla WHERE id_usuario = :id_usuario";

		$stmt = Conexion::conexionDatabase()->prepare($query);
		//Conexion::set_names();

		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);

		if ($stmt->execute()) 
		{
			return $stmt->fetchAll();
		}

		return false;
	}

	//EDITAR EL ESTADO DEL USUARIO, activa y desactiva
	//el estado

	public function editarEstadoModel($dato, $tabla)
	{
		$query = "UPDATE $tabla SET (estado= :estado WHERE id_usuario = :id_usuario);";

		$stmt = Conexion::conexionDatabase()->prepare($query);
		//Conexion::set_names();

		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if ($stmt->execute()) 
		{
			return true;
		}

		return false;
	}

	//validar correo y cedula de usuario
	public function getCedulaCorreoUsuarioModel($datos, $tabla)
	{
		$query = "SELECT * FROM $tabla WHERE cedula = :cedula OR correo = :correo";

		$stmt = Conexion::conexionDatabase()->prepare($query);
		//Conexion::set_names();

		$stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["email"], PDO::PARAM_STR);

		if ($stmt->execute()) 
		{
			$resultado = $stmt->fetchAll();
			$stmt = null;
			return $resultado;
		}

		return false;
	}

	public function validarUsuarioInputModel($datos, $tabla)
	{
		$query = "SELECT * FROM $tabla WHERE nombres = :nombres AND apellido = :apellido";

		$stmt = Conexion::conexionDatabase()->prepare($query);
		//Conexion::set_names();

		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);

		if ($stmt->execute()) 
		{
			$resultado = $stmt->fetch();
			$stmt = null;
			return $resultado;
		}

		return false;
	}

}
