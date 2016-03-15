<?php
include("../../modelos/grupos.php");

$id_grupo=$_POST['id_recibido'];
$grupo="";
$id="";
$prioridad="";
if((empty($id_grupo) || strlen($id_grupo)<1) ){
	$msgError="el id  del grupo es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/grupos/listar.php');
		</script>";	
}
else{

		$editar_grupo= new Grupos();
		$opc='buscar';
		$retorno=$editar_grupo->editar($id_grupo,$opc);
		foreach($retorno as $datos){

			$grupo=$datos['grupo'];
			$id=$datos['id_grupo'];
			$prioridad=$datos['prioridad'];
		} 
	} 


echo"
	<form class='form-horizontal' method='POST' action='../../controladores/grupos/controlador_actualizar.php'>
	<br>			 		
    <h2 class='form-signin-heading text-center'>Editar Grupo</h2>
    
    <label for='grupo'> Grupo:</label>
    <br>
    <input type='text' id='inputgrupo' class='form-control input-xlarge'  required name='grupo' value='$grupo' >
    <br>
    <label for='grupo'> Prioridad:</label><br>
	<label class='radio-inline'>";
		 		
	switch ($prioridad) {
	case '1':
			echo "
				<input type='radio' name='prioridad' id='inlineRadio1' value='1' required checked='checked'> 1
				</label>
				<label class='radio-inline'>
				<input type='radio' name='prioridad' id='inlineRadio2' value='2' > 2
				</label>
				<label class='radio-inline'>
				<input type='radio' name='prioridad' id='inlineRadio3' value='3' > 3
				</label>";
		break;
	case '2':
			echo "
				<input type='radio' name='prioridad' id='inlineRadio1' value='1' required > 1
				</label>
				<label class='radio-inline'>
				<input type='radio' name='prioridad' id='inlineRadio2' value='2' checked='checked' > 2
				</label>
				<label class='radio-inline'>
				<input type='radio' name='prioridad' id='inlineRadio3' value='3' > 3
				</label>";
		break;
	case '3':
			echo "
				<input type='radio' name='prioridad' id='inlineRadio1' value='1' required > 1
				</label>
				<label class='radio-inline'>
				<input type='radio' name='prioridad' id='inlineRadio2' value='2'  > 2
				</label>
				<label class='radio-inline'>
				<input type='radio' name='prioridad' id='inlineRadio3' value='3' checked='checked'> 3
				</label>";
		break;
	}


	echo "
	<br>
	<br>
	<div class='text-center'>
		<a class='btn  btn-info' href='listar.php' ><span class='fa fa-reply'> Atras</span></a>
		<button class='btn  btn-danger' type='reset' name='cancelar'  ><span class='glyphicon glyphicon-remove'> Borrar</span></button>
		<button class='btn  btn-success' type='submit' name='actualizar' ><span class='glyphicon glyphicon-floppy-disk'> Actualizar</span></button>
	</div>
	<br><br><br>
	<div>
		<input type='hidden' class='form-control' name='id_grupo' value='$id'>
	</div>
</form>"

?>