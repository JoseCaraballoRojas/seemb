<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
@session_start();
//if(isset($_SESSION['usuario']))
//{
  ?>
<!DOCTYPE html>	
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Seemb</title>
		<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../publico/css/estilo-index.css">
		<script src="../librerias/jquery-1.12.0.js"></script>
  		<script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body id="body-index">
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-12" >
					<!--<div class="page-header">-->
					<header id="header-index">
						<img src="../publico/img/banner2.jpg" class="img-responsive img-rounded img-banner" >
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
						<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Seemb</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active "><a href="#" ><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Seguridad <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Usuarios</a></li>
            <li><a href="#">Respaldo</a></li>
            <li><a href="#">ultima</a></li>
          </ul>
        </li>
        <li><a href="#">Menus</a></li>
        <li><a href="#">Ingredietes</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Jose caraballo</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
					 	<!--MENU-->
					</div>	

				</div>
			</section> <!--section-->
			</div>
		
		
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<footer id="pie-index" class="text-center" >
							<!--<p class="text-center">Creado Bajo estandares GPL</p>-->
							<button class="btn btn-lg btn-default btn-block "><p class="text-center "> <b>PHP5  PostgreSQL  CSS3  HTML5 </b></p></button>
							
						</footer>
					</div>
				</div>
			</div>
		
	</body>		
</html>

<?php
//}
?>