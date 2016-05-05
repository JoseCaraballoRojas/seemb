<?php 
//SE INCLUYEN LOS ARCHIVOS CON LAS CLASES NECESARIAS.
include_once("../modelos/Plato.php");
include_once("../modelos/Ingrediente.php");
include_once("../modelos/Inventario.php");
include_once('../modelos/Menu.php');

// CONSTANTES Y VARIABLES GLOBALES NECESARIAS PARA GENERAR UNA RESPUESTA.
$ALMUERZO='AM';
$CALORIAS="2000";
$PROTEINAS="65";
$CARBOHIDRATOS="275";
$GRASAS="65";
$PRIMER_PLATO=0;
$SEGUNDO_PLATO=0;
$TERCER_PLATO=0;
$ENSALADA=0;
$BEBIDA=0;
$FRUTA=0;
//###################VARIBALES#############################################################
$platos_disponibles=[];
$menu_generado=[];
$dia=date("N");
$turno=date("A");

//###########################SELECCIONAR PLATOS DISPONIBLES####################################


//#############################################################################################

	if ($dia<6 ) {
		if ($dia<2) {
				$limite=$dia;
				//echo "es lunes no se busca menu anterior: ", $limite,"<br>";
			}	
			else{
				$limite=$dia - 1;
				//echo "No es lunes se busca menu anterior de:", $limite, " dias";
				//echo " \n\n hoy es: ",date("l",$dia),"<br>";
				$buscar_menu_anterior= new Menu();
      			$menu_anterior=$buscar_menu_anterior->Menu_anterior($limite);
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
 	echo "<br>id_plato: ", $v, "<br>";
 }
$aleatorio=$platos_disponibles[array_rand($platos_disponibles)];
echo "<BR>Valor aleatorio: ". $aleatorio;

// se escoje un menu en caso de que sea el primer dia de la semana
if (!isset($menu_anterior)) {
	
	//agregar primer plato al menu
	$menu_generado[]= Elegir_primer_plato();
	//agregar segundo plato al menu
	$menu_generado[]= Elegir_segundo_plato();
	// agregar tercer plato al menu
 	$menu_generado[]= Elegir_tercer_plato();
 	//agregar ensalada al menu
 	$menu_generado[]= Elegir_ensalada();
 	//agregar fruta al menu
 	$menu_generado[]= Elegir_fruta();
 	//agregar bebida al menu
 	$menu_generado[]= Elegir_bebida();
 	echo "prueba: ";
 }



?>
