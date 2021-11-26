<?php
    class Conectar
    {
        function  conectarBD() {
            //Conexion a la base de datos 
            $host="localhost";
            $user="grupohexxa_inmobiliaria";
            $password="aE,q=mEz~oIa";
            $database="grupohex_inmobiliariaapp";
    
            $conexion =mysqli_connect($host , $user , $password , $database) or die ("Error al conectar");
             mysqli_set_charset($conexion, 'utf8');
            return $conexion;
        }
    }
