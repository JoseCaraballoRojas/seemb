<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase conexion.
include_once('../../modelos/Plato.php');
      $id_plato=$_POST['id_recibido'];
      $detalle_plato= new Plato();
      $plato=$detalle_plato->Buscar($id_plato);
      $retorno=$detalle_plato->Detalle_plato($id_plato);
      $detalle=$detalle_plato->Leer_plato($id_plato);
      
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped'>
          <thead >
            <tr class='btn-danger'>
            <th colspan='6' class='text-center'><h2> <b>Detalles del Plato</h2></th>
            </tr>
            <tr class='btn-primary'>
              <th colspan='1' class='text-center'>PLATO</th>
              <th class='text-center' colspan='4'>DESCRIPCION</th>
              <th class='text-center' colspan='1'>PORCION</th>
            </tr>";
            foreach($detalle as $datos){
      
                echo "<tr> 
                          <td class='text-center' colspan='1'>
                              ".$datos['plato']."
                          </td>
                          <td class='text-center' colspan='4'>
                              ".$datos['descripcion']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$datos['porcion']." ".$datos['unidad']. "
                          </td>
                      </tr>";
        
              }
      echo " 
            <tr class='btn-success'>
              <th colspan='3' class='text-center'>INGREDIENTES</th>
              <th class='text-center' colspan='3'>CANIDAD</th>
            </tr>
          </thead>
          <tbody>";
      if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Ingredientes registrados para este plato.
               </div>";
        }
      else{
            
              foreach($retorno as $datos){
      
                echo "<tr> 
                          <td class='text-center' colspan='3'>
                              ".$datos['producto']."
                          </td>
                          <td class='text-center' colspan='3'>
                              ".$datos['cantidad']." ".$datos['unidad']. "
                          </td>
                      </tr>";
        
              }
            }
   echo "
          <tr class='btn-info'>
              <th colspan='6' class='text-center' > INFORMACION NUTRICIONAL </th>
          </tr>
          <tr>
            <th class='text-center'>ENERGIA (Kcal)</th>
            <th class='text-center'>CARBOHIDRATOS (g)</th>
            <th class='text-center'>PROTEINAS (g)</th>
            <th class='text-center'>GRASAS (g)</th>
            <th class='text-center'>AZUCARES (g)</th>
            <th class='text-center'>SAL (g)</th>
          </tr>";
  
foreach($plato as $datos){
  echo "    
          <tr>
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
          </tr>
            ";
          }

      echo "
          <tr>
              <td class='text-center' colspan='6'>               
                <a href='vista_listar_platos.php' class='btn btn-primary btn-block '>
                <span class='fa fa-reply'> Regresar</span>
                </a>
              </td>
          </tr>
          </tbody>
        </table> ";
        
?>
