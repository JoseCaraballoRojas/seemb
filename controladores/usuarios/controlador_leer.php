<?php 
/* Controlador para buscar y listar los usuarios registrados en el sistema */
mysqli_report(0);
//se incluye la clase conexion.
include_once('../../modelos/Usuario.php');

      $listar_usuarios= new Usuario();
      $retorno=$listar_usuarios->Leer();
      echo "<section>
            <span class='text-center'><h2>Usuarios Registrados</h2>
            <a href='vista_crear_usuario.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped'>
          <thead >
            <tr>
              <th class='text-center'>USUARIO</th>
              <th class='text-center'>TIPO</th>
              <th class='text-center'>ESTATUS</th>
              <th class='text-center'>ACCIONES</th>
            </tr>
          </thead>
          <tbody>";
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Usuarios Registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){
                $act="";
                $des="";
                if ($datos['estatus']=='INACTIVO') {
                  $act='disabled';
                }
                elseif ($datos['estatus']=='ACTIVO') {
                  $des='disabled';
                }
                echo "<tr> 
                          <td class='text-center'>
                              ".$datos['usuario']."
                          </td>
                          <td class='text-center'>
                              ".$datos['tipo']."
                          </td>
                          <td class='text-center'>
                              ".$datos['estatus']."
                          </td>
                          <td class='text-center'> 
                              
                              <a href='vista_editar_usuario.php?id_usuario=".$datos['id_usuario']."' class='btn btn-primary btn-sm '>
                              <span class='glyphicon glyphicon-pencil'> Editar</span>
                              </a>
                              <a href='../controladores/usuarios/controlador_desactivar.php?id_usuario=".$datos['id_usuario']."' class='btn btn-danger btn-sm ".$act."'>
                              <span class='glyphicon glyphicon-trash'> Desactivar</span>
                              </a>
                              <a href='../controladores/usuarios/controlador_activar.php?id_usuario=".$datos['id_usuario']."' class='btn btn-success btn-sm ".$des."'>
                              <span class='glyphicon glyphicon-trash'> Activar</span>
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
