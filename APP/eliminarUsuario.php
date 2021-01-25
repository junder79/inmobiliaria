<?php
$id_usuario=$_GET['id_usuario'];

require_once('funciones.php');
$ObjetosFunciones = new Funciones();

if ($ObjetosFunciones->eliminarUsuario($id_usuario)==1) {

  $mensaje =   "<script>
                Swal.fire({
                  title: '¡Usuario Eliminado!',
                  text: 'Click en botón para continuar',
                  type: 'success',
                  showConfirmButton: true,
                }).then(function (result) {
                  if (true) {
                    window.location = 'usuarios';
                  }
                })
              </script>";

}else {

  $mensaje =   "<script>
                Swal.fire({
                  title: '¡Error al Eliminar Usuario!',
                  text: 'Click en botón para continuar',
                  type: 'error',
                  showConfirmButton: true,
                }).then(function (result) {
                  if (true) {
                    window.location = 'usuarios';
                  }
                })
              </script>";
}

echo $mensaje;
?>