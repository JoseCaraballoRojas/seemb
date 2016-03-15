<?php
include("../../modelos/Unidad.php");

$id_unidad=$_POST['id_recibido'];
$unidad="";
$id="";
$detalle="";
if((empty($id_unidad) || strlen($id_unidad)<1) ){
	$msgError="el id  de la unidad es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/unidades/vista_listar.php');
		</script>";	
}
else{

		$editar_unidad= new Unidad();
		$retorno=$editar_unidad->Buscar($id_unidad);
		foreach($retorno as $datos){

			$unidad=$datos['unidad'];
			$id=$datos['id_unidad'];
			$detalle=$datos['detalle'];
		} 
	} 


echo"
	<form class='form-horizontal' method='POST' action='../../controladores/unidades/controlador_actualizar.php'>
	<br>			 		
    <h2 class='form-signin-heading text-center'>Editar Unidad</h2>
    
    <label for='unidad'> Unidad:</label>
    <br>
    <input type='text' id='inputunidad' class='form-control input-xlarge'  required name='unidad' value='$unidad' >
    <br>
     <label for='unidad'> Detalle:</label>
    <br>
    <input type='text' id='inputdetalle' class='form-control input-xlarge'  required name='detalle' value='$detalle' >
    <br>
	<br>
	<div class='text-center'>
		<a class='btn  btn-info' href='listar.php' ><span class='fa fa-reply'> Atras</span></a>
		<button class='btn  btn-danger' type='reset' name='cancelar'  ><span class='glyphicon glyphicon-remove'> Borrar</span></button>
		<button class='btn  btn-success' type='submit' name='actualizar' ><span class='glyphicon glyphicon-floppy-disk'> Actualizar</span></button>
	</div>
	<br><br><br>
	<div>
		<input type='hidden' class='form-control' name='id_unidad' value='$id'>
	</div>
</form>"

?>