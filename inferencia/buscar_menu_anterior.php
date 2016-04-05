<?php 
//se incluye la clase MENU.
include_once('../../modelos/Menu.php');


      $menu_anterior= new Menu();
      $retorno=$menu_anterior->Menu_anterior();
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay un menu anterior.
               </div>";
        }
      else{
              $html= '<option >Seleccione... </option>';
              foreach($retorno as $datos){
                    $html.= '<option value='.$datos['id_categoria'].'> '.$datos['categoria'].'</option>';
                  }
             
          echo $html;
          }
        
?>