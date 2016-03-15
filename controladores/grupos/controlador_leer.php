<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase conexion.
include_once('../../modelos/grupos.php');

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
      $listar_grupos= new Grupos();
      $retorno=$listar_grupos->leer();
      echo "<section>
            <span class='text-center'><h2>Grupos Alimenticios Registrados</h2>
            <a href='agregar.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped'>
          <thead >
            <tr>
              <th class='text-center'>ID</th>
              <th class='text-center'>GRUPO</th>
              <th class='text-center'>PRIORIDAD</th>
              <th class='text-center'>ACCIONES</th>
            </tr>
          </thead>
          <tbody>";
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Grupos Registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td class='text-center'>
                              ".$datos['id_grupo']."
                          </td>
                          <td>
                              ".$datos['grupo']."
                          </td>
                          <td class='text-center'>
                              ".$datos['prioridad']."
                          </td>
                          <td class='text-center'> 
                              
                              <a href='editar.php?id_grupo=".$datos['id_grupo']."' class='btn btn-primary btn-sm '>
                              <span class='glyphicon glyphicon-pencil'> Editar</span>
                              </a>
                              <a href='../../controladores/grupos/controlador_borrar.php?id_grupo=".$datos['id_grupo']."' class='btn btn-danger btn-sm'>
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
