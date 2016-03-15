
<!DOCTYPE html>	
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Seemb</title>
		<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../publico/css/estilo-index.css">
		<script src="../librerias/jquery-1.12.0.js"></script>
  		<script src="../librerias/bootstrap/js/bootstrap.min.js"></script>

	</head>
	<body id="body-index">
	<br>
		<div class="container">
			<div class="row">
				<div class="col-md-12 " id="header_index" >
					<!--HEADER-->
					<?php include_once("default/header.php"); ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 ">
				 	<!--MENU-->
						<?php include_once("menu_especialista.php"); ?>
				 	<!--MENU-->
				</div>	

			</div>
		</div>
		<div class="container" >
			<section id="section-index"><!--SECTION-->
				<div class="row">
					<div class="col-md-12 ">
			 			<img src="../publico/img/logo.jpg" class="img-responsive img-rounded" id="img-logo">
					</div>	
				</div>
			</section> <!--SECTION-->
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!--FOOTER-->
						<?php include_once("default/footer.php"); ?>
					<!--FOOTER-->
				</div>
			</div>
		</div>
		
	</body>		
</html>