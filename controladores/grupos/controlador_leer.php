<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase conexion.
include_once('../../modelos/Grupo.php');

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
      $listar_grupos= new Grupo();
      $retorno=$listar_grupos->Leer();
      echo "<section>
            <span class='text-center'><h3>Grupos alimenticios registrados</h3>
            <a href='vista_crear_grupo.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped' class='display' id='tablas'>
          <thead >
            <tr>
              <th class='text-center'>Grupo</th>
              <th class='text-center'>prioridad</th>
              <th class='text-center'>Acciones</th>
            </tr>
          </thead>
          <tbody>";
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay grupos registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td>
                              ".$datos['grupo']."
                          </td>
                          <td class='text-center'>
                              ".$datos['prioridad']."
                          </td>
                          <td class='text-center'> 
                              
                              <a href='vista_editar_grupo.php?id_grupo=".$datos['id_grupo']."' class='btn btn-primary btn-sm '>
                              <span class='glyphicon glyphicon-pencil'> Editar</span>
                              </a>
                              <a href='../controladores/grupos/controlador_borrar.php?id_grupo=".$datos['id_grupo']."' class='btn btn-danger btn-sm'>
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
