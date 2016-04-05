<?php 
//se incluye la clase Producto.
include_once('../../modelos/Producto.php');

      $listar_productos= new Producto();
      $retorno=$listar_productos->Leer();
      
      
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay productos Registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){

              		$html.= '<option value='.$datos['id_producto'].' > '.$datos['producto'].'</option>';
 
        
              }
          echo $html;
          }
        
?>
