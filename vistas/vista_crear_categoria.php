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
		<div class="container-fluid">
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
					<div class="col-md-4 col-md-offset-4 ">
					 	
						 	<form class="form-horizontal" method="POST" action="../controladores/categorias/controlador_crear.php">
						 		
						 	<div class="panel panel-danger">
					 			<div class="panel-heading">
									<h2 class="panel-title"><b>Crear categoría</b></h2>
								</div>
								<div class="panel-body">
						 		<br>					        
						        <label for="grupo"> Categoría:</label>
							        <br>
							        <input type="text" id="inputcategoria" class="form-control input-xlarge" placeholder="Ingresa una Categoria" required autofocus autocomplete="off" name="categoria" pattern="[A-Za-z]{3-20}" title="solo debe ingresar letras">
							        <br>
							        <label for="grupo"> Detalle:</label>
							        <input type="text" id="inputdetalle" class="form-control input-xlarge" placeholder="Detalle de categoria" required autofocus autocomplete="off" name="detalle" pattern="[A-Za-z]{3-20}" title="solo debe ingresar letras"	>
									<br>
								</div>
								<div class="panel-footer">
									<div class="text-center">
										<a class="btn  btn-info " href="vista_listar_categorias.php" ><span class='fa fa-reply'>  Atras</span></a>
										<button class="btn  btn-danger " type="reset" name="cancelar" value="borrar" ><span class='glyphicon glyphicon-remove'> Borrar</span></button>
										<button class="btn  btn-success " type="submit" name="crear" value="crear" ><span class='glyphicon glyphicon-floppy-disk'> Crear</span></button>
									</div>
			        			</div>
			        		</div>
			     			</form>
			     			
					</div>	
			</section> <!--section-->
			</div>
			
		
			<div class="container-fluid">
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