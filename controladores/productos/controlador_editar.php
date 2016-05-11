<?php
include("../../modelos/Producto.php");

$id_producto=$_POST['id_recibido'];
$producto="";
$id="";
$presentacion="";

$categoria="";
if((empty($id_producto) || strlen($id_producto)<1) ){
	$msgError="el id  del productoes incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_productos.php');
		</script>";	
}
else{

		$editar_producto= new Producto();
		$retorno=$editar_producto->Buscar($id_producto);
		foreach($retorno as $datos){

			$producto=$datos['producto'];
			$id=$datos['id_producto'];
			$presentacion=$datos['presentacion'];
			$categoria=$datos['id_categoria'];
		} 
	} 


echo"
	<form class='form-horizontal' method='POST' action='../controladores/productos/controlador_actualizar.php'>
	<br>			 		
    <h2 class='form-signin-heading text-center'>Editar Productos</h2>
    
    <label for='producto'> producto:</label>
    <br>
    <input type='text' id='inputproducto' class='form-control input-xlarge'  required name='producto' value='$producto' >
    <br>
     <label for='producto'> presentacion:</label>
    <br>
    <input type='text' id='inputpresentacion' class='form-control input-xlarge'  required name='presentacion' value='$presentacion' >
   
    <label > categoria:</label>
    <br>
    <select name='categoria' id='selectcategoria' class='form-control' required>
    	
    </select>
    <br>
	<br>
	<br>
	<div class='text-center'>
		<a class='btn  btn-info' href='vista_listar_productos.php' ><span class='fa fa-reply'> Atras</span></a>
		<button class='btn  btn-danger' type='reset' name='cancelar'  ><span class='glyphicon glyphicon-remove'> Borrar</span></button>
		<button class='btn  btn-success' type='submit' name='actualizar' ><span class='glyphicon glyphicon-floppy-disk'> Actualizar</span></button>
	</div>
	<br><br><br>
	<div>
		<input type='hidden' class='form-control' name='id_producto' value='$id'>
	</div>
</form>"

?>