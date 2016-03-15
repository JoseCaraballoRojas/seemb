<?php
//se incluye la clase categoria
include("../../modelos/Categoria.php");

$id_categoria=$_GET['id_categoria'];

if((empty($id_categoria)) || (strlen($id_categoria)<1) ){
	$msgError="el id  de la categoria es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_categorias.php');
		</script>";	
}
else{

		$borrar_categoria= new Categoria();

		$mensaje=$borrar_categoria->Borrar($id_categoria);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_categorias.php');
		</script>";		 
	} 



?>