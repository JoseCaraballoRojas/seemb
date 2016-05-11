<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
@session_start();
if(isset($_SESSION['usuario'])){
include_once('../modelos/Historial.php');
$usuarioh=$_SESSION['id_usuario'];
$accion="Inicio de Sesion";
$notifica= new Historial();
$notifica->registra($usuarioh,$accion);	
?>
<!DOCTYPE html>	
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>SEBCEMB</title>
		<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../publico/css/estilo-index.css">
		<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/font-awesome/css/font-awesome.min.css">
		<script src="../librerias/jquery-1.12.0.js"></script>
  		<script src="../librerias/bootstrap/js/bootstrap.min.js"></script>

	</head>
	<body id="body-index">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 " id="header_index" >
					<!--HEADER-->
					<?php
						 include_once("default/header.php"); 
					?>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 ">
				 	<!--MENU-->
						<?php 
							if($_SESSION['tipo']=='ESPECIALISTA')
							{
								include_once("menu_especialista.php");

							}elseif( $_SESSION['tipo']=='ADMINISTRADOR'){

								include_once("menu_administrador.php");
							}
						?>
				 	<!--MENU-->
				</div>	
			</div>
		</div>
		<div class="container-fluid" >
			<div id="section-index"><!--SECTION-->
				<div class="row" >
					<div class="col-md-12 ">
			 			<img src="../publico/img/logo.jpg" class="img-responsive img-rounded" id="img-logo">
					</div>	
				</div>
			</div> <!--SECTION-->
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!--FOOTER-->
						<?php 
							include_once("default/footer.php"); 
						?>
					<!--FOOTER-->
				</div>
			</div>
		</div>
	</body>		
</html>
<?php
}
else{
	header('Location: index.php' );
}
?>