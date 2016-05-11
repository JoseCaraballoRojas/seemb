<?php 
//SE RECIBEN LOS PARAMETROS
//SE INCLUYEN LOS ARCHIVOS CON LAS CLASES NECESARIAS.
include_once("../modelos/Plato.php");
include_once("../modelos/Ingrediente.php");
include_once("../modelos/Inventario.php");
include_once('../modelos/Menu.php');

// CONSTANTES Y VARIABLES GLOBALES NECESARIAS PARA GENERAR UNA RESPUESTA.
$CALORIAS="950";
$PROTEINAS="65";
//###################VARIBALES#############################################################
$platos_disponibles=[];
$menu_generado=[];
$dia=date("N");
$turno=date("A");
$almuerzo=2500;
$cena=1500;
$menu_anterior=[];
$primeros_platos=[];
$segundos_platos=[];
$terceros_platos=[];
$ensaladas=[];
$elegidos=[];
$RESULTADO='';

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
	
$cantidad_platos=$almuerzo;
$platos_registrados= new Plato();
//se obtienen todos los platos registrados en la bases de datos
$platos=$platos_registrados->Platos_registrados();
$ingredientes= new Ingrediente();
$cantidad_disponible= new Inventario();
$i=0;

//se recorre el array con los platos para comprobar cuales estan disponibles en inventario 
foreach($platos as $datos){

	$ingredientes_del_plato= $ingredientes->Busca_ingredientes($datos['id_plato'],$cantidad_platos);
	
	$control='TRUE';
	//se va comprovando cada ingrediente del plato para saber si existen en inventario
	foreach ($ingredientes_del_plato as $valor) {
		//echo "cantidad_requerida: ".$valor['cantidad_requerida']." Producto: ".$valor['producto'];
		$cantidad_r=$valor['cantidad_requerida'];
		$id_p=$valor['id_producto'];

		$disponible=$cantidad_disponible->Busca_cantidad($id_p,$cantidad_r);
		
		if ($disponible==0) {

			$control='FALSE';
		}
	}

	if ($control=='TRUE') {
		//si hay disponibilidad de los ingrediente en el inventario se agrega el plato actual a los platos que estan disponibles para preparar
		//$platos_disponibles[$i]= $datos;
		if ($datos['tipo']=='Primer plato') {
			array_push($primeros_platos, $datos);
			
		}
		elseif ($datos['tipo']=='Segundo plato') {
			array_push($segundos_platos,$datos);
			
		}
		elseif ($datos['tipo']=='Tercer plato') {
			array_push($terceros_platos,$datos);
			
		}
		elseif ($datos['tipo']=='Ensalada') {
			array_push($ensaladas,$datos);
		}
	}
//$i+=1;
}

 /*foreach ($platos_disponibles as $v) {
 	echo "platos_disponibles: ";
 	print_r($v);
 }*/
//#########################SEPARAR PLATOS DISPONIBLES POR TIPOS#################################################
//SE COMPRUEBA SI HAY PLATOS DISPONIBLES EN EL INVENTARIO.
if (!empty($primeros_platos) && !empty($segundos_platos) && !empty($terceros_platos) && !empty($ensaladas) ) 
{
	//######################SELECIONAR PLATOS DEL DIA LUNES###############################
	$primer_plato_almuerzo_lunes=$primeros_platos[array_rand($primeros_platos)];
	$segundo_plato_almuerzo_lunes=$segundos_platos[array_rand($segundos_platos)];
	$tercer_plato_almuerzo_lunes=$terceros_platos[array_rand($terceros_platos)];
	$ensalada_almuerzo_lunes=$ensaladas[array_rand($ensaladas)];
	//sumamos las calorias de todos lo platos elegidos
		$calorias_totales_lunes=$primer_plato_almuerzo_lunes['calorias']+$segundo_plato_almuerzo_lunes['calorias']+$tercer_plato_almuerzo_lunes['calorias']+$ensalada_almuerzo_lunes['calorias'];
		//sumamos las proteinas de todos lo platos elegidos
		$proteinas_totales_lunes=$primer_plato_almuerzo_lunes['proteinas']+$segundo_plato_almuerzo_lunes['proteinas']+$tercer_plato_almuerzo_lunes['proteinas']+$ensalada_almuerzo_lunes['proteinas'];
		//sumamos las carbohidratos de todos lo platos elegidos
		$carbohidratos_totales_lunes=$primer_plato_almuerzo_lunes['carbohidratos']+$segundo_plato_almuerzo_lunes['carbohidratos']+$tercer_plato_almuerzo_lunes['carbohidratos']+$ensalada_almuerzo_lunes['carbohidratos'];
		//sumamos las grasas de todos lo platos elegidos
		$grasas_totales_lunes=$primer_plato_almuerzo_lunes['grasas']+$segundo_plato_almuerzo_lunes['grasas']+$tercer_plato_almuerzo_lunes['grasas']+$ensalada_almuerzo_lunes['grasas'];
		//sumamos las carbohidratos de todos lo platos elegidos
		$carbohidratos_totales_lunes=$primer_plato_almuerzo_lunes['carbohidratos']+$segundo_plato_almuerzo_lunes['carbohidratos']+$tercer_plato_almuerzo_lunes['carbohidratos']+$ensalada_almuerzo_lunes['carbohidratos'];
		//sumamos las azucares de todos lo platos elegidos
		$azucares_totales_lunes=$primer_plato_almuerzo_lunes['azucares']+$segundo_plato_almuerzo_lunes['azucares']+$tercer_plato_almuerzo_lunes['azucares']+$ensalada_almuerzo_lunes['azucares'];
		//sumamos las sal de todos lo platos elegidos
		$sal_totales_lunes=$primer_plato_almuerzo_lunes['sal']+$segundo_plato_almuerzo_lunes['sal']+$tercer_plato_almuerzo_lunes['sal']+$ensalada_almuerzo_lunes['sal'];
			
//#########################################################################################################################

//######################SELECIONAR PLATOS DEL DIA MARTES##############################################################
  $primer_plato_almuerzo_martes=$primeros_platos[array_rand($primeros_platos)];
  $segundo_plato_almuerzo_martes=$segundos_platos[array_rand($segundos_platos)];
  $tercer_plato_almuerzo_martes=$terceros_platos[array_rand($terceros_platos)];
  $ensalada_almuerzo_martes=$ensaladas[array_rand($ensaladas)];
  //sumamos las calorias de todos lo platos elegidos
    $calorias_totales_martes=$primer_plato_almuerzo_martes['calorias']+$segundo_plato_almuerzo_martes['calorias']+$tercer_plato_almuerzo_martes['calorias']+$ensalada_almuerzo_martes['calorias'];
    //sumamos las proteinas de todos lo platos elegidos
    $proteinas_totales_martes=$primer_plato_almuerzo_martes['proteinas']+$segundo_plato_almuerzo_martes['proteinas']+$tercer_plato_almuerzo_martes['proteinas']+$ensalada_almuerzo_martes['proteinas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_martes=$primer_plato_almuerzo_martes['carbohidratos']+$segundo_plato_almuerzo_martes['carbohidratos']+$tercer_plato_almuerzo_martes['carbohidratos']+$ensalada_almuerzo_martes['carbohidratos'];
    //sumamos las grasas de todos lo platos elegidos
    $grasas_totales_martes=$primer_plato_almuerzo_martes['grasas']+$segundo_plato_almuerzo_martes['grasas']+$tercer_plato_almuerzo_martes['grasas']+$ensalada_almuerzo_martes['grasas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_martes=$primer_plato_almuerzo_martes['carbohidratos']+$segundo_plato_almuerzo_martes['carbohidratos']+$tercer_plato_almuerzo_martes['carbohidratos']+$ensalada_almuerzo_martes['carbohidratos'];
    //sumamos las azucares de todos lo platos elegidos
    $azucares_totales_martes=$primer_plato_almuerzo_martes['azucares']+$segundo_plato_almuerzo_martes['azucares']+$tercer_plato_almuerzo_martes['azucares']+$ensalada_almuerzo_martes['azucares'];
    //sumamos las sal de todos lo platos elegidos
    $sal_totales_martes=$primer_plato_almuerzo_martes['sal']+$segundo_plato_almuerzo_martes['sal']+$tercer_plato_almuerzo_martes['sal']+$ensalada_almuerzo_martes['sal'];

  //#################################################################################################################

//######################SELECIONAR PLATOS DEL DIA MIERCOLES#########################################################
  $primer_plato_almuerzo_miercoles=$primeros_platos[array_rand($primeros_platos)];
  $segundo_plato_almuerzo_miercoles=$segundos_platos[array_rand($segundos_platos)];
  $tercer_plato_almuerzo_miercoles=$terceros_platos[array_rand($terceros_platos)];
  $ensalada_almuerzo_miercoles=$ensaladas[array_rand($ensaladas)];
  //sumamos las calorias de todos lo platos elegidos
    $calorias_totales_miercoles=$primer_plato_almuerzo_miercoles['calorias']+$segundo_plato_almuerzo_miercoles['calorias']+$tercer_plato_almuerzo_miercoles['calorias']+$ensalada_almuerzo_miercoles['calorias'];
    //sumamos las proteinas de todos lo platos elegidos
    $proteinas_totales_miercoles=$primer_plato_almuerzo_miercoles['proteinas']+$segundo_plato_almuerzo_miercoles['proteinas']+$tercer_plato_almuerzo_miercoles['proteinas']+$ensalada_almuerzo_miercoles['proteinas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_miercoles=$primer_plato_almuerzo_miercoles['carbohidratos']+$segundo_plato_almuerzo_miercoles['carbohidratos']+$tercer_plato_almuerzo_miercoles['carbohidratos']+$ensalada_almuerzo_miercoles['carbohidratos'];
    //sumamos las grasas de todos lo platos elegidos
    $grasas_totales_miercoles=$primer_plato_almuerzo_miercoles['grasas']+$segundo_plato_almuerzo_miercoles['grasas']+$tercer_plato_almuerzo_miercoles['grasas']+$ensalada_almuerzo_miercoles['grasas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_miercoles=$primer_plato_almuerzo_miercoles['carbohidratos']+$segundo_plato_almuerzo_miercoles['carbohidratos']+$tercer_plato_almuerzo_miercoles['carbohidratos']+$ensalada_almuerzo_miercoles['carbohidratos'];
    //sumamos las azucares de todos lo platos elegidos
    $azucares_totales_miercoles=$primer_plato_almuerzo_miercoles['azucares']+$segundo_plato_almuerzo_miercoles['azucares']+$tercer_plato_almuerzo_miercoles['azucares']+$ensalada_almuerzo_miercoles['azucares'];
    //sumamos las sal de todos lo platos elegidos
    $sal_totales_miercoles=$primer_plato_almuerzo_miercoles['sal']+$segundo_plato_almuerzo_miercoles['sal']+$tercer_plato_almuerzo_miercoles['sal']+$ensalada_almuerzo_miercoles['sal'];

//###############################################################################################################

//######################SELECIONAR PLATOS DEL DIA JUEVES#########################################################
  $primer_plato_almuerzo_jueves=$primeros_platos[array_rand($primeros_platos)];
  $segundo_plato_almuerzo_jueves=$segundos_platos[array_rand($segundos_platos)];
  $tercer_plato_almuerzo_jueves=$terceros_platos[array_rand($terceros_platos)];
  $ensalada_almuerzo_jueves=$ensaladas[array_rand($ensaladas)];
  //sumamos las calorias de todos lo platos elegidos
    $calorias_totales_jueves=$primer_plato_almuerzo_jueves['calorias']+$segundo_plato_almuerzo_jueves['calorias']+$tercer_plato_almuerzo_jueves['calorias']+$ensalada_almuerzo_jueves['calorias'];
    //sumamos las proteinas de todos lo platos elegidos
    $proteinas_totales_jueves=$primer_plato_almuerzo_jueves['proteinas']+$segundo_plato_almuerzo_jueves['proteinas']+$tercer_plato_almuerzo_jueves['proteinas']+$ensalada_almuerzo_jueves['proteinas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_jueves=$primer_plato_almuerzo_jueves['carbohidratos']+$segundo_plato_almuerzo_jueves['carbohidratos']+$tercer_plato_almuerzo_jueves['carbohidratos']+$ensalada_almuerzo_jueves['carbohidratos'];
    //sumamos las grasas de todos lo platos elegidos
    $grasas_totales_jueves=$primer_plato_almuerzo_jueves['grasas']+$segundo_plato_almuerzo_jueves['grasas']+$tercer_plato_almuerzo_jueves['grasas']+$ensalada_almuerzo_jueves['grasas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_jueves=$primer_plato_almuerzo_jueves['carbohidratos']+$segundo_plato_almuerzo_jueves['carbohidratos']+$tercer_plato_almuerzo_jueves['carbohidratos']+$ensalada_almuerzo_jueves['carbohidratos'];
    //sumamos las azucares de todos lo platos elegidos
    $azucares_totales_jueves=$primer_plato_almuerzo_jueves['azucares']+$segundo_plato_almuerzo_jueves['azucares']+$tercer_plato_almuerzo_jueves['azucares']+$ensalada_almuerzo_jueves['azucares'];
    //sumamos las sal de todos lo platos elegidos
    $sal_totales_jueves=$primer_plato_almuerzo_jueves['sal']+$segundo_plato_almuerzo_jueves['sal']+$tercer_plato_almuerzo_jueves['sal']+$ensalada_almuerzo_jueves['sal'];

//###############################################################################################################

//######################SELECIONAR PLATOS DEL DIA VIERNES#########################################################
  $primer_plato_almuerzo_viernes=$primeros_platos[array_rand($primeros_platos)];
  $segundo_plato_almuerzo_viernes=$segundos_platos[array_rand($segundos_platos)];
  $tercer_plato_almuerzo_viernes=$terceros_platos[array_rand($terceros_platos)];
  $ensalada_almuerzo_viernes=$ensaladas[array_rand($ensaladas)];
  //sumamos las calorias de todos lo platos elegidos
    $calorias_totales_viernes=$primer_plato_almuerzo_viernes['calorias']+$segundo_plato_almuerzo_viernes['calorias']+$tercer_plato_almuerzo_viernes['calorias']+$ensalada_almuerzo_viernes['calorias'];
    //sumamos las proteinas de todos lo platos elegidos
    $proteinas_totales_viernes=$primer_plato_almuerzo_viernes['proteinas']+$segundo_plato_almuerzo_viernes['proteinas']+$tercer_plato_almuerzo_viernes['proteinas']+$ensalada_almuerzo_viernes['proteinas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_viernes=$primer_plato_almuerzo_viernes['carbohidratos']+$segundo_plato_almuerzo_viernes['carbohidratos']+$tercer_plato_almuerzo_viernes['carbohidratos']+$ensalada_almuerzo_viernes['carbohidratos'];
    //sumamos las grasas de todos lo platos elegidos
    $grasas_totales_viernes=$primer_plato_almuerzo_viernes['grasas']+$segundo_plato_almuerzo_viernes['grasas']+$tercer_plato_almuerzo_viernes['grasas']+$ensalada_almuerzo_viernes['grasas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_viernes=$primer_plato_almuerzo_viernes['carbohidratos']+$segundo_plato_almuerzo_viernes['carbohidratos']+$tercer_plato_almuerzo_viernes['carbohidratos']+$ensalada_almuerzo_viernes['carbohidratos'];
    //sumamos las azucares de todos lo platos elegidos
    $azucares_totales_viernes=$primer_plato_almuerzo_viernes['azucares']+$segundo_plato_almuerzo_viernes['azucares']+$tercer_plato_almuerzo_viernes['azucares']+$ensalada_almuerzo_viernes['azucares'];
    //sumamos las sal de todos lo platos elegidos
    $sal_totales_viernes=$primer_plato_almuerzo_viernes['sal']+$segundo_plato_almuerzo_viernes['sal']+$tercer_plato_almuerzo_viernes['sal']+$ensalada_almuerzo_viernes['sal'];

//###############################################################################################################




//###########################GENERAR LAS CENAS SEMNALES#########################################################

//######################SELECIONAR PLATOS DEL DIA LUNES###############################
  $primer_plato_cena_lunes=$primeros_platos[array_rand($primeros_platos)];
  $segundo_plato_cena_lunes=$segundos_platos[array_rand($segundos_platos)];
  $tercer_plato_cena_lunes=$terceros_platos[array_rand($terceros_platos)];
  $ensalada_cena_lunes=$ensaladas[array_rand($ensaladas)];
  //sumamos las calorias de todos lo platos elegidos
    $calorias_totales_lunes=$primer_plato_cena_lunes['calorias']+$segundo_plato_cena_lunes['calorias']+$tercer_plato_cena_lunes['calorias']+$ensalada_cena_lunes['calorias'];
    //sumamos las proteinas de todos lo platos elegidos
    $proteinas_totales_lunes=$primer_plato_cena_lunes['proteinas']+$segundo_plato_cena_lunes['proteinas']+$tercer_plato_cena_lunes['proteinas']+$ensalada_cena_lunes['proteinas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_lunes=$primer_plato_cena_lunes['carbohidratos']+$segundo_plato_cena_lunes['carbohidratos']+$tercer_plato_cena_lunes['carbohidratos']+$ensalada_cena_lunes['carbohidratos'];
    //sumamos las grasas de todos lo platos elegidos
    $grasas_totales_lunes=$primer_plato_cena_lunes['grasas']+$segundo_plato_cena_lunes['grasas']+$tercer_plato_cena_lunes['grasas']+$ensalada_cena_lunes['grasas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_lunes=$primer_plato_cena_lunes['carbohidratos']+$segundo_plato_cena_lunes['carbohidratos']+$tercer_plato_cena_lunes['carbohidratos']+$ensalada_cena_lunes['carbohidratos'];
    //sumamos las azucares de todos lo platos elegidos
    $azucares_totales_lunes=$primer_plato_cena_lunes['azucares']+$segundo_plato_cena_lunes['azucares']+$tercer_plato_cena_lunes['azucares']+$ensalada_cena_lunes['azucares'];
    //sumamos las sal de todos lo platos elegidos
    $sal_totales_lunes=$primer_plato_cena_lunes['sal']+$segundo_plato_cena_lunes['sal']+$tercer_plato_cena_lunes['sal']+$ensalada_cena_lunes['sal'];
      
//#########################################################################################################################

//######################SELECIONAR PLATOS DEL DIA MARTES##############################################################
  $primer_plato_cena_martes=$primeros_platos[array_rand($primeros_platos)];
  $segundo_plato_cena_martes=$segundos_platos[array_rand($segundos_platos)];
  $tercer_plato_cena_martes=$terceros_platos[array_rand($terceros_platos)];
  $ensalada_cena_martes=$ensaladas[array_rand($ensaladas)];
  //sumamos las calorias de todos lo platos elegidos
    $calorias_totales_martes=$primer_plato_cena_martes['calorias']+$segundo_plato_cena_martes['calorias']+$tercer_plato_cena_martes['calorias']+$ensalada_cena_martes['calorias'];
    //sumamos las proteinas de todos lo platos elegidos
    $proteinas_totales_martes=$primer_plato_cena_martes['proteinas']+$segundo_plato_cena_martes['proteinas']+$tercer_plato_cena_martes['proteinas']+$ensalada_cena_martes['proteinas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_martes=$primer_plato_cena_martes['carbohidratos']+$segundo_plato_cena_martes['carbohidratos']+$tercer_plato_cena_martes['carbohidratos']+$ensalada_cena_martes['carbohidratos'];
    //sumamos las grasas de todos lo platos elegidos
    $grasas_totales_martes=$primer_plato_cena_martes['grasas']+$segundo_plato_cena_martes['grasas']+$tercer_plato_cena_martes['grasas']+$ensalada_cena_martes['grasas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_martes=$primer_plato_cena_martes['carbohidratos']+$segundo_plato_cena_martes['carbohidratos']+$tercer_plato_cena_martes['carbohidratos']+$ensalada_cena_martes['carbohidratos'];
    //sumamos las azucares de todos lo platos elegidos
    $azucares_totales_martes=$primer_plato_cena_martes['azucares']+$segundo_plato_cena_martes['azucares']+$tercer_plato_cena_martes['azucares']+$ensalada_cena_martes['azucares'];
    //sumamos las sal de todos lo platos elegidos
    $sal_totales_martes=$primer_plato_cena_martes['sal']+$segundo_plato_cena_martes['sal']+$tercer_plato_cena_martes['sal']+$ensalada_cena_martes['sal'];

  //#################################################################################################################

//######################SELECIONAR PLATOS DEL DIA MIERCOLES#########################################################
  $primer_plato_cena_miercoles=$primeros_platos[array_rand($primeros_platos)];
  $segundo_plato_cena_miercoles=$segundos_platos[array_rand($segundos_platos)];
  $tercer_plato_cena_miercoles=$terceros_platos[array_rand($terceros_platos)];
  $ensalada_cena_miercoles=$ensaladas[array_rand($ensaladas)];
  //sumamos las calorias de todos lo platos elegidos
    $calorias_totales_miercoles=$primer_plato_cena_miercoles['calorias']+$segundo_plato_cena_miercoles['calorias']+$tercer_plato_cena_miercoles['calorias']+$ensalada_cena_miercoles['calorias'];
    //sumamos las proteinas de todos lo platos elegidos
    $proteinas_totales_miercoles=$primer_plato_cena_miercoles['proteinas']+$segundo_plato_cena_miercoles['proteinas']+$tercer_plato_cena_miercoles['proteinas']+$ensalada_cena_miercoles['proteinas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_miercoles=$primer_plato_cena_miercoles['carbohidratos']+$segundo_plato_cena_miercoles['carbohidratos']+$tercer_plato_cena_miercoles['carbohidratos']+$ensalada_cena_miercoles['carbohidratos'];
    //sumamos las grasas de todos lo platos elegidos
    $grasas_totales_miercoles=$primer_plato_cena_miercoles['grasas']+$segundo_plato_cena_miercoles['grasas']+$tercer_plato_cena_miercoles['grasas']+$ensalada_cena_miercoles['grasas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_miercoles=$primer_plato_cena_miercoles['carbohidratos']+$segundo_plato_cena_miercoles['carbohidratos']+$tercer_plato_cena_miercoles['carbohidratos']+$ensalada_cena_miercoles['carbohidratos'];
    //sumamos las azucares de todos lo platos elegidos
    $azucares_totales_miercoles=$primer_plato_cena_miercoles['azucares']+$segundo_plato_cena_miercoles['azucares']+$tercer_plato_cena_miercoles['azucares']+$ensalada_cena_miercoles['azucares'];
    //sumamos las sal de todos lo platos elegidos
    $sal_totales_miercoles=$primer_plato_cena_miercoles['sal']+$segundo_plato_cena_miercoles['sal']+$tercer_plato_cena_miercoles['sal']+$ensalada_cena_miercoles['sal'];

//###############################################################################################################

//######################SELECIONAR PLATOS DEL DIA JUEVES#########################################################
  $primer_plato_cena_jueves=$primeros_platos[array_rand($primeros_platos)];
  $segundo_plato_cena_jueves=$segundos_platos[array_rand($segundos_platos)];
  $tercer_plato_cena_jueves=$terceros_platos[array_rand($terceros_platos)];
  $ensalada_cena_jueves=$ensaladas[array_rand($ensaladas)];
  //sumamos las calorias de todos lo platos elegidos
    $calorias_totales_jueves=$primer_plato_cena_jueves['calorias']+$segundo_plato_cena_jueves['calorias']+$tercer_plato_cena_jueves['calorias']+$ensalada_cena_jueves['calorias'];
    //sumamos las proteinas de todos lo platos elegidos
    $proteinas_totales_jueves=$primer_plato_cena_jueves['proteinas']+$segundo_plato_cena_jueves['proteinas']+$tercer_plato_cena_jueves['proteinas']+$ensalada_cena_jueves['proteinas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_jueves=$primer_plato_cena_jueves['carbohidratos']+$segundo_plato_cena_jueves['carbohidratos']+$tercer_plato_cena_jueves['carbohidratos']+$ensalada_cena_jueves['carbohidratos'];
    //sumamos las grasas de todos lo platos elegidos
    $grasas_totales_jueves=$primer_plato_cena_jueves['grasas']+$segundo_plato_cena_jueves['grasas']+$tercer_plato_cena_jueves['grasas']+$ensalada_cena_jueves['grasas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_jueves=$primer_plato_cena_jueves['carbohidratos']+$segundo_plato_cena_jueves['carbohidratos']+$tercer_plato_cena_jueves['carbohidratos']+$ensalada_cena_jueves['carbohidratos'];
    //sumamos las azucares de todos lo platos elegidos
    $azucares_totales_jueves=$primer_plato_cena_jueves['azucares']+$segundo_plato_cena_jueves['azucares']+$tercer_plato_cena_jueves['azucares']+$ensalada_cena_jueves['azucares'];
    //sumamos las sal de todos lo platos elegidos
    $sal_totales_jueves=$primer_plato_cena_jueves['sal']+$segundo_plato_cena_jueves['sal']+$tercer_plato_cena_jueves['sal']+$ensalada_cena_jueves['sal'];

//###############################################################################################################

//######################SELECIONAR PLATOS DEL DIA VIERNES#########################################################
  $primer_plato_cena_viernes=$primeros_platos[array_rand($primeros_platos)];
  $segundo_plato_cena_viernes=$segundos_platos[array_rand($segundos_platos)];
  $tercer_plato_cena_viernes=$terceros_platos[array_rand($terceros_platos)];
  $ensalada_cena_viernes=$ensaladas[array_rand($ensaladas)];
  //sumamos las calorias de todos lo platos elegidos
    $calorias_totales_viernes=$primer_plato_cena_viernes['calorias']+$segundo_plato_cena_viernes['calorias']+$tercer_plato_cena_viernes['calorias']+$ensalada_cena_viernes['calorias'];
    //sumamos las proteinas de todos lo platos elegidos
    $proteinas_totales_viernes=$primer_plato_cena_viernes['proteinas']+$segundo_plato_cena_viernes['proteinas']+$tercer_plato_cena_viernes['proteinas']+$ensalada_cena_viernes['proteinas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_viernes=$primer_plato_cena_viernes['carbohidratos']+$segundo_plato_cena_viernes['carbohidratos']+$tercer_plato_cena_viernes['carbohidratos']+$ensalada_cena_viernes['carbohidratos'];
    //sumamos las grasas de todos lo platos elegidos
    $grasas_totales_viernes=$primer_plato_cena_viernes['grasas']+$segundo_plato_cena_viernes['grasas']+$tercer_plato_cena_viernes['grasas']+$ensalada_cena_viernes['grasas'];
    //sumamos las carbohidratos de todos lo platos elegidos
    $carbohidratos_totales_viernes=$primer_plato_cena_viernes['carbohidratos']+$segundo_plato_cena_viernes['carbohidratos']+$tercer_plato_cena_viernes['carbohidratos']+$ensalada_cena_viernes['carbohidratos'];
    //sumamos las azucares de todos lo platos elegidos
    $azucares_totales_viernes=$primer_plato_cena_viernes['azucares']+$segundo_plato_cena_viernes['azucares']+$tercer_plato_cena_viernes['azucares']+$ensalada_cena_viernes['azucares'];
    //sumamos las sal de todos lo platos elegidos
    $sal_totales_viernes=$primer_plato_cena_viernes['sal']+$segundo_plato_cena_viernes['sal']+$tercer_plato_cena_viernes['sal']+$ensalada_cena_viernes['sal'];

//###############################################################################################################
}
else{
	$RESULTADO='INVENTARIO';
}	

if ($RESULTADO=='INVENTARIO') {
    echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay productos suficientes en el inventario para generar un menú.
               </div>";
  }
  else{
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped'>
          <thead >
            <tr class='btn-danger '>
            <th colspan='6' class='text-center'><h3> <b>Menú Semanal</h3></th>
            </tr>
            <tr class='btn-success '>
            <th colspan='6' class='text-center'><h4> <b>Almuerzo</h4></th>
            </tr>
            <tr class='btn-primary'>
            <th class='text-center ' >Platos</th>
              <th  class='text-center'>Lunes</th>
              <th class='text-center' >Martes</th>
              <th class='text-center' >Miércoles</th>
              <th class='text-center' >Jueves</th>
              <th class='text-center' >Viernes</th>
            </tr>";
           
              
                echo "<tr> 
                          <td class='info' ><b> Primer plato</td>
                          <td >".$primer_plato_almuerzo_lunes['plato']."</td>
                          <td >".$primer_plato_almuerzo_martes['plato']."</td>
                          <td >".$primer_plato_almuerzo_miercoles['plato']."</td>
                          <td >".$primer_plato_almuerzo_jueves['plato']."</td>
                          <td >".$primer_plato_almuerzo_viernes['plato']."</td>
                          
                      </tr>";
                 echo "<tr> 
                          <td class='info' ><b> Segundo plato</td>
                          <td >".$segundo_plato_almuerzo_lunes['plato']."</td>
                          <td >".$segundo_plato_almuerzo_martes['plato']."</td>
                          <td >".$segundo_plato_almuerzo_miercoles['plato']."</td>
                          <td >".$segundo_plato_almuerzo_jueves['plato']."</td>
                          <td >".$segundo_plato_almuerzo_viernes['plato']."</td>
                          
                      </tr>";
                echo "<tr> 
                          <td class='info' ><b> Tercer plato</td>
                          <td >".$tercer_plato_almuerzo_lunes['plato']."</td>
                          <td >".$tercer_plato_almuerzo_martes['plato']."</td>
                          <td >".$tercer_plato_almuerzo_miercoles['plato']."</td>
                          <td >".$tercer_plato_almuerzo_jueves['plato']."</td>
                          <td >".$tercer_plato_almuerzo_viernes['plato']."</td>
                          
                      </tr>";
                echo "<tr> 
                          <td class='info' ><b> Ensalada</td>
                          <td >".$ensalada_almuerzo_lunes['plato']."</td>
                          <td >".$ensalada_almuerzo_martes['plato']."</td>
                          <td >".$ensalada_almuerzo_miercoles['plato']."</td>
                          <td >".$ensalada_almuerzo_jueves['plato']."</td>
                          <td >".$ensalada_almuerzo_viernes['plato']."</td>
                          
                      </tr>";
                 echo "<tr> 
                          <td  class='info'><b> Postre</td>
                          <td class='text-center' colspan='5'> Fruta del dia</td>
                          
                      </tr>";
                echo "<tr> 
                          <td class='info'><b> Bebida</td>
                          <td class='text-center' colspan='5'> Jugo de frutas</td>
                      </tr>";
              
  echo "<tr class='btn-success '>
            <th colspan='6' class='text-center'><h4> <b>Información nutricional</h4></th>
            </tr>";
      /*if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Platos registrados para este menu.
               </div>";
        }*/
      
   echo "    
          <tr>
              <td class='info'> <b>Energía (Kcal): </td>
              <td class='text-center'>".$calorias_totales_lunes."</td>
              <td class='text-center'>".$calorias_totales_martes."</td>
              <td class='text-center'>".$calorias_totales_miercoles."</td>
              <td class='text-center'>".$calorias_totales_jueves."</td>
              <td class='text-center'>".$calorias_totales_viernes."</td>
              
          </tr>
            ";
echo "    
          <tr>
              <td class='info'> <b>Carbohidratos (g): </td>
              <td class='text-center'>".$carbohidratos_totales_lunes."</td>
              <td class='text-center'>".$carbohidratos_totales_martes."</td>
              <td class='text-center'>".$carbohidratos_totales_miercoles."</td>
              <td class='text-center'>".$carbohidratos_totales_jueves."</td>
              <td class='text-center'>".$carbohidratos_totales_viernes."</td>
              
          </tr>
            ";

echo "    
          <tr>
              <td class='info'> <b>Proteínas (g): </td>
              <td class='text-center'>".$proteinas_totales_lunes."</td>
              <td class='text-center'>".$proteinas_totales_martes."</td>
              <td class='text-center'>".$proteinas_totales_miercoles."</td>
              <td class='text-center'>".$proteinas_totales_jueves."</td>
              <td class='text-center'>".$proteinas_totales_viernes."</td>
              
          </tr>
            ";

echo "    
          <tr>
              <td class='info'> <b>Grasas (g): </td>
              <td class='text-center'>".$grasas_totales_lunes."</td>
              <td class='text-center'>".$grasas_totales_martes."</td>
              <td class='text-center'>".$grasas_totales_miercoles."</td>
              <td class='text-center'>".$grasas_totales_jueves."</td>
              <td class='text-center'>".$grasas_totales_viernes."</td>
              
          </tr>
            ";

echo "    
          <tr>
              <td class='info'> <b>Azúcares (g): </td>
              <td class='text-center'>".$azucares_totales_lunes."</td>
              <td class='text-center'>".$azucares_totales_martes."</td>
              <td class='text-center'>".$azucares_totales_miercoles."</td>
              <td class='text-center'>".$azucares_totales_jueves."</td>
              <td class='text-center'>".$azucares_totales_viernes."</td>
              
          </tr>
            ";

echo "    
          <tr>
              <td class='info'> <b>Sal (g): </td>
              <td class='text-center'>".$sal_totales_lunes."</td>
              <td class='text-center'>".$sal_totales_martes."</td>
              <td class='text-center'>".$sal_totales_miercoles."</td>
              <td class='text-center'>".$sal_totales_jueves."</td>
              <td class='text-center'>".$sal_totales_viernes."</td>
              
          </tr>
            ";
//#############################################CENAS##############################################


echo "
            <tr class='btn-success' >
            <th colspan='6' class='text-center'><h4> <b>Cena</h4></th>
            </tr>
            <tr class='btn-primary'>
              <th >Platos</th>
              <th >Lunes</th>
              <th >Martes</th>
              <th >Miércoles</th>
              <th >Jueves</th>
              <th >Viernes</th>
            </tr>";
           
              
                echo "<tr> 
                          <td class='info'> Primer plato</td>
                          <td >".$primer_plato_cena_lunes['plato']."</td>
                          <td >".$primer_plato_cena_martes['plato']."</td>
                          <td >".$primer_plato_cena_miercoles['plato']."</td>
                          <td >".$primer_plato_cena_jueves['plato']."</td>
                          <td >".$primer_plato_cena_viernes['plato']."</td>
                          
                      </tr>";
                 echo "<tr> 
                          <td class='info'> Segundo plato</td>
                          <td >".$segundo_plato_cena_lunes['plato']."</td>
                          <td >".$segundo_plato_cena_martes['plato']."</td>
                          <td >".$segundo_plato_cena_miercoles['plato']."</td>
                          <td >".$segundo_plato_cena_jueves['plato']."</td>
                          <td >".$segundo_plato_cena_viernes['plato']."</td>
                          
                      </tr>";
                echo "<tr> 
                          <td class='info'> Tercer plato</td>
                          <td >".$tercer_plato_cena_lunes['plato']."</td>
                          <td >".$tercer_plato_cena_martes['plato']."</td>
                          <td >".$tercer_plato_cena_miercoles['plato']."</td>
                          <td >".$tercer_plato_cena_jueves['plato']."</td>
                          <td >".$tercer_plato_cena_viernes['plato']."</td>
                          
                      </tr>";
                echo "<tr> 
                          <td class='info'> Ensalada</td>
                          <td >".$ensalada_cena_lunes['plato']."</td>
                          <td >".$ensalada_cena_martes['plato']."</td>
                          <td >".$ensalada_cena_miercoles['plato']."</td>
                          <td >".$ensalada_cena_jueves['plato']."</td>
                          <td >".$ensalada_cena_viernes['plato']."</td>
                          
                      </tr>";
                 echo "<tr> 
                          <td class='info' > Postre</td>
                          <td class='text-center' colspan='5'>Fruta del día</td>
                      </tr>";
                echo "<tr> 
                          <td class='info' > Bebida</td>
                          <td class='text-center' colspan='5'>Jugo de frutas</td>
                      </tr>";
              
  echo "<tr class='btn-success '>
            <th colspan='6' class='text-center'><h4> <b>Información Nutricional</h4></th>
            </tr>";
      /*if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Platos registrados para este menu.
               </div>";
        }*/
      
   echo "    
          <tr>
              <td class='info'> <b>Energía (Kcal): </td>
              <td class='text-center'>".$calorias_totales_lunes."</td>
              <td class='text-center'>".$calorias_totales_martes."</td>
              <td class='text-center'>".$calorias_totales_miercoles."</td>
              <td class='text-center'>".$calorias_totales_jueves."</td>
              <td class='text-center'>".$calorias_totales_viernes."</td>
              
          </tr>
            ";
echo "    
          <tr>
              <td class='info'> <b>Carbohidratos (g): </td>
              <td class='text-center'>".$carbohidratos_totales_lunes."</td>
              <td class='text-center'>".$carbohidratos_totales_martes."</td>
              <td class='text-center'>".$carbohidratos_totales_miercoles."</td>
              <td class='text-center'>".$carbohidratos_totales_jueves."</td>
              <td class='text-center'>".$carbohidratos_totales_viernes."</td>
              
          </tr>
            ";

echo "    
          <tr>
              <td class='info'> <b>Proteínas (g): </td>
              <td class='text-center'>".$proteinas_totales_lunes."</td>
              <td class='text-center'>".$proteinas_totales_martes."</td>
              <td class='text-center'>".$proteinas_totales_miercoles."</td>
              <td class='text-center'>".$proteinas_totales_jueves."</td>
              <td class='text-center'>".$proteinas_totales_viernes."</td>
              
          </tr>
            ";

echo "    
          <tr>
              <td class='info'> <b>Grasas (g): </td>
              <td class='text-center'>".$grasas_totales_lunes."</td>
              <td class='text-center'>".$grasas_totales_martes."</td>
              <td class='text-center'>".$grasas_totales_miercoles."</td>
              <td class='text-center'>".$grasas_totales_jueves."</td>
              <td class='text-center'>".$grasas_totales_viernes."</td>
              
          </tr>
            ";

echo "    
          <tr>
              <td class='info'> <b>Azúcares (g): </td>
              <td class='text-center'>".$azucares_totales_lunes."</td>
              <td class='text-center'>".$azucares_totales_martes."</td>
              <td class='text-center'>".$azucares_totales_miercoles."</td>
              <td class='text-center'>".$azucares_totales_jueves."</td>
              <td class='text-center'>".$azucares_totales_viernes."</td>
              
          </tr>
            ";

echo "    
          <tr>
              <td class='info'> <b>Sal (g): </td>
              <td class='text-center'>".$sal_totales_lunes."</td>
              <td class='text-center'>".$sal_totales_martes."</td>
              <td class='text-center'>".$sal_totales_miercoles."</td>
              <td class='text-center'>".$sal_totales_jueves."</td>
              <td class='text-center'>".$sal_totales_viernes."</td>
              
          </tr>
            ";

      echo "
          <tr>
              <td class='text-center' colspan='2'>               
                <a href='vista_memu_especial.php' class='btn btn-info btn-block '>
                <span class='fa fa-reply fa-lg'> Atrás</span>
                </a>
              </td>
              <td class='text-center' colspan='2'>               
                <a href='vista_menu_semanal.php' class='btn btn-primary btn-block '>
                <span class='fa fa-refresh fa-lg' aria-hidden='true'> Generar menú</span>
                </a>
              </td>
              <td class='text-center' colspan='2'>               
                <a href='vista_menu.php' class='btn btn-success btn-block '>
                <span class='fa fa-floppy-o fa-lg' aria-hidden='true'> Guardar menú</span>
                </a>
              </td>
          </tr>
          </tbody>
        </table> ";
}     


?>
