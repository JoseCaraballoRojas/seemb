<?php 
/* Controlador para llevar un control de las sesiones en el sistema de forma correcta y segura */
mysqli_report(0);
//se incluye la clase conexion.
include_once('../../modelos/Sesion.php');

// se verifica que se llamo a este controlador a traves de la vista correspondiente.
if(($_POST['iniciarsesion']=="iniciar") )
{
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];

    if($usuario=='' || $password=='' )
    {
      
      ?>
            <script type="text/javascript">
                alert("debe ingresar un usuario y su contraseña");
                window.location='../../vistas/index.php';
            </script>

          <?php
    }
    
    else
    {
      $abrir_sesion= new Sesion();
      $retorno=$abrir_sesion->iniciar($usuario,$password);
      if ($retorno== true )
        {
          @session_start();
          $estatus=$_SESSION['estatus'];
          if ($estatus=="INACTIVO" )
          {
            ?>
            <script type="text/javascript">
              alert("Usuario Desactivado por favor Comuniquese con el Administrador");
              window.location="../../vistas/index.php";
            </script>
            <?php  
          }
          else{
                if ($_SESSION['perfil']=='COMPLETO')
                {
                  
                  ?>
                  <script type="text/javascript">
                    window.location="../../vistas/inicio.php";
                  </script>
                  <?php
                }else{

                  ?>
                  <script type="text/javascript">
                    window.location="../../vistas/vista_crear_perfil.php";
                  </script>
                  <?php
                }
                
              }
        }else{
          ?>
          <script type="text/javascript">
              alert("Usuario o Contraseña Incorrectos");
              window.location="../../vistas/index.php";
            </script>
            <?php
        }


    }      
}
else{
    ?>
    <script type="text/javascript">       
     window.location='../../vistas/index.php';
    </script>
<?php
}
?>