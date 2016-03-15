<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
@session_start();
//if(isset($_SESSION['usuario']))
//{
//$usuario=$_SESSION['usuario'];
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
  		<script>
  			$(document).ready(function(){
				$.post("../controladores/productos/controlador_cargar.php", {}, function(data){
               $("#selectcategoria").html('<option>Seleccione...</option>');
                $("#selectcategoria").append(data);

            	});
			});
  		</script>

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
							<?php include_once("menu_especialista.php"); ?>
					 	<!--MENU-->
					</div>	
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 ">
						<div class="panel panel-danger">
							<div class="panel-heading">
								<h3 class="panel-title">Crear Platos</h3>
							</div>

							<div class="panel-body">
								<form class="form-inline" method="POST" action="../controladores/platos/controlador_crear.php">

								<label > Plato:</label>
								<input type="text" id="inputplato" class="form-control input-xlarge " placeholder="Ingresa un plato" required autofocus autocomplete="off" name="plato">
								<br><br>
								<label > Descripcion:</label>
								<input type="text" id="inputdescripcionn" class="form-control input-xlarge" placeholder="Ingresa una descripcionn" required autofocus autocomplete="off" name="descripcionn">
								<br><br>
								<label > Porcion:</label>
								<input type="text" class="form-control" placeholder="Porcion del Plato " />
								<select name="" id=""class=" form-control select" >
							   		<option value="">Gr</option>
							   	</select>
								<br><br>
								<label > categoria:</label>
								<select name="categoria" id="selectcategoria" class="form-control" required></select>
							</div>
							<div class="panel-footer">
								<div class="text-center">
									<a class="btn  btn-info " href="vista_listar_platos.php" ><span class='fa fa-reply'>  Atras</span></a>
									<button class="btn  btn-danger " type="reset" name="cancelar" value="borrar" >
										<span class='glyphicon glyphicon-remove'> Borrar</span>
									</button>
									<button class="btn  btn-success " type="submit" name="crear" value="crear" >
										<span class='glyphicon glyphicon-floppy-disk'> Crear</span>
									</button>
								</div>
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
//}
?>