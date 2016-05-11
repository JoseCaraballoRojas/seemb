<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase conexion.
include_once('../../modelos/Categoria.php');

      $listar_categorias= new Categoria();
      $retorno=$listar_categorias->leer();
      echo "<section>
            <span class='text-center'><h2>Categorias Registradas</h2>
            <a href='vista_crear_categoria.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped' class='display' id='tablas'>
          <thead >
            <tr>
              <th class='text-center'>Categoria</th>
              <th class='text-center'>Detalle</th>
              <th class='text-center'>Acciones</th>
            </tr>
          </thead>
          <tfoot >
            <tr>
              <th class='text-center'>Categoria</th>
              <th class='text-center'>Detalle</th>
              <th class='text-center'>Acciones</th>
            </tr>
          </tfoot>
          <tbody>";
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay categorias registradas.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td>
                              ".$datos['categoria']."
                          </td>
                          <td class='text-center'>
                              ".$datos['detalle']."
                          </td>
                          <td class='text-center'> 
                              
                              <a href='vista_editar_categoria.php?id_categoria=".$datos['id_categoria']."' class='btn btn-primary btn-sm '>
                              <span class='glyphicon glyphicon-pencil'> Editar</span>
                              </a>
                              <a href='#' onClick='confirmar(".$datos['id_categoria'].")' class='btn btn-danger btn-sm' onclick='return confirmar('¿Está seguro que desea eliminar el registro?')'>
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
