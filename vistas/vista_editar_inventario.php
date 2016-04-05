<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
@session_start();
if(isset($_SESSION['usuario']))
{

$id_inventario=$_GET['id_inventario'];
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
  			$(document).ready(function(){
  				var id_recibido= $('#id_recibido').val();
				$.post("../controladores/inventarios/controlador_editar.php", { id_recibido: id_recibido }, function(data){
                $("#contenido").append(data);

            	});

            	$.post("../controladores/productos/controlador_cargar.php", {}, function(data){
               		$("#selectproducto").html('<option>Seleccione...</option>');
                	$("#selectproducto").append(data);
            	});
            	$.post("../controladores/unidades/controlador_cargar.php", {}, function(data){
               		$("#selectunidad").html('<option>Unid.--></option>');
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
					<div class="col-md-8 col-md-offset-2 " id="contenido">
					 	
					<input type='hidden' class='form-control' name='id_inventario' value="<?php echo $id_inventario ?>" id="id_recibido">
			     			
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