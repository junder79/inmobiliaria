<?php
require_once('conexion.php');


class Funciones
{
	function getInmueblesRevisados()
	{
		$ObjetoConexion = new Conectar();
		$conexion = $ObjetoConexion->conectarBD();
		$sql = "SELECT idInmueble , id , nombre, tipo, fecha, hora , idObra, tienePdf from inmuebles";

		return mysqli_query($conexion, $sql);
	}

	function modificarInmueble($idInmueble, $inmueble, $tipoInmueble, $fechaCreacion)
	{
		$ObjetoConexion = new Conectar();
		$conexion = $ObjetoConexion->conectarBD();
		$sql = "UPDATE inmuebles SET nombre = '$inmueble', tipo = '$tipoInmueble', fecha = '$fechaCreacion' WHERE idInmueble = $idInmueble";

		return mysqli_query($conexion, $sql);
	}

	function eliminarInmueble($idInmueble)
	{
		$ObjetoConexion = new Conectar();
		$conexion = $ObjetoConexion->conectarBD();
		
		$sql = "DELETE FROM inmuebles WHERE idInmueble = $idInmueble";
		return mysqli_query($conexion, $sql);
	}
}
