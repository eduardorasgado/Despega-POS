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

		$nombre = $datos["nombre"];
		$apellido = $datos["apellidos"];
		$cedula = $datos["cedula"];
		$telefono = $datos["telefono"];
		$email = $datos["correo"];
		$direccion = $datos["direccion"];
		$cargo = $datos["cargo"];
		$usuario = $datos["usuario"];
		$password1 = $datos["password"];
		$password2 = $datos["password2"];
		$estado = $datos["estado"];

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

		if ($stmt->execute()) {
			return true;
		}

		return false;
	}
}
