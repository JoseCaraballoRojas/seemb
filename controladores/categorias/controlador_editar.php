<?php
include("../../modelos/Categoria.php");

$id_categoria=$_POST['id_recibido'];
$categoria="";
$id="";
$detalle="";
if((empty($id_categoria) || strlen($id_categoria)<1) ){
	$msgError="el id  de la categoria es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_categorias.php');
		</script>";	
}
else{

		$editar_categoria= new Categoria();
		$retorno=$editar_categoria->Buscar($id_categoria);
		foreach($retorno as $datos){

			$categoria=$datos['categoria'];
			$id=$datos['id_categoria'];
			$detalle=$datos['detalle'];
		} 
	} 


echo"
	<form class='form-horizontal' method='POST' action='../controladores/categorias/controlador_actualizar.php'>
	<br>			 		
    <h2 class='form-signin-heading text-center'>Editar Categoria</h2>
    
    <label for='categoria'> categoria:</label>
    <br>
    <input type='text' id='inputcategoria' class='form-control input-xlarge'  required name='categoria' value='$categoria' >
    <br>
     <label for='categoria'> Detalle:</label>
    <br>
    <input type='text' id='inputdetalle' class='form-control input-xlarge'  required name='detalle' value='$detalle' >
    <br>
	<br>
	<div class='text-center'>
		<a class='btn  btn-info' href='vista_listar_categorias.php' ><span class='fa fa-reply'> Atras</span></a>
		<button class='btn  btn-danger' type='reset' name='cancelar'  ><span class='glyphicon glyphicon-remove'> Borrar</span></button>
		<button class='btn  btn-success' type='submit' name='actualizar' ><span class='glyphicon glyphicon-floppy-disk'> Actualizar</span></button>
	</div>
	<br><br><br>
	<div>
		<input type='hidden' class='form-control' name='id_categoria' value='$id'>
	</div>
</form>"

?>