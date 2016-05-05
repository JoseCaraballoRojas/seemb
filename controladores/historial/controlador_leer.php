<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase Nutriente.
include_once('../../modelos/Historial.php');


      $listar_historial= new Historial();
      $retorno=$listar_historial->Listar();
           
      if (empty($retorno)){
          echo "<div class='alert alert-danger'>
                 <strong>Informacion</strong> No hay Historial Registrado en el Sistema.
               </div>";
               echo "<section>
            <span class='text-center'><h2>Historial de los Usuarios en el Sistema</h2>
            
            </section>";
        }
      else{
            echo "<section>
            <span class='text-center'><h2>Historial de los Usuarios en el Sistema</h2>
            <a href='inicio.php' class='btn btn-primary btn-sm '>
              <span class='glyphicon glyphicon-pencil'> Atras </span>
            </a>
            </section>";
             echo "
                  <table class='table table-bordered  table-hover table-condensed table-striped'>
                    <thead >
                      <tr>
                        <th class='text-center'>USUARIO</th>
                        <th class='text-center'>ACCION</th>
                        <th class='text-center'>FECHA</th>
                        <th class='text-center'>HORA</th>
                      </tr>
                    </thead>
                    <tbody>";
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td class='text-center'>
                              ".$datos['usuario']."
                          </td>
                          <td class='text-center'>
                              ".$datos['accion']."
                          </td>
                          <td class='text-center'>
                              ".$datos['fecha']."
                          </td>
                          <td class='text-center'>
                              ".$datos['hora']."
                          </td>
                      </tr>";
        
              }
          }
      echo "
          </tbody>
        </table> ";
        
?>
