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
      echo "<section><b>Grupos Alimenticios Registrados</b></section>";
      echo "
        <table class='table table-bordered'>
          <thead>
            <tr>
              <th>ID</th>
              <th>GRUPO</th>
              <th>PRIORIDAD</th>
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
                          <td >
                              ".$datos['id_grupo']."
                          </td>
                          <td>
                              ".$datos['grupo']."
                          </td>
                          <td>
                              ".$datos['prioridad']."
                          </td></tr>";
        
              }
          }
      echo "
          </tbody>
        </table> ";
        
        //}            
    //}      
//}
?>
