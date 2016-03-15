<?php
include_once("../../modelos/Tipo.php");

$id_tipo=$_POST['id_recibido'];
$tipo="";
$id="";
$turno="";
if((empty($id_tipo) || strlen($id_tipo)<1) ){
	$msgError="el id  del tipo es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_tipos.php');
		</script>";	
}
else{

		$editar_tipo= new Tipo();
		$retorno=$editar_tipo->Buscar($id_tipo);

		foreach($retorno as $datos){

			$tipo=$datos['tipo'];
			$turno=$datos['turno'];
			$id=$datos['id_tipo'];


		} 
	} 


echo"
	<form class='form-horizontal' method='POST' action='../controladores/tipos/controlador_actualizar.php'>
	<br>			 		
    <h2 class='form-signin-heading text-center'>Editar Tipo de Plato</h2>
						        
						        <label for='grupo'> Tipo:</label>
						        <br>
						        <input type='text' id='inputtipo' class='form-control input-xlarge' placeholder='Ingresa un Tipo de Plato' required autofocus autocomplete='off' name='tipo' Value='$tipo'>
						        <br>
						        <label for='grupo'> Turno</label>
						        <br>
						        <select name='turno' id='selectturno' class='form-control' required>
						        	<option value='selecione'>Seleccione</option>
						        	<option value='Almuerzo'>Almuerzo</option>
						        	<option value='Desayuno'>Desayuno</option>
						        	<option value='Cena'>Cena</option>
						        </select>
								<br>
								<br>
	<div class='text-center'>
		<a class='btn  btn-info' href='vista_listar_tipos.php' ><span class='fa fa-reply'> Atras</span></a>
		<button class='btn  btn-danger' type='reset' name='cancelar'  ><span class='glyphicon glyphicon-remove'> Borrar</span></button>
		<button class='btn  btn-success' type='submit' name='actualizar' ><span class='glyphicon glyphicon-floppy-disk'> Actualizar</span></button>
	</div>
	<br><br><br>
	<div>
		<input type='hidden' class='form-control' name='id_tipo' value='$id'>
	</div>
</form>"

?>