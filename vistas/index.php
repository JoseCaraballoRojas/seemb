<!DOCTYPE html>	
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Seemb</title>
		<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../publico/css/estilo-index.css">
	</head>
	<body id="body-index">
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-12" >
					<?php include_once("default/header.php"); ?>
				</div>
			</div>
		</div>
		
		
			<div class="container">
			<section id="section-index">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 ">
					 	
						 	<form class="form-signin " method="POST" action="../controladores/cotrolador_sesiones.php">
						 		<br>			 		
						        <h2 class="form-signin-heading text-center">Por Favor Inicie Sesion</h2>
						        
						       <!-- <label for="inputEmail" class="sr-only"></label>-->
						        <label for="nombre_de_usuario"> Usuario :</label>
						        <br>
						        <input type="text" id="inputusuario" class="form-control" placeholder="Introduce tu usuario" required autofocus autocomplete="off" name="usuario">
						        <br>
						        <!--<label for="inputPassword" class="sr-only">Password</label>-->
						         <label for="password"> Contraseña:</label>
						        <br>
						        <input type="password" id="inputPassword" class="form-control" placeholder="Introduce tu Contraseña" required name="password">
			        			<br>
			        			<button class="btn btn-lg btn-success btn-block" type="submit" name="iniciarsesion" value="iniciar" >Iniciar Sesion</button>
			        			<br><br><br>
			     			</form>
			     			
					</div>	

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
