<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase conexion.
include_once('../../modelos/Inventario.php');

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
      $listar_inventarios= new Inventario();
      $retorno=$listar_inventarios->Leer();
      echo "<section>
            <span class='text-center'><h2>Inventario Disponible</h2>
            <a href='vista_crear_inventario.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped'>
          <thead >
            <tr>
              <th class='text-center'>PRODUCTO</th>
              <th class='text-center'>CANTIDAD</th>
              <th class='text-center'>ENTRADA</th>
              <th class='text-center'>NIVEL OPTIMO</th>
              <th class='text-center'>ACCIONES</th>
            </tr>
          </thead>
          <tbody>";
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay productos almacenados en inventario.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td class='text-center'>
                              ".$datos['producto']."
                          </td>
                          <td class='text-center'>
                              ".$datos['cantidad']." ".$datos['unidad']."
                          </td>
                          <td class='text-center'>
                              ".$datos['fecha_entrada']."
                          </td>
                          <td class='text-center'>
                              ".$datos['nivel_optimo']."
                          </td>
                          <td class='text-center'> 
                              
                              <a href='vista_editar_inventario.php?id_inventario=".$datos['id_inventario']."' class='btn btn-primary btn-sm '>
                              <span class='glyphicon glyphicon-pencil'> Editar</span>
                              </a>
                              <a href='../controladores/inventarios/controlador_borrar.php?id_inventario=".$datos['id_inventario']."' class='btn btn-danger btn-sm'>
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
