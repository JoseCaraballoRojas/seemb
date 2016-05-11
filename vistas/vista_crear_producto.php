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
  		<script>
  			$(document).ready(function(){
				$.post("../controladores/categorias/controlador_cargar.php", {}, function(data){
               
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
					<div class="col-md-4 col-md-offset-4 ">
					 	
						 	<form class="form-horizontal" method="POST" action="../controladores/productos/controlador_crear.php">
						 		<br>			 		
						        <h2 class="form-signin-heading text-center">Crear Productos</h2>
						        
						        <label > Producto:</label>
						        <br>
						        <input type="text" id="inputproducto" class="form-control input-xlarge" placeholder="Ingresa un producto" required autofocus autocomplete="off" name="producto">
						        <label > Presentacion:</label>
						        <br>
						        <input type="text" id="inputpresentacion" class="form-control input-xlarge" placeholder="Ingresa una presentacion" required autofocus autocomplete="off" name="presentacion">

						        <label > categoria:</label>
						        <br>
						        <select name="categoria" id="selectcategoria" class="form-control" required>
						        	
						        </select>
								<br>
								<br>
								<div class="text-center">
									<a class="btn  btn-info " href="vista_listar_productos.php" ><span class='fa fa-reply'>  Atras</span></a>
									<button class="btn  btn-danger " type="reset" name="cancelar" value="borrar" ><span class='glyphicon glyphicon-remove'> Borrar</span></button>
									<button class="btn  btn-success " type="submit" name="crear" value="crear" ><span class='glyphicon glyphicon-floppy-disk'> Crear</span></button>
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