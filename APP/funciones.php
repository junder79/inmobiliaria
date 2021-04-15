<?php
require_once('conexion.php');


class Funciones
{
	function getCombustible()
	{
		$ObjetoConexion = new Conectar();
		$conexion = $ObjetoConexion->conectarBD();
		$sql = "SELECT c.id_combustible , c.fecha_carga , o.nombre_obra, concat(v.tipo_vehiculo,' -  ',v.patente) as 'vehiculo', concat(vc.nombre ,' ', vc.apellido_paterno, ' ', IFNULL(vc.apellido_materno,' ')) as 'nombreConductor',c.kilometraje, c.cantidad_litros  FROM `combustible` c 
		JOIN vehiculos v 
		on v.id_vehiculo = c.id_vehiculo
		JOIN vehiculos_conductores vc
		on vc.id_conductor = c.id_conductor
		JOIN obras o 
		on o.id_obra = c.id_obra
		ORDER BY c.id_combustible  DESC";

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
