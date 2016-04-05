<?php 
//se incluye la clase Unidad.
include_once('../../modelos/Tipo.php');

      $listar_tipos= new Tipo();
      $retorno=$listar_tipos->leer();
      
      
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay tipos registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){

              		$html.= '<option value='.$datos['id_tipo'].' > '.$datos['tipo'].'</option>';
 
        
              }
          echo $html;
          }
        
?>
