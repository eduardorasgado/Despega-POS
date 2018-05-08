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
$nombre = isset($_POST["nombre"]);
$apellido = isset($_POST["apellido"]);
$cedula = isset($_POST["cedula"]);
$telefono = isset($_POST["telefono"]);
$email = isset($_POST["email"]);
$direccion = isset($_POST["direccion"]);
$cargo = isset($_POST["cargo"]);
$usuario = isset($_POST["usuario"]);
$password1 = isset($_POST["password1"]);
$password2 = isset($_POST["password2"]);

$estado = isset($_POST["estado"]);
//este es el que se envia al formulario


switch ($_GET["operation"]) {
	case 'guardar':

		//en caso de requerir valorar por usuario y cedula
		/*
		$datos = $usuario->getCedulaCorreoUsuarioController($_POST["cedula"], $_POST["email"]);
		*/
		$messages = null;
		$errors = null;

		$datos = [
			"nombre" => $nombre,
			"apellido" => $apellido,
			"password1" => $password1,
			"password2" => $password2,
		];
		$userRegistered = $usuario->validarUsuarioInputController($datos);
		//si hay errors en forma de arrays
		if (is_array($userRegistered)) 
		{
			//manejo de errores en caso de existir usuario en db
			$errors = $userRegistered;
		}
		//Si no es array
		else
		{
			if ($userRegistered == true) {
				$usuario->registrarUsuarioController()
				$messages[] = "El usuario se registro correctamente";
			}
			else if ($userRegistered == false) {
				//si el nombre existe
				$messages[] = "En usuario ya existe"; 
			}
		}

		//Si success
		if (isset($messages)) {
			//incorporamos bootstrap
			?>

				<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert">
						&times;
					</button>
					<strong>Operación exitosa</strong>
					<?php
						foreach ($messages as $message) {
							echo $message;
						}
					?>
				</div>
			<?php
		}

		//if errors
		if (isset($messages)) {
			//incorporamos bootstrap
			?>

				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert">
						&times;
					</button>
					<strong>Operación denegada o fallida</strong>
					<?php
						foreach ($errors as $error)
						{
							echo $error;
						}
					?>
				</div>
			<?php
		}

		break;

	case 'editar':

		$errors = null;
		$messages = null;

		$datos = [
			"nombre" => $nombre,
			"apellido" => $apellido,
			"password1" => $password1,
			"password2" => $password2,
		];
		
		$response = $usuario->editarUsuarioController($datos);

		if ($response == true)
		{
			$messages[] = "Se ha editado con éxito";
		}
		else if (is_array($response))
		{
			$errors = $response;
		}
		else if ($response == false) 
		{
			$messages[] = "Ha ocurrido un error";
		}

		//Si success
		if (isset($messages)) {
			//incorporamos bootstrap
			?>

				<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert">
						&times;
					</button>
					<strong>Operación exitosa</strong>
					<?php
						foreach ($messages as $message) {
							echo $message;
						}
					?>
				</div>
			<?php
		}

		//if errors
		if (isset($messages)) {
			//incorporamos bootstrap
			?>

				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert">
						&times;
					</button>
					<strong>Operación denegada o fallida</strong>
					<?php
						foreach ($errors as $error)
						{
							echo $error;
						}
					?>
				</div>
			<?php
		}
		
		break;

	case 'mostrar':
		
		break;

	case 'activarydesactivar':
		
		break;

	case 'listar':
		
		break;
	
	default:
		# code...
		break;
}

 ?>