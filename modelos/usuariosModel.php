<?php 


require_once("../config/conexion.php");

class UsuariosModel extends Conexion
{
	//LISTANDO USUARIOS
	public function getUsuarios($tabla)
	{
		$stmt = Conexion::conexionDatabase();
		Conexion::set_names();
		
		$query = "SELECT FROM usuarios";

		$stmt->prepare($query);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function registrarUsuarioModel($datos, $tabla)
	{
		$stmt = Conexion::conexionDatabase();
		Conexion::set_names();

		$query = "INSERT INTO $tabla VALUES(null,:nombre,:apellidos,:cedula,:telefono,:correo,:direccion,:cargo,:usuario,:password,:password2,now(),:estado);";


		$stmt->bindParam(":nombre", $datos["nombre"]);
		$stmt->bindParam(":apellidos", $datos["apellidos"]);
		$stmt->bindParam(":cedula", $datos["cedula"]);
		$stmt->bindParam(":telefono", $datos["telefono"]);
		$stmt->bindParam(":correo", $datos["correo"]);
		$stmt->bindParam(":direccion", $datos["direccion"]);
		$stmt->bindParam(":cargo", $datos["cargo"]);
		$stmt->bindParam(":usuario", $datos["usuario"]);
		$stmt->bindParam(":password", $datos["password"]);
		$stmt->bindParam(":password2", $datos["password2"]);
		$stmt->bindParam(":estado", $datos["estado"]);

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

		$query = "UPDATE $tabla SET (null,nombre= :nombre,apellidos= :apellidos,cedula= :cedula,telefono= :telefono,correo= :correo,direccion= :direccion,cargo= :cargo,usuario= :usuario,password= :password,password2= :password2,estado= :estado WHERE id_usuario = :id_usuario);";


		$stmt->bindParam(":id_usuario", $datos["id_usuario"]);
		$stmt->bindParam(":nombre", $datos["nombre"]);
		$stmt->bindParam(":apellidos", $datos["apellidos"]);
		$stmt->bindParam(":cedula", $datos["cedula"]);
		$stmt->bindParam(":telefono", $datos["telefono"]);
		$stmt->bindParam(":correo", $datos["correo"]);
		$stmt->bindParam(":direccion", $datos["direccion"]);
		$stmt->bindParam(":cargo", $datos["cargo"]);
		$stmt->bindParam(":usuario", $datos["usuario"]);
		$stmt->bindParam(":password", $datos["password"]);
		$stmt->bindParam(":password2", $datos["password2"]);
		$stmt->bindParam(":estado", $datos["estado"]);

		$stmt->prepare($query);

		if ($stmt->execute()) 
		{
			return true;
		}

		return false;
	}
}
