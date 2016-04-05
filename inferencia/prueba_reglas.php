<?php 
include_once("../modelos/Plato.php");
include_once("../modelos/Ingrediente.php");
include_once("../modelos/Inventario.php");
$dia=date("N");
$turno=date("A");
$ALMUERZO='AM';
	if ($dia<6 ) {
		if ($dia<2) {
				$limite=$dia;
				echo "es lunes no se busca menu anterior: ", $limite,"\n";
			}	
			else{
				$limite=$dia - 1;
				echo "No es lunes se busca menu anterior de:", $limite, " dias";
				echo " \n\n hoy es: ",date("l",$dia),"\n";
			}
	}
	if ($turno==$ALMUERZO) {
		$cantidad_platos=2500;
	}
	else{
		$cantidad_platos=1500;
	}


$platos_registrados= new Plato();
$platos=$platos_registrados->Platos_registrados();
$ingredientes= new Ingrediente();
$cantidad_disponible= new Inventario();
$platos_disponibles=[];

foreach($platos as $datos){

	$ingredientes_del_plato= $ingredientes->Busca_ingredientes($datos['id_plato'],$cantidad_platos);
	
	$control=TRUE;

	foreach ($ingredientes_del_plato as $valor) {

		$disponible=$cantidad_disponible->Busca_cantidad($valor['id_producto'],$valor['cantidad_requerida']);
		
		if ($disponible == FALSE) {

			$control=FALSE;
		}
		
	}
	if ($control==TRUE) {
		$platos_disponibles[]= $datos['id_plato'];
	}
}

 foreach ($platos_disponibles as $v) {
 	echo "<br>id_plato: ", $v;
 }
$aleatorio=$platos_disponibles[array_rand($platos_disponibles)];
echo "<BR>Valor aleatorio: ". $aleatorio;

 ?>
