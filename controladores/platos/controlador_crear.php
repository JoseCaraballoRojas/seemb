<?php
//se incluyen las clases necesarias.
include_once("../../modelos/Plato.php");
include_once("../../modelos/Ingrediente.php");
include_once("../../modelos/Valor.php");

//se reciben los datos del formulario y se almacenan en variables
$plato=$_POST['plato'];
$descripcion=$_POST['descripcion'];
$porcion=$_POST['porcion'];
$unidad=$_POST['unidad'];
$tipo=$_POST['tipo'];
$calorias=$_POST['calorias'];
$carbohidratos=$_POST['carbohidratos'];
$grasas=$_POST['grasas'];
$proteinas=$_POST['proteinas'];
$azucares=$_POST['azucares'];
$sal=$_POST['sal'];

//datos para guardar los ingredientes
$producto=$_POST['producto'];
$cantidad=$_POST['cantidad'];
$unidad_i=$_POST['unidad2'];
$grupo=$_POST['grupo'];
$id_plato=time();

// se comprueba mediante condiciones que no variables vacias o falten datos;
if((empty($plato)) || (empty($descripcion))  || (empty($porcion)) || (empty($unidad)) || (empty($tipo)) || (empty($producto)) || (empty($cantidad)) || (empty($unidad_i)) || (empty($grupo)) || (empty($id_plato)) || (empty($calorias)) || (empty($carbohidratos)) || (empty($grasas)) || (empty($proteinas)) || (empty($azucares)) || (empty($sal)) ){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
//si todo los datos pasan la validacion se procede a guardarlos
else{
		// se crea un objeto de la clase plato.
		$crear_plato= new Plato();
		//se procede a crear el plato mediante una condicion si el plato se crea se procede a crear sus ingredientes
		if( ($crear_plato->Crear($id_plato,$plato,$descripcion,$porcion,$unidad,$tipo,$calorias,$carbohidratos,$grasas,$proteinas,$azucares,$sal,$unidad,$tipo))==TRUE ){
			$mensaje="El Plato";
			//se crear un objeto de la clase ingrediente
			$crear_ingrediente= new Ingrediente();

			//se crean los ingredientes del plato y se comprueba que todo este correcto para proceder a crear los valores del plato
			if ( ($crear_ingrediente->Crear($producto,$cantidad,$unidad_i,$grupo,$id_plato))==TRUE )  {
				$mensaje.=" y sus Ingredientes se creo exitosamente";
				
			}
			else{
				//si ocurrio un error se registra en la variable mensaje
				$mensaje.="error  al guardar ingredientes";
			}
		}
		else{
			//si ocurrio un error se registra en la variable mensaje
			$mensaje="error al crear plato";
		}
		// si todo el proceso se dio exitosamente se emite un mensaje y nos manda a los platos registrados
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_platos.php');
		</script>";		 
	}


?>