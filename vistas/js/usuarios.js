var table;

//funcion que siempre se va a ejecutar desde el inicio
function init()
{

}

//funcion para limpiar los campos del formulario
function limpiarCampos()
{
	var elements = ["nombre", 
				"apellido", 
				"cedula", 
				"usuario", 
				"cargo",
				"password1", 
				"password2",
				"telefono", 
				"correo", 
				"direccion", 
				"estado",
				"id_usuario"];

	for (var i = 0; i < elements.length - 1; i++) {
		$("#"+elements[i]).val("");
	}
}

function listar()
{
	//libreria para hacer tablas rapidas y funcionales
	table = $("#usuario_data").dataTable({
		"aProcessing": true, //Activamos el procesamiento del datatables
		"aServerSide": true, //Paginacion y filtrado realizados por el servidor
		dom: 'Bfrtip', //Definimos los elementos del control de tabla
		buttons: [  //botones para las funciones extra
			"copyHtml5",
			"excelHtml5",
			"csvHtml5",
			"pdf"
		],
		"ajax": {
			url: "../ajax/usuarioAjax.php?operation=listar",
			type: "get",
			dataType: "json",
			error: function(e){
				//en caso de fallar el ajax mostramos en texto plano porque recibimos 
				//json inicialmente
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"responsive": true,
		"bInfo": true, //info de los datatable
		"iDisplayLength": 10, //Por cada 10 registros hace una paginacion
		"order": [[0,"desc"]], //ordena (columna, orden)

		"language": {
			"sProcessing": "Procesando...",
			"sLengthMenu": "Mostrar _MENU_ registros",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "Mostrando un total de _TOTAL_ registros",
			"sInfoEmpty": "Moatrando un total de 0 registros",
			"sInfoFiltered": "(filtrado un total de _MAX_ registros)",
			"sInfoPostFix": "",
			"sSearch": "Buscar: ",
			"sUrl": "",
			"sInfoThousands": ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending": "Activar para ordenar ascendentemente",
				"sSortDescending": "Activar para ordenar descendentemente"
			}
		} //cierre de lenguaje
	}).DataTable();
}

init();