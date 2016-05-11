<?php
include("../../modelos/Inventario.php");

$id_inventario=$_POST['id_recibido'];
$inventario="";
$id="";
$cantidad="";
$nivel_optimo="";
$producto="";
if((empty($id_inventario) || strlen($id_inventario)<1) ){
	$msgError="el id  del inventario es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_inventarios.php');
		</script>";	
}
else{

		$editar_inventario= new Inventario();
		$retorno=$editar_inventario->Buscar($id_inventario);
		foreach($retorno as $datos){

			$cantidad=$datos['cantidad'];
			$id=$datos['id_inventario'];
			$nivel_optimo=$datos['nivel_optimo'];
			$producto=$datos['id_producto'];
		} 
	} 

echo "<form class='form-inline' method='POST' action='../controladores/inventarios/controlador_actualizar.php'>
		<div class='panel panel-danger'>
			<div class='panel-heading'>
				<h3 class='form-signin-heading text-center'><b>Editar Inventario</b></h3>
			</div>
			<div class='panel-body'>		
			
					<div class='col-md-5 input-group'>		 		
			   
			    <label > Cantidad:</label>
			    <br>
			    <input type='text' id='inputcantidad' class='form-control input-xlarge' placeholder='Cantidad del Producto ' required utocomplete='off' name='cantidad' value='$cantidad'>				
			    <br>	      						
			  	<div class='col-md-5 input-group'>	
			    <label > Nivel Optimo:</label>
			    <br>
			    <input type='text' id='inputniveloptimo' class='form-control input-xlarge' placeholder='Ingresa el Nivel Optimo' required  autocomplete='off' name='nivel_optimo' value='$nivel_optimo'>
			    </div>
			    
			</div>
			<div class='panel-footer'>
				<div class='text-center'>
					<a class='btn  btn-info ' href='vista_listar_inventarios.php' ><span class='fa fa-reply'>  Atras</span></a>
					<button class='btn  btn-danger ' type='reset' name='cancelar' value='borrar' ><span class='glyphicon glyphicon-remove'> Borrar</span></button>
					<button class='btn  btn-success ' type='submit' name='crear' value='crear' ><span class='glyphicon glyphicon-floppy-disk'> Actualizar</span></button>
				</div>
				<div>
					<input type='hidden' class='form-control' name='id_inventario' value='$id'>
				</div>
				
			</div>
	</div>
	</form>";

?>