<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase conexion.
include_once('prueba_reglas.php');
  
  if ($RESULTADO=='INVENTARIO') {
    echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Platos registrados para este menu.
               </div>";
  }
  else{
      echo "
        <table class='table table-bordered  table-hover table-condensed table-striped'>
          <thead >
            <tr class='btn-danger '>
            <th colspan='7' class='text-center'><h3> <b>Menu del Dia</h3></th>
            </tr>
            <tr class='btn-primary'>
            <th class='text-center ' >PLATOS</th>
              <th colspan='1' class='text-center'>NOMBRE DEL PLATO</th>
              <th class='text-center' colspan='4'>DESCRIPCION</th>
              <th class='text-center' colspan='1'>PORCION</th>
            </tr>";
           
      
                echo "<tr> 
                          <td class='danger' colspan='1'><b>
                              ".$primer_plato['tipo']."
                          </td>
                          <td class='text-center'  colspan='1'>
                              ".$primer_plato['plato']."
                          </td>
                          <td class='text-center' colspan='4'>
                              ".$primer_plato['descripcion']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$primer_plato['porcion']." ".$primer_plato['unidad']. "
                          </td>
                      </tr>";
              echo "<tr> 
                          <td class=' danger' colspan='1'><b>
                              ".$segundo_plato['tipo']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$segundo_plato['plato']."
                          </td>
                          <td class='text-center' colspan='4'>
                              ".$segundo_plato['descripcion']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$segundo_plato['porcion']." ".$segundo_plato['unidad']. "
                          </td>
                      </tr>";
              echo "<tr> 
                          <td class=' danger' colspan='1'><b>
                              ".$tercer_plato['tipo']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$tercer_plato['plato']."
                          </td>
                          <td class='text-center' colspan='4'>
                              ".$tercer_plato['descripcion']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$tercer_plato['porcion']." ".$tercer_plato['unidad']. "
                          </td>
                      </tr>";
              echo "<tr> 
                          <td class='danger' colspan='1'><b>
                              ".$ensalada['tipo']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$ensalada['plato']."
                          </td>
                          <td class='text-center' colspan='4'>
                              ".$ensalada['descripcion']."
                          </td>
                          <td class='text-center' colspan='1'>
                              ".$ensalada['porcion']." ".$ensalada['unidad']. "
                          </td>
                      </tr>";
              echo "<tr> 
                          <td class='danger' colspan='1'>
                             <b> POSTRE
                          </td>
                          <td class='text-center' colspan='1'>
                              FRUTA FRESCA 
                          </td>
                          <td class='text-center' colspan='4'>
                              FRUTA DEL DIA (Naranja, Cambur, Durazno...)
                          </td>
                          <td class='text-center' colspan='1'>
                              1 UNIDAD
                          </td>
                      </tr>";
                 echo "<tr> 
                          <td class='danger' colspan='1'>
                             <b> BEBIDA
                          </td>
                          <td class='text-center' colspan='1'>
                              JUGO DE FRUTAS
                          </td>
                          <td class='text-center' colspan='4'>
                              JUGO DE FRUTAS 
                          </td>
                          <td class='text-center' colspan='1'>
                              100 ml
                          </td>
                      </tr>";
              
              
      
      /*if (empty($retorno)){
          echo "<div class='alert alert-info'>
                 <strong>Informacion</strong> No hay Platos registrados para este menu.
               </div>";
        }*/
      
   echo "
          <tr class='btn-info'>
              <th colspan='7' class='text-center' > INFORMACION NUTRICIONAL </th>
          </tr>
          <tr>
            <th class='info'>NUTRIENTES:</th>
            <th class='text-center'>ENERGIA (Kcal)</th>
            <th class='text-center'>CARBOHIDRATOS (g)</th>
            <th class='text-center'>PROTEINAS (g)</th>
            <th class='text-center'>GRASAS (g)</th>
            <th class='text-center'>AZUCARES (g)</th>
            <th class='text-center'>SAL (g)</th>
          </tr>";
  

  echo "    
          <tr>
              <td class='info'> <b>VALORES: </td>
              <td class='text-center'>
                  ".$calorias_totales."
              </td>
              <td class='text-center'>
                  ".$carbohidratos_totales."
              </td>
              <td class='text-center'>
                  ".$proteinas_totales."
              </td>
              <td class='text-center'>
                  ".$grasas_totales."
              </td>
              <td class='text-center'>
                  ".$azucares_totales."
              </td>
              <td class='text-center'>
                  ".$sal_totales."
              </td>
          </tr>
            ";

      echo "
          <tr>
              <td class='text-center' colspan='2'>               
                <a href='inicio.php' class='btn btn-info btn-block '>
                <span class='fa fa-reply fa-lg'> Regresar</span>
                </a>
              </td>
              <td class='text-center' colspan='2'>               
                <a href='vista_menu.php' class='btn btn-primary btn-block '>
                <span class='fa fa-refresh fa-lg' aria-hidden='true'> Generar Menu</span>
                </a>
              </td>
              <td class='text-center' colspan='3'>               
                <a href='vista_menu.php' class='btn btn-success btn-block '>
                <span class='fa fa-floppy-o fa-lg' aria-hidden='true'> Guardar Menu</span>
                </a>
              </td>
          </tr>
          </tbody>
        </table> ";
}     
?>
