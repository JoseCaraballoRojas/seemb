<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
@session_start();
if(isset($_SESSION['usuario']) and ($_SESSION['tipo']=='ESPECIALISTA'))
{
$id_plato=$_GET['id_plato'];
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
  		<script>
  			$(document).ready(function(){
  				var id_recibido= $('#id_recibido').val();
				$.post("../controladores/platos/controlador_detalle.php", { id_recibido: id_recibido}, function(data){
                $("#contenido").html(data);

            	});
            	$(".nav li").removeClass("active");
            	$("#li_platos").addClass('active');
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
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12" >
					<!--<div class="page-header">-->
					<header id="header-index">
						<img src="default/img/header.jpg" class="img-responsive img-rounded img-banner">
					</header><!--....header-->
					<!--</div>-->
				</div>
			</div>
		</div>
		
		
		<div class="container-fluid">
			<section id="section-index">
				<div class="row">
					<div class="col-md-12 ">
					 	<!--MENU-->
							<?php include_once("menu_especialista.php"); ?>
					 	<!--MENU-->
					</div>	

				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="contenido" class="col-md-12  table  ">
							<!--qui se inserta lo que devuelve el controlador usando la funcion jquery-->

							<input type='hidden' class='form-control' name='id_plato' value="<?php echo $id_plato ?>" id="id_recibido">
						</div>
					</div>
				</div>
			</section> <!--section-->
			</div>
		
		
			<div class="container-fluid ">
				<div class="row ">
					<div class="col-md-12">
						<!--FOOTER-->
							<?php include_once("default/footer.php"); ?>
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