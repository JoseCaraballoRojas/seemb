<?php 
//se incluye la clase Unidad.
include_once('../../modelos/Unidad.php');

      $listar_unidades= new Unidad();
      $retorno=$listar_unidades->leer();
      
      
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Unidades Registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){

              		$html.= '<option value='.$datos['id_unidad'].' > '.$datos['unidad'].'</option>';
 
        
              }
          echo $html;
          }
        
?>
