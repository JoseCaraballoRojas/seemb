<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase conexion.
include_once('../../modelos/Producto.php');

// se verifica que se llamo a este controlador a traves de la vista correspondiente.
/*if(isset($_POST['iniciarsesion']) && ($_POST['iniciarsesion']=="iniciar") )
{
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];

    if($usuario=='' || $password=='' )
    {
      
      ?>
            <script type="text/javascript">
                alert("debe ingresar un usuario y su contraseña");
                window.location='../vistas/index.php';
            </script>

          <?php
    }*/ //HABILITAR DESPUES POR SEGURIDAD.
    
   // else
    //{
      $listar_productos= new Producto();
      $retorno=$listar_productos->Leer();
      echo "<section>
            <span class='text-center'><h2>Productos Registrados</h2>
            <a href='vista_crear_producto.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped'>
          <thead >
            <tr>
              <th class='text-center'>ID</th>
              <th class='text-center'>PRODUCTO</th>
              <th class='text-center'>PRESENTACION</th>
              <th class='text-center'>VENCIMIENTO</th>
              <th class='text-center'>CATEGORIA</th>
              <th class='text-center'>ACCIONES</th>
            </tr>
          </thead>
          <tbody>";
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay productos Registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td class='text-center'>
                              ".$datos['id_producto']."
                          </td>
                          <td>
                              ".$datos['producto']."
                          </td>
                          <td class='text-center'>
                              ".$datos['presentacion']."
                          </td>
                          <td class='text-center'>
                              ".$datos['fecha_vencimiento']."
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
        
        //}            
    //}      
//}
?>
