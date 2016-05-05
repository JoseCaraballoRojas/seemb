<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
@session_start();
if(isset($_SESSION['usuario']))
{
  ?>
<!DOCTYPE html>	
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Seemb</title>
		<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../publico/css/estilo-index.css">
		<script src="../librerias/jquery-1.12.0.js"></script>
  		<script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
  		<script>
  			
  		</script>
  		<style type="text/css">
			#contenido{
						height: 350px;
					  }
			
  		</style>
	</head>
	<body id="body-index">
			<br>
		<div class="container">
			<div class="row">
				<div class="col-md-12" >
					<!--<div class="page-header">-->
					<header id="header-index">
						<img src="../publico/img/banner.jpg" class="img-responsive img-rounded img-banner" >
					</header> <!--....header-->
					<!--</div>-->
				</div>
			</div>
		</div>
		
		
		<div class="container">
			<section id="section-index">
				<div class="row">
					<div class="col-md-12 ">
					 	<!--MENU-->
							<?php include_once("menu_especialista.php"); ?>
					 	<!--MENU-->
					</div>	

				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 ">
					 	
						 	<form class="form-horizontal" method="POST" action="../controladores/grupos/controlador_crear.php">
						 		<br>			 		
						        <h2 class="form-signin-heading text-center">Agregar Grupo</h2>
						        
						       <!-- <label for="inputEmail" class="sr-only"></label>-->
						        <label for="grupo"> Grupo:</label>
						        <br>
						        <input type="text" id="inputgrupo" class="form-control input-xlarge" placeholder="Ingresa Un Grupo" required autofocus autocomplete="off" name="grupo">
						        <br>
						        <!--<label for="inputPassword" class="sr-only">Password</label>-->
						        <label for="grupo"> Prioridad:</label><br>
								<label class="radio-inline" >
								<input type="radio" name="prioridad" id="inlineRadio1" value="1" required> 1
								</label>
								<label class="radio-inline">
								<input type="radio" name="prioridad" id="inlineRadio2" value="2" > 2
								</label>
								<label class="radio-inline">
								<input type="radio" name="prioridad" id="inlineRadio3" value="3" > 3
								</label>
								<br>
								<br>
								<div class="text-center">
									<a class="btn  btn-info " href="vista_listar_grupos.php" ><span class='fa fa-reply'>  Atras</span></a>
									<button class="btn  btn-danger " type="reset" name="cancelar" value="agregar" ><span class='glyphicon glyphicon-remove'> Borrar</span></button>
									<button class="btn  btn-success " type="submit" name="agregar" value="agregar" ><span class='glyphicon glyphicon-floppy-disk'> Agregar</span></button>
								</div>
			        			<br><br><br>
			     			</form>
			     			
					</div>	
			</section> <!--section-->
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
<?php
}
else{
	header('Location: index.php' );
}
?>