<?php 
//SE RECIBEN LOS PARAMETROS
$cantidad_especial=$_POST['cantidad'];
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
	
$cantidad_platos=$cantidad_especial;
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
			
$RESULTADO='MENU';
}
else{
	$RESULTADO='INVENTARIO';
}	

if ($RESULTADO=='INVENTARIO') {
    echo "<div class='alert alert-info'>
                 <strong>Información</strong> No hay productos suficientes en el inventario para generar un menú.
               </div>";
  }
  else{
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped'>
          <thead >
            <tr class='btn-danger '>
            <th colspan='7' class='text-center'><h3> <b>Menú especial</h3></th>
            </tr>
            <tr class='btn-primary'>
            <th class='text-center ' >PLATOS</th>
              <th colspan='1' class='text-center'>NOMBRE DEL PLATO</th>
              <th class='text-center' colspan='4'>DESCRIPCION</th>
              <th class='text-center' colspan='1'>PORCION</th>
            </tr>";
           
      
                echo "<tr> 
                          <td class='danger' colspan='1'><b>
                              ".$primer_plato_almuerzo['tipo']."
                          </td>
                          <td class='text-center'  colspan='1'>
                              ".$primer_plato_almuerzo['plato']."
                          </td>
                          <td class='text-center' colspan='4'>
                              ".$primer_plato_almuerzo['descripcion']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$primer_plato_almuerzo['porcion']." ".$primer_plato_almuerzo['unidad']. "
                          </td>
                      </tr>";
              echo "<tr> 
                          <td class=' danger' colspan='1'><b>
                              ".$segundo_plato_almuerzo['tipo']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$segundo_plato_almuerzo['plato']."
                          </td>
                          <td class='text-center' colspan='4'>
                              ".$segundo_plato_almuerzo['descripcion']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$segundo_plato_almuerzo['porcion']." ".$segundo_plato_almuerzo['unidad']. "
                          </td>
                      </tr>";
              echo "<tr> 
                          <td class=' danger' colspan='1'><b>
                              ".$tercer_plato_almuerzo['tipo']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$tercer_plato_almuerzo['plato']."
                          </td>
                          <td class='text-center' colspan='4'>
                              ".$tercer_plato_almuerzo['descripcion']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$tercer_plato_almuerzo['porcion']." ".$tercer_plato_almuerzo['unidad']. "
                          </td>
                      </tr>";
              echo "<tr> 
                          <td class='danger' colspan='1'><b>
                              ".$ensalada_almuerzo['tipo']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$ensalada_almuerzo['plato']."
                          </td>
                          <td class='text-center' colspan='4'>
                              ".$ensalada_almuerzo['descripcion']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$ensalada_almuerzo['porcion']." ".$ensalada_almuerzo['unidad']. "
                          </td>
                      </tr>";
              echo "<tr> 
                          <td class='danger' colspan='1'>
                             <b> POSTRE
                          </td>
                          <td class='text-center' colspan='1'>
                              FRUTA FRESCA 
                          </td>
                          <td class='text-center' colspan='4'>
                              FRUTA DEL DIA (Naranja, Cambur, Durazno...)
                          </td>
                          <td class='text-center' colspan='1'>
                              1 UNIDAD
                          </td>
                      </tr>";
                 echo "<tr> 
                          <td class='danger' colspan='1'>
                             <b> BEBIDA
                          </td>
                          <td class='text-center' colspan='1'>
                              JUGO DE FRUTAS
                          </td>
                          <td class='text-center' colspan='4'>
                              JUGO DE FRUTAS 
                          </td>
                          <td class='text-center' colspan='1'>
                              100 ml
                          </td>
                      </tr>";
              
              
      
      /*if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Platos registrados para este menu.
               </div>";
        }*/
      
   echo "
          <tr class='btn-info'>
              <th colspan='7' class='text-center' > INFORMACION NUTRICIONAL </th>
          </tr>
          <tr>
            <th class='info'>NUTRIENTES:</th>
            <th class='text-center'>ENERGIA (Kcal)</th>
            <th class='text-center'>CARBOHIDRATOS (g)</th>
            <th class='text-center'>PROTEINAS (g)</th>
            <th class='text-center'>GRASAS (g)</th>
            <th class='text-center'>AZUCARES (g)</th>
            <th class='text-center'>SAL (g)</th>
          </tr>";
  

  echo "    
          <tr>
              <td class='info'> <b>VALORES: </td>
              <td class='text-center'>
                  ".$calorias_totales."
              </td>
              <td class='text-center'>
                  ".$carbohidratos_totales."
              </td>
              <td class='text-center'>
                  ".$proteinas_totales."
              </td>
              <td class='text-center'>
                  ".$grasas_totales."
              </td>
              <td class='text-center'>
                  ".$azucares_totales."
              </td>
              <td class='text-center'>
                  ".$sal_totales."
              </td>
          </tr>
            ";

      echo "
          <tr>
              <td class='text-center' colspan='2'>               
                <a href='vista_memu_especial.php' class='btn btn-info btn-block '>
                <span class='fa fa-reply fa-lg'> Regresar</span>
                </a>
              </td>
              <td class='text-center' colspan='2'>               
                <a href='vista_genera_menu_especial.php' class='btn btn-primary btn-block '>
                <span class='fa fa-refresh fa-lg' aria-hidden='true'> Generar Menu</span>
                </a>
              </td>
              <td class='text-center' colspan='3'>               
                <a href='vista_menu.php' class='btn btn-success btn-block '>
                <span class='fa fa-floppy-o fa-lg' aria-hidden='true'> Guardar Menu</span>
                </a>
              </td>
          </tr>
          </tbody>
        </table> ";
}     


?>
