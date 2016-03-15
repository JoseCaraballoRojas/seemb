<!DOCTYPE html>	
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>SEBCEMB</title>
		<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../publico/css/estilo-index.css">
		<script src="../librerias/jquery-1.12.0.js"></script>
  		<script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
  		<script>
  			$(document).ready(function(){
				$.post("../controladores/grupos/controlador_leer.php", {}, function(data){
                $("#contenido").html(data);

            	});
            	$(".nav li").removeClass("active");
            	$("#li_grupos").addClass('active');
			});
  		</script>
  		<style type="text/css">
			#contenido{
						height: 350px;
						overflow-y:scroll;
					  }
  		</style>
	</head>
	<body id="body-index">
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-12 " id="header_index">
					<header id="header-index">
						<img src="default/img/header.jpg" class="img-responsive img-rounded img-banner">
					</header>
				</div>
			</div>
		</div>
		
		
		<div class="container">
			
				<div class="row">
					<div class="col-md-12 " >
					 	<!--MENU-->
							<?php include_once("menu_especialista.php"); ?>
					 	<!--MENU-->
					</div>	

				</div>
				</div>
				<div class="container" id="section-index">
				<div class="row" >
					<div class="col-md-12" >
						<div id="contenido" class="col-md-12  table  " >
							<!--qui se inserta lo que devuelve el controlador usando la funcion jquery-->
						</div>
					</div>
				</div>
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