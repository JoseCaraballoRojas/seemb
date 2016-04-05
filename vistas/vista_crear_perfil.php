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
		<title>SEBCEMB</title>
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
						<img src="default/img/header.jpg" class="img-responsive img-rounded img-banner">
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
							<?php 
									if ($_SESSION['tipo']=='ADMINISTRADOR') {
										include_once("menu_administrador.php");
									}
									elseif ($_SESSION['tipo']=='ESPECIALISTA') {
											include_once("menu_especialista.php");
									}
							 ?>
					 	<!--MENU-->
					</div>	

				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 ">
					 	<div class="panel panel-danger">
							<div class="panel-heading">
								<h3 class="form-signin-heading text-center"><b>Crear Perfil de Seguridad</b></h3>
							</div>
							<div class="panel-body">		
						 	<form class="form-inline" method="POST" action="../controladores/perfiles/controlador_crear.php">
						 		<ul class="list-group" id="datos_personales">
							        <li class="list-group-item list-group-item-danger ">
							        <b>Preguntas Y Respuestas Para Recuperacion de Datos</b>
							        </li>
							    </ul>
						 		
								<div class="col-md-5 input-group col-md-offset-1">
							        <label > Primera Pregunta de Seguridad:</label>
							        <br>
							         <select name="primera_pregunta" id="selectprimerapregunta"class=" form-control select" required>
							         	<option>Seleccione una Pregunta...</option>
								   		<option value="1">Pesonaje Historico Favorito</option>
								   		<option value="2">Lugar de Nacimiento</option>
								   		<option value="3">Ocupacion de su Abuelo</option>
								   		<option value="4">Lugar Favorito</option>
								   		<option value="5">Color Favorito</option>
								   		<option value="6">Nombre de su Mascota</option>
								   		<option value="7">Apellido Materno</option>
								   		<option value="8">Pelicula Favorita</option>
								   		<option value="9">Amigo de su Infancia</option>
								   		<option value="10">Comida Favorita</option>
								   		<option value="11">Nombre de tu Hijo</option>

								   	</select>
						        </div>
						    	<div class="col-md-5 input-group">
						        <label > Respuesta de la Primera Pregunta:</label>
						        <br>
						         <input type="text" id="inputsprimerarespuesta" class="form-control input-xlarge" placeholder="Respuesta de Primera Pregunta" required autofocus autocomplete="off" name="primera_respuesta">	
						        </div>
						        <br><br>
								
								<div class="col-md-5 input-group col-md-offset-1">
							        <label > Segunda Pregunta de Seguridad:</label>
							        <br>
							         <select name="segunda_pregunta" id="selectsegundapregunta"class=" form-control select" required>
							         	<option>Seleccione una Pregunta...</option>
								   		<option value="1">Pesonaje Historico Favorito</option>
								   		<option value="2">Lugar de Nacimiento</option>
								   		<option value="3">Ocupacion de su Abuelo</option>
								   		<option value="4">Lugar Favorito</option>
								   		<option value="5">Color Favorito</option>
								   		<option value="6">Nombre de su Mascota</option>
								   		<option value="7">Apellido Materno</option>
								   		<option value="8">Pelicula Favorita</option>
								   		<option value="9">Amigo de su Infancia</option>
								   		<option value="10">Comida Favorita</option>
								   		<option value="11">Nombre de tu Hijo</option>

								   	</select>
						        </div>
						    	<div class="col-md-5 input-group">
						        <label > Respuesta de segunda Pregunta:</label>
						        <br>
						         <input type="text" id="inputssegundarespuesta" class="form-control input-xlarge" placeholder="Respuesta de segunda Pregunta" required autofocus autocomplete="off" name="segunda_respuesta">	
						        </div>
						        <br><br>

						        <div class="col-md-5 input-group col-md-offset-1">
							        <label > tercera Pregunta de Seguridad:</label>
							        <br>
							         <select name="tercera_pregunta" id="selecttercerapregunta"class=" form-control select" required>
							         	<option>Seleccione una Pregunta...</option>
								   		<option value="1">Pesonaje Historico Favorito</option>
								   		<option value="2">Lugar de Nacimiento</option>
								   		<option value="3">Ocupacion de su Abuelo</option>
								   		<option value="4">Lugar Favorito</option>
								   		<option value="5">Color Favorito</option>
								   		<option value="6">Nombre de su Mascota</option>
								   		<option value="7">Apellido Materno</option>
								   		<option value="8">Pelicula Favorita</option>
								   		<option value="9">Amigo de su Infancia</option>
								   		<option value="10">Comida Favorita</option>
								   		<option value="11">Nombre de tu Hijo</option>

								   	</select>
						        </div>
						    	<div class="col-md-5 input-group">
						        <label > Respuesta de tercera Pregunta:</label>
						        <br>
						         <input type="text" id="inputstercerarespuesta" class="form-control input-xlarge" placeholder="Respuesta de tercera Pregunta" required autofocus autocomplete="off" name="tercera_respuesta">	
						        </div>
						        <br><br>

							</div>
							<div class="panel-footer">
								<div class="text-center">
									<button class="btn  btn-danger " type="reset" name="cancelar" value="borrar" >
										<span class='glyphicon glyphicon-remove'> Borrar</span></button>
									<button class="btn  btn-success " type="submit" name="crear" value="crear" id="crear" >
										<span class='glyphicon glyphicon-floppy-disk'> Crear</span>
									</button>

								</div>
			        			
				     		</form>
		     				</div>
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
<?php
}
else{
	header('Location: index.php' );
}
?>