<?php 
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
	if ($turno==$ALMUERZO) {
		$cantidad_platos=2500;
	}
	else{
		$cantidad_platos=1500;
	}


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
		$platos_disponibles[$i]= $datos;
		if ($datos['tipo']=='Primer plato') {
			$p1=$p1+1;
		}
		elseif ($datos['tipo']=='Segundo plato') {
			$p2=$p2+1;
		}
		elseif ($datos['tipo']=='tercer plato') {
			$p3=$p3+1;
		}
		elseif ($datos['tipo']=='Ensalada') {
			$p4=$p4+1;
		}
	}
$i+=1;
}

 /*foreach ($platos_disponibles as $v) {
 	echo "platos_disponibles: ";
 	print_r($v);
 }*/

 //SE COMPRUEBA SI HAY PLATOS DISPONIBLES EN EL INVENTARIO.
if (!empty($platos_disponibles)) 
{

	//se comprueba si ha un menu generado anteriormente
	if ($menu_anterior==0) {

		$salir='no';
		while ($salir=='no') {
			$primer_plato=$platos_disponibles[array_rand($platos_disponibles)];
			if ($primer_plato['tipo']=='Primer plato') {
				
				$salir='si';
			}
		}

		$salir='no';
		while ($salir=='no') {
			$segundo_plato=$platos_disponibles[array_rand($platos_disponibles)];
			if ($segundo_plato['tipo']=='Segundo plato') {
				
				$salir='si';
			}
		}

		$salir='no';
		while ($salir=='no') {
			$tercer_plato=$platos_disponibles[array_rand($platos_disponibles)];
			if ($tercer_plato['tipo']=='Tercer plato') {
				
				$salir='si';
			}
		}
		$salir='no';
		while ($salir=='no') {
			$ensalada=$platos_disponibles[array_rand($platos_disponibles)];
			if ($ensalada['tipo']=='Ensalada') {
				
				$salir='si';
			}
		}
		//echo "primero platos: ".$p1." segundos platos: ".$p2." terceros platos: ".$p3." ensaladas: ".$p4;
		//sumamos las calorias de todos lo platos elegidos
		$calorias_totales=$primer_plato['calorias']+$segundo_plato['calorias']+$tercer_plato['calorias']+$ensalada['calorias'];
		//sumamos las proteinas de todos lo platos elegidos
		$proteinas_totales=$primer_plato['proteinas']+$segundo_plato['proteinas']+$tercer_plato['proteinas']+$ensalada['proteinas'];
		//sumamos las carbohidratos de todos lo platos elegidos
		$carbohidratos_totales=$primer_plato['carbohidratos']+$segundo_plato['carbohidratos']+$tercer_plato['carbohidratos']+$ensalada['carbohidratos'];
		//sumamos las grasas de todos lo platos elegidos
		$grasas_totales=$primer_plato['grasas']+$segundo_plato['grasas']+$tercer_plato['grasas']+$ensalada['grasas'];
		//sumamos las carbohidratos de todos lo platos elegidos
		$carbohidratos_totales=$primer_plato['carbohidratos']+$segundo_plato['carbohidratos']+$tercer_plato['carbohidratos']+$ensalada['carbohidratos'];
		//sumamos las azucares de todos lo platos elegidos
		$azucares_totales=$primer_plato['azucares']+$segundo_plato['azucares']+$tercer_plato['azucares']+$ensalada['azucares'];
		//sumamos las sal de todos lo platos elegidos
		$sal_totales=$primer_plato['sal']+$segundo_plato['sal']+$tercer_plato['sal']+$ensalada['sal'];
	}
	else{
		$menu_completo='no';
		$i1=0; $i2=0; $i3=0; $i4=0;
		$j1=0; $j2=0; $j3=0; $j4=0;

		while ($menu_completo=='no') {

			foreach ($platos_disponibles as $plato) 
			{
				$repetido='no';
				//se comprueba si el plato actual en la variable que recorre el array es de tipo Primer plato
				if ($plato['tipo']=='Primer plato') 
				{

					foreach ($menu_anterior as $menu) 
					{
						if ($menu['primer_plato']==$plato['id_plato']) 
						{
							$repetido='si';
						}
					}

					if ($repetido=='si') 
					{
						$primeros_platos_repetidos[$i1]=$plato;
						$i1=$i1+1;
					}
					else
					{
						$primeros_platos[$j1]=$plato;
						$j1=$j1+1;
					}
					
					
				}

			//se comprueba si el plato actual en la variable que recorre el array es de tipo Segundo plato
				elseif ($plato['tipo']=='Segundo plato') 
				{

					foreach ($menu_anterior as $menu) 
					{
						if ($menu['segundo_plato']==$plato['id_plato']) 
						{
							$repetido='si';
						}
					}

					if ($repetido=='si') 
					{
						$segundos_platos_repetidos[$i2]=$plato;
						$i2=$i2+1;
					}
					else
					{
						$segundos_platos[$j2]=$plato;
						$j2=$j2+1;
					}
					
					
				}

				//se comprueba si el plato actual en la variable que recorre el array es de tipo tercer plato
				elseif ($plato['tipo']=='Tercer plato') 
				{

					foreach ($menu_anterior as $menu) 
					{
						if ($menu['tercer_plato']==$plato['id_plato']) 
						{
							$repetido='si';
						}
					}

					if ($repetido=='si') 
					{
						$terceros_platos_repetidos[$i3]=$plato;
						$i3=$i3+1;
					}
					else
					{
						$terceros_platos[$j3]=$plato;
						$j3=$j3+1;
					}
					
					
				}

				//se comprueba si el plato actual en la variable que recorre el array es de tipo ENSALADA
				elseif ($plato['tipo']=='Ensalada') 
				{

					foreach ($menu_anterior as $menu) 
					{
						if ($menu['ensalada']==$plato['id_plato']) 
						{
							$repetido='si';
						}
					}

					if ($repetido=='si') 
					{
						$ensaladas_repetidas[$i4]=$plato;
						$i4=$i4+1;
					}
					else
					{
						$ensaladas[$j3]=$plato;
						$j3=$j3+1;
					}
					
					
				}


			}
			
			//se comprueba si hay PRIMEROS PLATOS NO REPETIDOS disponibles y se elige uno de lo contrario se elige uno repetido
			if (!empty($primeros_platos)) 
			{
				$primer_plato=$primeros_platos[array_rand($primeros_platos)];			
			}
			else{
				$primer_plato=$primeros_platos_repetidos[array_rand($primeros_platos_repetidos)];
			}

			//se comprueba si hay SEGUNDOS PLATOS NO REPETIDOS disponibles y se elige uno de lo contrario se elige uno repetido
			if (!empty($segundos_platos)) 
			{
				$segundo_plato=$segundos_platos[array_rand($segundos_platos)];			
			}
			else{
				$segundo_plato=$segundos_platos_repetidos[array_rand($segundos_platos_repetidos)];
			}

			//se comprueba si hay TERCEROS PLATOS NO REPETIDOS disponibles y se elige uno de lo contrario se elige uno repetido
			if (!empty($terceros_platos)) 
			{
				$tercer_plato=$terceros_platos[array_rand($terceros_platos)];			
			}
			else{
				$tercer_plato=$terceros_platos_repetidos[array_rand($terceros_platos_repetidos)];
			}

			//se comprueba si hay ENSALADAS NO REPETIDAS disponibles y se eliege una de lo contrario se elige una repetido
			if (!empty($ensaladas)) 
			{
				$ensalada=$ensaladas[array_rand($ensaladas)];			
			}
			else{
				$ensalada=$ensaladas_repetidos[array_rand($ensaladas_repetidos)];
			}

			
		
		}
	}
$RESULTADO='GENERADO';
}
else{
	$RESULTADO='INVENTARIO';
}

?>
