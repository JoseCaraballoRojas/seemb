<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase conexion.
include_once('../../modelos/Plato.php');

      $listar_platos= new Plato();
      $retorno=$listar_platos->Leer();
      echo "<section>
            <span class='text-center'><h3>Platos registrados</h3>
            <a href='vista_crear_plato.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped' class='display' id='tablas'>
          <thead >
            <tr>
              <th class='text-center'>Plato</th>
              <th class='text-center'>Porción</th>
              <th class='text-center'>Tipo</th>
              <th class='text-center'>Energía (Kcal) </th>
              <th class='text-center'>Carbohidratos (g)</th>
              <th class='text-center'>Proteínas (g)</th>
              <th class='text-center'>Grasas (g)</th>
              <th class='text-center'>Acciones</th>
            </tr>
          </thead>
          <tfoot >
            <tr>
              <th class='text-center'>Plato</th>
              <th class='text-center'>Porción</th>
              <th class='text-center'>Tipo</th>
              <th class='text-center'>Energía (Kcal) </th>
              <th class='text-center'>Carbohidratos (g)</th>
              <th class='text-center'>Proteínas (g)</th>
              <th class='text-center'>Grasas (g)</th>
              <th class='text-center'>Acciones</th>
            </tr>
          </tfoot>
          <tbody>";
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Platos Registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td >
                              ".$datos['plato']."
                          </td>
                          <td class='text-center'>
                              ".$datos['porcion']." ".$datos['unidad']. "
                          </td>
                          <td class='text-center'>
                              ".$datos['tipo']."
                          </td>
                          <td class='text-center'>
                              ".$datos['calorias']."
                          </td>
                          <td class='text-center'>
                              ".$datos['carbohidratos']."
                          </td>
                          <td class='text-center'>
                              ".$datos['grasas']."
                          </td>
                          <td class='text-center'>
                              ".$datos['proteinas']."
                          </td>
                          
                          <td class='text-center'> 
                              <a href='vista_detalle_plato.php?id_plato=".$datos['id_plato']."' class='btn btn-warning btn-sm '>
                              <span class='glyphicon glyphicon-search'> Detalle</span>
                              </a>
                              <a href='vista_editar_plato.php?id_plato=".$datos['id_plato']."' class='btn btn-primary btn-sm '>
                              <span class='glyphicon glyphicon-pencil'> Editar</span>
                              </a>
                              <a href='../controladores/platos/controlador_borrar.php?id_plato=".$datos['id_plato']."' class='btn btn-danger btn-sm'>
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
