<?php
//se incluye la clase 
include("../../modelos/Plato.php");

$id_plato=$_GET['id_plato'];

if((empty($id_plato)) || (strlen($id_plato)<1) ){
	$msgError="el id  del plato es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_platos.php');
		</script>";	
}
else{

		$borrar_plato= new Plato();

		$mensaje=$borrar_plato->Borrar($id_plato);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_platos.php');
		</script>";		 
	} 



?>