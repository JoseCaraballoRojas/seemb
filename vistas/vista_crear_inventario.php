<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
@session_start();
if(isset($_SESSION['usuario']) and ($_SESSION['tipo']=='ADMINISTRADOR'))
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
				$.post("../controladores/productos/controlador_cargar.php", {}, function(data){
               		$("#selectproducto").html('<option>Seleccione...</option>');
                	$("#selectproducto").append(data);
            	});
            	$.post("../controladores/unidades/controlador_cargar.php", {}, function(data){
               		$("#selectunidad").html('<option>Unid.</option>');
                	$("#selectunidad").append(data);
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
							<?php include_once("menu_administrador.php"); ?>
					 	<!--MENU-->
					</div>	

				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 ">
					 	<div class="panel panel-danger">
							<div class="panel-heading">
								<h3 class="form-signin-heading text-center"><b>Crear Inventario</b></h3>
							</div>
							<div class="panel-body">		
						 	<form class="form-inline" method="POST" action="../controladores/inventarios/controlador_crear.php">
						 		<div class="col-md-5 input-group">		 		
						        <label > Producto:</label>
						        <br>
						        <select name="producto" id="selectproducto" class="form-control" required>
						        	
						        </select>
						        </div>
						        <br><br>
						        <label > Cantidad:</label>
						        <br>
						        <input type="text" id="inputcantidad" class="form-control input-xlarge" placeholder="Cantidad del Producto " required autofocus autocomplete="off" name="cantidad">					      					
						        <select name="unidad" id="selectunidad" class="form-control" required>
						        	
						        </select>
						        <br><br>
						      	<div class="col-md-5 input-group">	
						        <label > Nivel Optimo:</label>
						        <br>
						        <input type="text" id="inputniveloptimo" class="form-control input-xlarge" placeholder="Ingresa el Nivel Optimo" required autofocus autocomplete="off" name="nivel_optimo">
						        </div>
						        
							</div>
							<div class="panel-footer">
								<div class="text-center">
									<a class="btn  btn-info " href="vista_listar_inventarios.php" ><span class='fa fa-reply'>  Atras</span></a>
									<button class="btn  btn-danger " type="reset" name="cancelar" value="borrar" ><span class='glyphicon glyphicon-remove'> Borrar</span></button>
									<button class="btn  btn-success " type="submit" name="crear" value="crear" ><span class='glyphicon glyphicon-floppy-disk'> Crear</span></button>
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