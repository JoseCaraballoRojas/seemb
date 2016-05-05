<?php 
include_once("conexion.php");

	/**
	*clase que creara un registro de las actividades que hagan los usuarios en el sistema 
	*/
	class Historial{
		public function registra($usuario,$accion)
		{
		$con= new  MySQL1();
		$con->MySQL();
		date_default_timezone_set('America/Caracas');
		$hora = date("h:i:s");
		$fecha = date("Y-m-d");
		
		$con->consultar("INSERT INTO historial(fecha,hora,accion,id_usuario) VALUES('$fecha','$hora','$accion','$usuario') ")or die("error al iniciar el histrorial");

		$con->desconectar();
		}
		
// funcion para listar el historial registrado en el sistema..
	public function Listar()
	{
		$lista= new MySQL1();
		$msgError=$lista->MySQL();
		$mensaje="nose ejecuto la funcion";
		$resultado=$lista->consultar("SELECT  h.fecha, h.hora, h.accion, u.usuario FROM historial as h JOIN usuarios as u on h.id_usuario=u.id_usuario");
		
		if($lista->num_filas($resultado)>0)
		{
			return $resultado;
		}
		else
		{
			return false;		
		}
	$lista->desconectar();
	
	}
}

	?>