<?php
include("../../modelos/Nutriente.php");

$id_nutriente=$_POST['id_recibido'];
$nutriente="";
$id="";
$unidad="";
if((empty($id_nutriente) || strlen($id_nutriente)<1) ){
	$msgError="el id  del nutriente es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/nutrientes/vista_listar.php');
		</script>";	
}
else{

		$editar_nutriente= new Nutriente();
		$retorno=$editar_nutriente->Buscar($id_nutriente);
		foreach($retorno as $datos){

			$nutriente=$datos['nutriente'];
			$id=$datos['id_nutriente'];
			
		} 
	} 


echo"
	<form class='form-horizontal' method='POST' action='../../controladores/nutrientes/controlador_actualizar.php'>
	<br>			 		
    <h2 class='form-signin-heading text-center'>Editar Nutriente</h2>
    
    <label for='unidad'> Nutriente:</label>
    <br>
    <input type='text' id='inputunutriente' class='form-control input-xlarge'  required name='nutriente' value='$nutriente' >
    <br>
     <label for='unidad'> Unidad:</label>
    <br>
     <select name='unidad' id='selectunidad' class='form-control' required>
						        	
	</select>
    <br>
	<br>
	<div class='text-center'>
		<a class='btn  btn-info' href='vista_listar.php' ><span class='fa fa-reply'> Atras</span></a>
		<button class='btn  btn-danger' type='reset' name='cancelar'  ><span class='glyphicon glyphicon-remove'> Borrar</span></button>
		<button class='btn  btn-success' type='submit' name='actualizar' ><span class='glyphicon glyphicon-floppy-disk'> Actualizar</span></button>
	</div>
	<br><br><br>
	<div>
		<input type='hidden' class='form-control' name='id_nutriente' value='$id'>
	</div>
</form>"

?>