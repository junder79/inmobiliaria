<?php
    session_start();

    if (isset($_SESSION['active']) && $_SESSION['active'] == true ) {
        echo    "<script>
                    window.location='inicio'
                </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="public/img/favicon.png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta name="theme-color" content="#455a64"/>
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="public/css/style-login.css">
    <link rel="stylesheet" href="public/css/iziToast.css">
    
    <link rel="manifest" href="manifest.json">
    <title>Iniciar Sesión</title>
</head>
<body >
<div id="mensaje"></div>
<div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
        <div class="modal-content">
            <div class="col-12 form-input">
                <form class="" id="inicio-sesion">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-white">Correo</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo" placeholder="Ingrese Correo" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-white">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="contrasena" required>
                    </div>
                    <button class="btn btn-primary mb-4"  id="btn-iniciar-sesion" type="button" >
                        Iniciar Sesión
                        <center><span style="display: none" id="spinner-btn-iniciar-sesion" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></center>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="public/js/iziToast.js" type="text/javascript"></script>
<script src="public/js/ajaxIniciarSesion.js" type="text/javascript"></script>

<script>
    if('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/miubicacion/sw.js')
            .then(function() {
                console.log('Service Workedr Registered');
        });
    }
</script>
</body>
</html>