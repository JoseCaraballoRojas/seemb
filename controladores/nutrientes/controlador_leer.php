<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase Nutriente.
include_once('../../modelos/Nutriente.php');


      $listar_nutrientes= new Nutriente();
      $retorno=$listar_nutrientes->leer();
      echo "<section>
            <span class='text-center'><h2>Nutrientes Registrados</h2>
            <a href='vista_crear.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped'>
          <thead >
            <tr>
              <th class='text-center'>ID</th>
              <th class='text-center'>NUTRIENTE</th>
              <th class='text-center'>UNIDAD DE MEDIDA</th>
              <th class='text-center'>ACCIONES</th>
            </tr>
          </thead>
          <tbody>";
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Nutrientes Registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td class='text-center'>
                              ".$datos['id_nutriente']."
                          </td>
                          <td>
                              ".$datos['nutriente']."
                          </td>
                          <td class='text-center'>
                              ".$datos['unidad']."
                          </td>
                          <td class='text-center'> 
                              
                              <a href='vista_editar.php?id_nutriente=".$datos['id_nutriente']."' class='btn btn-primary btn-sm '>
                              <span class='glyphicon glyphicon-pencil'> Editar</span>
                              </a>
                              <a href='../../controladores/nutrientes/controlador_borrar.php?id_nutriente=".$datos['id_nutriente']."' class='btn btn-danger btn-sm'>
                              <span class='glyphicon glyphicon-trash'> Borrar</span>
                              </a>

                          </td>
                      </tr>";
        
              }
          }
      echo "
          </tbody>
        </table> ";
        
?>
