<?php

require_once('funciones.php');
$ObjetosFunciones = new Funciones();

$idInmueble = $_POST['idInmueble'];
$opcion = $_POST['opcion'];

switch ($opcion) {
    case 'modificar':
        $inmueble = $_POST['inmueble'];
        $tipoInmueble = $_POST['tipoInmueble'];
        $fechaCreacion = $_POST['fechaCreacion'];

        if ($ObjetosFunciones->modificarInmueble($idInmueble, $inmueble, $tipoInmueble, $fechaCreacion)) {
            $title = 'Inmueble modificado';
            $type = 'success';
        } else {
            $title = 'No se pudo modificar inmueble';
            $type = 'error';
        }

        break;

    case 'eliminar':

        if ($ObjetosFunciones->eliminarInmueble($idInmueble)) {
            $title = 'Inmueble eliminado';
            $type = 'success';
        } else {
            $title = 'No se pudo eliminar inmueble';
            $type = 'error';
        }

        break;
}

$mensaje = "<script>
				Swal.fire({
					title: '" . $title . "',
					text: 'Click en botón para continuar',
					type: '" . $type . "',
					showConfirmButton: true,
				}).then(function (result) {
					if (true) {
						window.location = 'usuarios';
					}
				})
			</script>";

echo $mensaje;
