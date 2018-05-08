<?php 

//llamar a la coneccion a la base de datos
require_once("../controladores/usuariosController.php");
require_once("../modelos/usuariosModel.php");


$usuarios = new UsuarioController();

/*
Declaramos las variables de los valores que se enviaran por el formulario
y que recibimos por ajax y decumos que si existe el parametro que estamos
recibiendo ...
*/

$id_usuario = isset($_POST["id_usuario"]);
$id_usuario = isset($_POST["nombre"]);
$id_usuario = isset($_POST["apellido"]);
$id_usuario = isset($_POST["cedula"]);
$id_usuario = isset($_POST["telefono"]);
$id_usuario = isset($_POST["email"]);
$id_usuario = isset($_POST["direccion"]);
$id_usuario = isset($_POST["cargo"]);
$id_usuario = isset($_POST["usuario"]);
$id_usuario = isset($_POST["password1"]);
$id_usuario = isset($_POST["password2"]);

$estado = isset($_POST["estado"]);
//este es el que se envia al formulario

switch ($_GET["operation"]) {
	case 'guardaryeditar':
		# code...
		break;
	
	default:
		# code...
		break;
}

 ?>