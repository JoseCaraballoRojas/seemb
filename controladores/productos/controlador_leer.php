<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase conexion.
include_once('../../modelos/Producto.php');


      $listar_productos= new Producto();
      $retorno=$listar_productos->Leer();
      echo "<section>
            <span class='text-center'><h2>Productos registrados</h2>
            <a href='vista_crear_producto.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped' class='display' id='tablas'>
          <thead >
            <tr>
              <th class='text-center'>Producto</th>
              <th class='text-center'>Presentación</th>
              <th class='text-center'>Categoría</th>
              <th class='text-center'>Acciones</th>
            </tr>
          </thead>
          <tfoot >
            <tr>
              <th class='text-center'>Producto</th>
              <th class='text-center'>Presentación</th>
              <th class='text-center'>Categoría</th>
              <th class='text-center'>Acciones</th>
            </tr>
          </tfoot>
          <tbody>";
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay productos registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td >
                              ".$datos['producto']."
                          </td>
                          <td class='text-center'>
                              ".$datos['presentacion']."
                          </td>
                          <td class='text-center'>
                              ".$datos['categoria']."
                          </td>
                          <td class='text-center'> 
                              
                              <a href='vista_editar_producto.php?id_producto=".$datos['id_producto']."' class='btn btn-primary btn-sm '>
                              <span class='glyphicon glyphicon-pencil'> Editar</span>
                              </a>
                              <a href='../controladores/productos/controlador_borrar.php?id_producto=".$datos['id_producto']."' class='btn btn-danger btn-sm'>
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
