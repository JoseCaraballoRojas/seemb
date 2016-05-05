<?php 
@session_start();
include_once('../../modelos/Historial.php');
$usuarioh=$_SESSION['id_usuario'];
$accion="Cierre de Sesion";
$notifica= new Historial();
$notifica->registra($usuarioh,$accion);	
session_unset();
session_destroy();
header('Location: ../../vistas/index.php' );
exit();
?>