<?php 
//se incluye la clase Categoria.
include_once('../../modelos/Categoria.php');

      $listar_categorias= new Categoria();
      $retorno=$listar_categorias->leer();
      
      
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay categorias Registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){

              		$html.= '<option value='.$datos['id_categoria'].' > '.$datos['categoria'].'</option>';
 
        
              }
          echo $html;
          }
        
?>
