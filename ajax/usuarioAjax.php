<?php 

//llamar a la coneccion a la base de datos
require_once("../controladores/usuariosController.php");
require_once("../modelos/usuariosModel.php");


$usuarios = new UsuariosController();

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


switch ($_GET["operation"]) 
{

	#------------------------------------------------GUARDAR
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
				$usuario->registrarUsuarioController();
				$messages[] = "El usuario se registro correctamente";
			}
			else if ($userRegistered == false) {
				//si el nombre existe
				$messages[] = "En usuario ya existe"; 
			}
		}

		//Si success
		if (isset($messages))
		{
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
		if (isset($messages))
		{
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


		#------------------------------------------------EDITAR
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
		if (isset($messages)) 
		{
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
		if (isset($errors)) 
		{
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

	#------------------------------------------------MOSTRAR
	case 'mostrar':
		$errors = null;
		
		$userToShow = $usuario->getUsuarioController($id_usuario);
		
		//En caso de no haber usuario
		if ($userToShow = false) 
		{
			$errors[] = "No hay tal usuario, no existe.";
		}
		//Si hay un array con usuarios y si es mayor a cero
		else if (is_Array($userToShow) == true && count($userToShow) > 0)
		{
			$output = [];
			//por cada usuario encontrado
			foreach ($userToShow as $row) {
				$output["nombre"] = $userToShow["nombre"];
				$output["apellido"] = $userToShow["apellido"];
				$output["cedula"] = $userToShow["cedula"];
				$output["telefono"] = $userToShow["telefono"];
				$output["correo"] = $userToShow["correo"];
				$output["direccion"] = $userToShow["direccion"];
				$output["cargo"] = $userToShow["cargo"];
				$output["usuario"] = $userToShow["usuario"];
				$output["password1"] = $userToShow["password1"];
				$output["password2"] = $userToShow["password2"];
				$output["estado"] = $userToShow["estado"];
			}
			//mostrando los datos al front en un json
			echo json_encode($output);
		}
		//if errors
		if (isset($errors)) 
		{
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
	#------------------------------------------------ACTIVAR
	case 'activarydesactivar':

		$messages = null;

		$response = $usuario->getUsuarioController($id_usuario);
		
		if (is_array($response))
		{
			$activatedUser = $usuario->editarEstadoController($response[0]["id_usuario"], $estado);
			if ($activatedUser)
			{
				$messages[] = "El usuario ha cambiado de estado.";
			}
			
		}
		//SI no es un array y es un false(fallo en ejecucion sql)
		else
		{
			$messages[] = "Hubo un error: No existe usuario.";
		}

		//Si success
		if (isset($messages)) 
		{
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

		break;

	case 'listar':
		
		$usersList = $usuarios->showUsuarios();
		//declaramos dondeguardamos la data
		$data = [];

		//para cada usuario
		foreach ($usersList as $row)
		{
			//donde se va a guardar cada campo de un usuario
			$sub_data = [];

			$sub_data[] = $row["nombre"];
			$sub_data[] = $row["apellidos"];
			$sub_data[] = $row["cedula"];
			$sub_data[] = $row["usuario"];
			//cargo
			$cargo = "";
			if ($row["cargo"] == 1)
			{
				$cargo = "administrador";
			}
			else if ($row["cargo"] == 0)
			{
				$cargo = "empleado";
			}

			$sub_data[] = $cargo;

			$sub_data[] = $row["telefono"];
			$sub_data[] = $row["correo"];
			$sub_data[] = $row["direccion"];
			//estado
			$sub_data[] = date("d-m-Y", strotime($row["fecha_ingreso"]));

			//estado
			$stateUser = "";
			$atributeForClass = "btn btn-success btn-md estado";
			if ($row["estado"] == 0)
			{
				$stateUser = "Inactivo";
				$atributeForClass = "btn btn-warning btn-md estado"; 
			}
			else
			{
				if ($row["estado"] == 1) {
					$stateUser = "Activo";
				}
			}
			//concatenacion guardada en sub_data en forma de boton para cambiar estado
			$sub_data[] = '<button type="button" onClick="cambiarEstado('.$row["id_usuario"].','.$row["estado"].');" name="estado" id="'.$row["id_usuario"].'" class="'.$atributeForClass.'">'.$stateUser.'</button>';

			//boton EDITAR
			$sub_data[] = '<button type="button" onClick="mostrar('.$row["id_usuario"].');" id="'.$row["id_usuario"].'" class="btn btn-warning btn-md update"><i class="glyphicon glyphicon-edit"></i> Editar</button>';

			//boton ELIMINAR
			$sub_data[] = '<button type="button" onClick="eliminar('.$row["id_usuario"].');" id="'.$row["id_usuario"].'" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-edit"></i> Eliminar</button>';

			//guardamos el array de usuario dentro del array para usuarios
			$data[] = $sub_data;
		}

		$results = array(
			"sEcho" => 1, //informacion para el datatable
			"iTotalRecors" => count($data), //enviamos el total de registros
			"iTotalDisplayRecords" => count($data), //enviamos el total registros
			"aaData" => $data
		);

		//devolver un json de lo anterior
		echo json_encode($results);

		break;
	
	default:
		echo " ";
		break;
}

 ?>