<?php
    class Conectar
    {
        function  conectarBD() {
            //Conexion a la base de datos 
            $host="localhost";
            $user="grupohexxacom_inmobiliaria";
            $password="Hl*uRbDkh[@Z";
            $database="grupohexxacom_inmobiliaria";
    
            $conexion =mysqli_connect($host , $user , $password , $database) or die ("Error al conectar");
             mysqli_set_charset($conexion, 'utf8');
            return $conexion;
        }
    }
