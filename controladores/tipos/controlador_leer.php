<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase Nutriente.
include_once('../../modelos/Tipo.php');


      $listar_tipos= new Tipo();
      $retorno=$listar_tipos->leer();
           
      if (empty($retorno)){
          echo "<div class='alert alert-danger'>
                 <strong>Informacion</strong> No hay Tipos de Platos Registrados.
               </div>";
               echo "<section>
            <span class='text-center'><h2>Tipos de Platos Registrados</h2>
            <a href='vista_crear_tipo.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
        }
      else{
            echo "<section>
            <span class='text-center'><h2>Tipos de Platos Registrados</h2>
            <a href='vista_crear_tipo.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
             echo "
                  <table class='table table-bordered  table-hover table-condensed table-striped'>
                    <thead >
                      <tr>
                        <th class='text-center'>ID</th>
                        <th class='text-center'>TIPO</th>
                       
                        <th class='text-center'>ACCIONES</th>
                      </tr>
                    </thead>
                    <tbody>";
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td class='text-center'>
                              ".$datos['id_tipo']."
                          </td>
                          <td>
                              ".$datos['tipo']."
                          </td>
                          
                          <td class='text-center'> 
                              
                              <a href='vista_editar_tipo.php?id_tipo=".$datos['id_tipo']."' class='btn btn-primary btn-sm '>
                              <span class='glyphicon glyphicon-pencil'> Editar</span>
                              </a>
                              <a href='../controladores/tipos/controlador_borrar.php?id_tipo=".$datos['id_tipo']."' class='btn btn-danger btn-sm'>
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
