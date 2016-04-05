<?php
include_once("../../modelos/Tipo.php");

$id_tipo=$_POST['id_recibido'];
$tipo="";
$id="";

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
			$id=$datos['id_tipo'];


		} 
	} 


echo"
<form class='form-horizontal' method='POST' action='../controladores/tipos/controlador_actualizar.php'>
	<div class='panel panel-danger'>
		<div class='panel-heading'>
			<h2 class='panel-title'><b>Editar Tipo de Plato</b></h2>
		</div>

		<div class='panel-body'>
			
				<br>			 		
			    <label for='grupo'> Tipo:</label>
			    <br>
			    <input type='text' id='inputtipo' class='form-control input-xlarge' placeholder='Ingresa un Tipo de Plato' required autofocus autocomplete='off' name='tipo' Value='$tipo'>
			    <br><br>
		</div>
		<div class='panel-footer'>
				<div class='text-center'>
					<a class='btn  btn-info' href='vista_listar_tipos.php' >
						<span class='fa fa-reply'> Atras</span></a>
					<button class='btn  btn-danger' type='reset' name='cancelar'  >
						<span class='glyphicon glyphicon-remove'> Borrar</span>
					</button>
					<button class='btn  btn-success' type='submit' name='actualizar' >
						<span class='glyphicon glyphicon-floppy-disk'> Actualizar</span>
					</button>
				</div>
			
			<div>
				<input type='hidden' class='form-control' name='id_tipo' value='$id'>
			</div>
			
		</div>
	</div>
</form>"

?>