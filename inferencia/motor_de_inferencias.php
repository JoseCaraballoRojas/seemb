<?php 
//SE RECIBEN LOS PARAMETROS
//$tipo_de_menu=$_POST['tipo'];

//SE INCLUYEN LOS ARCHIVOS CON LAS CLASES NECESARIAS.
include_once("../modelos/Plato.php");
include_once("../modelos/Ingrediente.php");
include_once("../modelos/Inventario.php");
include_once('../modelos/Menu.php');

// CONSTANTES Y VARIABLES GLOBALES NECESARIAS PARA GENERAR UNA RESPUESTA.
$ALMUERZO='AM';
$CALORIAS="750";
$PROTEINAS="65";
$CARBOHIDRATOS="275";
$GRASAS="65";
$p1=0;
$p2=0;
$p3=0;
$p4=0;
//###################VARIBALES#############################################################
$platos_disponibles=[];
$menu_generado=[];
$dia=date("N");
$turno=date("A");
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
	
$cantidad_platos=2500;
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
			$p1=$p1+1;
		}
		elseif ($datos['tipo']=='Segundo plato') {
			array_push($segundos_platos,$datos);
			$p2=$p2+1;
		}
		elseif ($datos['tipo']=='Tercer plato') {
			array_push($terceros_platos,$datos);
			$p3=$p3+1;
		}
		elseif ($datos['tipo']=='Ensalada') {
			array_push($ensaladas,$datos);
			$p4=$p4+1;
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
	
	$primer_plato_almuerzo=$primeros_platos[array_rand($primeros_platos)];
	$segundo_plato_almuerzo=$segundos_platos[array_rand($segundos_platos)];
	$tercer_plato_almuerzo=$terceros_platos[array_rand($terceros_platos)];
	$ensalada_almuerzo=$ensaladas[array_rand($ensaladas)];
	//sumamos las calorias de todos lo platos elegidos
		$calorias_totales=$primer_plato_almuerzo['calorias']+$segundo_plato_almuerzo['calorias']+$tercer_plato_almuerzo['calorias']+$ensalada_almuerzo['calorias'];
		//sumamos las proteinas de todos lo platos elegidos
		$proteinas_totales=$primer_plato_almuerzo['proteinas']+$segundo_plato_almuerzo['proteinas']+$tercer_plato_almuerzo['proteinas']+$ensalada_almuerzo['proteinas'];
		//sumamos las carbohidratos de todos lo platos elegidos
		$carbohidratos_totales=$primer_plato_almuerzo['carbohidratos']+$segundo_plato_almuerzo['carbohidratos']+$tercer_plato_almuerzo['carbohidratos']+$ensalada_almuerzo['carbohidratos'];
		//sumamos las grasas de todos lo platos elegidos
		$grasas_totales=$primer_plato_almuerzo['grasas']+$segundo_plato_almuerzo['grasas']+$tercer_plato_almuerzo['grasas']+$ensalada_almuerzo['grasas'];
		//sumamos las carbohidratos de todos lo platos elegidos
		$carbohidratos_totales=$primer_plato_almuerzo['carbohidratos']+$segundo_plato_almuerzo['carbohidratos']+$tercer_plato_almuerzo['carbohidratos']+$ensalada_almuerzo['carbohidratos'];
		//sumamos las azucares de todos lo platos elegidos
		$azucares_totales=$primer_plato_almuerzo['azucares']+$segundo_plato_almuerzo['azucares']+$tercer_plato_almuerzo['azucares']+$ensalada_almuerzo['azucares'];
		//sumamos las sal de todos lo platos elegidos
		$sal_totales=$primer_plato_almuerzo['sal']+$segundo_plato_almuerzo['sal']+$tercer_plato_almuerzo['sal']+$ensalada_almuerzo['sal'];
			
		

}
else{
	echo " No hay disponibles";
}	


echo "cuantos: ".count($terceros_platos);
?>
