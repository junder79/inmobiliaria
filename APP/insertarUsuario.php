<?php

$nombre = $_POST['nombre'];
$password = $_POST['password'];
$correo = $_POST['correo'];
$idTipoUsuario = $_POST['idTipoUsuario'];

if (empty($correo) && empty($nombre) && empty($idTipoUsuario)) {
	$mensaje = '<script>document.getElementById("mensaje").innerHTML="Complete los campos"</script>';
} elseif ($correo == "") {
	$mensaje = '<script>document.getElementById("mensaje_correo").innerHTML="Ingrese Correo"</script>';
} elseif ($nombre == "") {
	$mensaje = '<script>document.getElementById("mensaje_nombre").innerHTML="Ingrese Nombre"</script>';
} elseif ($idTipoUsuario == "") {
	$mensaje = '<script>document.getElementById("mensaje_idTipoUsuario").innerHTML="Ingrese Tipo Usuario"</script>';
} else {
	require_once('funciones.php');
	$ObjetoFunciones = new Funciones();

	$password_post = md5($password);

	$datos = array(
		$nombre,
		$password_post,
		$correo,
		$idTipoUsuario
	);

	// Validar Correo Existente 
	$cantidad_filas = $ObjetoFunciones->validarexistenciaCorreo($correo);

	if ($cantidad_filas > 0) {
		$mensaje = "<span style='color:red';>Correo ya existente , ingrese otro</span>";
	} else {
		if ($ObjetoFunciones->agregarUsuario($datos) == 1) {
			$mensaje = "<script>
				Swal.fire({
					title: '¡Usuario Creado!',
					text: 'Click en botón para continuar',
					type: 'success',
					showConfirmButton: true,
				}).then(function (result) {
					if (true) {
						window.location = 'usuarios';
					}
				})
			</script>";
		} else {
			$mensaje = "Error";
		}
	}
}

echo $mensaje;
