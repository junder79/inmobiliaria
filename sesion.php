<?php
session_start();
echo "Haz iniciado sesión";

echo var_dump($_SESSION['active']);