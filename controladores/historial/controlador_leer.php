<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase Nutriente.
include_once('../../modelos/Historial.php');


      $listar_historial= new Historial();
      $retorno=$listar_historial->Listar();
           
      if (empty($retorno)){
          echo "<div class='alert alert-danger'>
                 <strong>Informacion</strong> No hay historial registrado en el sistema.
               </div>";
               echo "<section>
            <span class='text-center'><h3>Historial de los usuarios en el sistema</h3>
            
            </section>";
        }
      else{
            echo "<section>
            <span class='text-center'><h3>Historial de los usuarios</h3>
            <a href='inicio.php' class='btn btn-primary btn-sm '>
              <span class='fa fa-reply'> Atras </span>
            </a>
            </section>";
             echo "
                  <table class='table table-bordered  table-hover table-condensed table-striped' class='display' id='tablas'>
                    <thead >
                      <tr>
                        <th class='text-center'>Usuario</th>
                        <th class='text-center'>Accion</th>
                        <th class='text-center'>Fecha</th>
                        <th class='text-center'>Hora</th>
                      </tr>
                    </thead>
                    <tfoot >
                      <tr>
                        <th class='text-center'>Usuario</th>
                        <th class='text-center'>Accion</th>
                        <th class='text-center'>Fecha</th>
                        <th class='text-center'>Hora</th>
                      </tr>
                    </tfoot>
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
