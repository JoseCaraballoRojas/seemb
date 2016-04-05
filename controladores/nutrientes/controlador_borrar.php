<?php
include("../../modelos/Nutriente.php");

$id_nutriente=$_GET['id_nutriente'];

if((empty($id_nutriente)) || (strlen($id_nutriente)<1) ){
	$msgError="el id  del Nutriente es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/nutrientes/vista_listar.php');
		</script>";	
}
else{

		$borrar_nutriente= new Nutriente();

		$mensaje=$borrar_nutriente->Borrar($id_nutriente);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/nutrientes/vista_listar.php');
		</script>";		 
	} 



?>