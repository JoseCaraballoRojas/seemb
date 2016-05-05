<?php 
@session_start();
if(isset($_SESSION['usuario']))
{
$usuario=$_SESSION['usuario'];
  ?>
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
				<li id="li_categorias">
					<a href="#">Personas</a>
				</li>
				<li id="li_grupos">
					<a href="vista_listar_usuarios.php">Usuarios</a>
				</li>
				<li id="li_tipos">
					<a href="#">Seguridad</a>
				</li>
				<li id="li_histrorial">
					<a href="vista_listar_historial.php">Historial</a>
				</li>
				<li id="li_inventario">
					<a href="vista_listar_inventarios.php">Inventario</a>
				</li>
				<li id="li_menus">
					<a href="vista_menu.php">Menus</a>
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