<?php

session_start();

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

if (empty($correo) && empty($contrasena)) {
    $mensaje =  "<script>iziToast.info({
                    title: '',
                    message: 'Campos Vacíos'
                });</script>";
} elseif (empty($correo)) {
    $mensaje =  "<script>iziToast.info({
                    title: '',
                    message: 'Ingrese Correo'
                });</script>";
} elseif (empty($contrasena)) {
    $mensaje =  "<script>iziToast.info({
                    title: '',
                    message: 'Ingrese Contraseña'
                });</script>";
} else {

    if ($correo == "admin@hexxa.cl" && $contrasena == "2021") {
        $_SESSION['active'] = true;
        $mensaje =  "<script>
                        iziToast.success({
                            title: '¡Correcto!',
                            message: 'Iniciando Sesión'
                        });
                        
                        setTimeout(function() {
                            window.location='inicio'
                        }, 1000);
                    </script>";
    } else {
        $mensaje .= "<script>iziToast.error({
            title: 'Error',
            message: 'Correo o contraseña incorrectas'
        });</script>";
    }
}

echo $mensaje;
