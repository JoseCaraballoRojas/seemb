<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase conexion.
include_once('../../modelos/Plato.php');

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
      $listar_platos= new Plato();
      $retorno=$listar_platos->Leer();
      echo "<section>
            <span class='text-center'><h2>Platos Registrados</h2>
            <a href='vista_crear_plato.php' class='btn btn-success pull-right'>
                <span class='glyphicon glyphicon-plus-sign'> Crear</span>
            </a>
            </section>";
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped'>
          <thead >
            <tr>
              <th class='text-center'>PLATO</th>
              <th class='text-center'>DESCRIPCION</th>
              <th class='text-center'>PORCION</th>
              <th class='text-center'>TIPO</th>
              <th class='text-center'>CALORIAS</th>
              <th class='text-center'>CARBOHIDRATOS</th>
              <th class='text-center'>PROTEINAS</th>
              <th class='text-center'>GRASAS</th>
              <th class='text-center'>AZUCARES</th>
              <th class='text-center'>SAL</th>
              <th class='text-center'>ACCIONES</th>
            </tr>
          </thead>
          <tbody>";
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Platos Registrados.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td class='text-center'>
                              ".$datos['plato']."
                          </td>
                          <td>
                              ".$datos['descripcion']."
                          </td>
                          <td class='text-center'>
                              ".$datos['porcion']." ".$datos['unidad']. "
                          </td>
                          <td class='text-center'>
                              ".$datos['tipo']."
                          </td>
                          <td class='text-center'>
                              ".$datos['calorias']."
                          </td>
                          <td class='text-center'>
                              ".$datos['carbohidratos']."
                          </td>
                          <td class='text-center'>
                              ".$datos['grasas']."
                          </td>
                          <td class='text-center'>
                              ".$datos['proteinas']."
                          </td>
                          <td class='text-center'>
                              ".$datos['azucares']."
                          </td>
                          <td class='text-center'>
                              ".$datos['sal']."
                          </td>
                          <td class='text-center'> 
                              <a href='vista_detalle_plato.php?id_plato=".$datos['id_plato']."' class='btn btn-warning btn-sm '>
                              <span class='glyphicon glyphicon-search'> Detalle</span>
                              </a>
                              <a href='vista_editar_plato.php?id_plato=".$datos['id_plato']."' class='btn btn-primary btn-sm '>
                              <span class='glyphicon glyphicon-pencil'> Editar</span>
                              </a>
                              <a href='../controladores/platos/controlador_borrar.php?id_plato=".$datos['id_plato']."' class='btn btn-danger btn-sm'>
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
