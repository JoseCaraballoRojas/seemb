<?php 
@session_start();
if(isset($_SESSION['usuario']))
{
$usuario=$_SESSION['usuario'];
  ?>
<nav class="navbar navbar-inverse ">
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<span class="caret"></span></a>
					<ul class="dropdown-menu">
			            <li><a href="vista_crear_categoria.php">Crear</a></li>
			            <li><a href="vista_listar_categorias.php">Listar </a></li>
			          </ul>
				</li>
				<li id="li_grupos">
					<a href="vista_listar_grupos.php">Grupos</a>
				</li>
				<li id="li_tipos">
					<a href="vista_listar_tipos.php">Tipos</a>
				</li>
				<li id="li_unidades">
					<a href="vista_listar_unidades.php">Unidades</a>
				</li>
				<li id="li_productos">
					<a href="vista_listar_productos.php">Productos</a>
				</li>
				<li id="li_platos">
					<a href="vista_listar_platos.php">Platos</a>
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
						<a href="../controladores/sesiones/controlador_cerrar.php" ><span class="glyphicon glyphicon-log-out"></span><b> Salir</b></a>
					</li>
				</ul>
				</b>
		</div>
	</div>
</nav>
<?php
}
?>