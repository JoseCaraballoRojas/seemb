<?php 
@session_start();
if(isset($_SESSION['usuario']))
{
$usuario=$_SESSION['usuario'];
  ?>
<head>
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/font-awesome/css/font-awesome.min.css">
</head>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<b><a class="navbar-brand" >SEBCEMB</a></b>
		</div>
		<div class="collapse navbar-collapse " id="myNavbar">
			<b>
			<ul class="nav navbar-nav " >
				<li id="li_inicio" class="active">
					<a href="inicio.php" >
						<span class="glyphicon glyphicon-home"></span> Inicio
					</a>
				</li>
				<li id="li_inventario">
					<a href="vista_listar_inventarios.php" class="fa fa-list-alt" aria-hidden="true"> Inventario</a>
				</li>
				<li id="li_alertas">
					<a href="#" class="fa fa-bell" aria-hidden="true"> Alertas</a>
				</li>
				
				<li id="li_tipos">
					<a href="#" class="fa fa-shield dropdown-toggle" aria-hidden="true" data-toggle="dropdown"> Seguridad <span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li id="li_histrorial">
					<a href="vista_listar_historial.php" class="fa fa-history" aria-hidden="true"> Historial</a>
					</li>
				  	<li id="li_categorias">
					<a href="../controladores/respaldo/controlador_respaldar_bd.php" class="fa fa-database" aria-hidden="true"> Respaldo</a>
					</li>
					<li id="li_grupos">
						<a href="vista_listar_usuarios.php"> <span class="fa fa-users" aria-hidden="true"> Usuarios</a>
					</li>  
			  	</ul>
				</li>
				<li id="li_ayuda">
					<a href="#" class="fa fa-file-text-o dropdown-toggle" aria-hidden="true" data-toggle="dropdown"> Reportes <span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li id="">
					<a href="vista_listar_historial.php" class="fa fa-pie-chart" aria-hidden="true"> Graficos</a>
					</li>
				  	<li id="li_categorias">
					<a href="../controladores/respaldo/controlador_respaldar_bd.php" class="fa fa-bar-chart" aria-hidden="true"> Estadisticos</a>
					</li>
					<li id="li_grupos">
						<a href="vista_listar_usuarios.php"> <span class="fa fa-file-pdf-o" aria-hidden="true"> Pdf</a>
					</li>  
			  	</ul>
				</li>
				
				<li id="li_ayuda">
					<a href="../librerias/Manual-de-usuario.pdf" target="newtab" class="fa fa-question-circle" aria-hidden="true" > Ayuda</a>
				</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo " ",$usuario ?> </a>
					</li>
					<li>
						<a href="../controladores/sesiones/controlador_cerrar.php"><span class="glyphicon glyphicon-log-out"></span><b> Salir</b></a>
					</li>
				</ul>
				</b>
		</div>
	</div>
</nav>
<?php
}
?>
