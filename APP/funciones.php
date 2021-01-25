<?php
require_once('conexion.php');


class Funciones
{

	function getInmueblesRevisados()
	{
		$ObjetoConexion = new Conectar();
		$conexion = $ObjetoConexion->conectarBD();
		$sql = "SELECT idInmueble , id , nombre, tipo, fecha, hora , idObra from inmuebles";

		return mysqli_query($conexion, $sql);
	}
}
