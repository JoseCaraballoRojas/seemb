<?php 
//se incluye la clase Producto.
include_once('../../modelos/Grupo.php');

      $listar_grupos= new Grupo();
      $retorno=$listar_grupos->Leer();
      
      
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay grupos Registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){

              		$html.= '<option value='.$datos['id_grupo'].' > '.$datos['grupo'].'</option>';
 
        
              }
          echo $html;
          }
        
?>
