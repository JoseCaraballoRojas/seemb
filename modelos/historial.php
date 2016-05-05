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
		
		$con->consultar("INSERT INTO historial(id_usuario,fecha,hora,accion) VALUES('$usuario','$fecha','$hora','$accion') ")or die("error al iniciar el histrorial");

		$con->desconectar();
		}
		
// funcion para listar el historial registrado en el sistema..
	public function listar()
	{
		$lista= new MySQL1();
		$msgError=$lista->MySQL();
		$mensaje="nose ejecuto la funcion";
		$resultado=$lista->consultar("SELECT h.id_historial, h.id_usuario, h.fecha, h.hora, h.accion, u.id_usuario,u.usuario FROM historial as h JOIN usuarios as u on h.id_usuario=u.id_usuario");
		
echo "<section id='submenu'><b>Historial del sistema</b></section>
		<section id='divlista'>";
		if($lista->num_filas($resultado)>0)
			{
		echo "
		<table>
		<tbody>
		<tr><th>ID</th><th>USUARIO</th><th>FECHA</th><th>HORA</th><th>ACCION</th></tr>";
		while($datos=$lista->busca_array($resultado))
		{
			
			echo "<tr> <td >".$datos['id_historial']."</td>";
			echo " <td>".$datos['usuario']."</td>";
			echo " <td>".$datos['fecha']."</td>";
			echo " <td>".$datos['hora']."</td>";
			echo " <td>".$datos['accion']."</td>
			</tr> ";	
		}
	echo "</tbody>
		  </table>	
		  </section>";
	}
	else{
		
		echo"<script type='ext/javascript'>
		alert('No hay historial  registrado');
		</script>";
		
	}
	$lista->desconectar();
	
	}
}

	?>