<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <title></title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/iziToast.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <link rel="stylesheet" href="public/css/nprogress.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/multi.min.css">
    <link rel="stylesheet" href="public/css/style-accordion.css">
  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="public/js/nprogress.js"></script>
    <script src="public/js/main.js"></script>
    <script src="public/js/multi.min.js"></script>
    <script src="public/js/util-accordion.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://kit.fontawesome.com/e07e2fa348.js"></script>


    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
</head>

<body>

    <!--Contenido-->

    <?php
    if (isset($_SESSION['active']) && $_SESSION['active'] == TRUE) {
        if (isset($_GET["ruta"])) {
            if ($_GET["ruta"] == "inicio") { // AÑADIR RUTAS A CUALES PODER INGRESAR
                include  "componentes/sidenav.php";
                include "componentes/" . $_GET['ruta'] . ".php";
            } else {
                include "componentes/404.php";
            }
        }
    } else {
        echo    '<script>
                    window.location="login.php"
                </script>';
    }
    ?>

    <script type="text/javascript">
        $(document).ready(function() {
            var title = location.pathname.replace('/miubicacion/', '').replace(/\b\w/g, l => l.toUpperCase());

            document.title = title + ' - MIUBICACIÓN';
        });
    </script>
</body>

</html>