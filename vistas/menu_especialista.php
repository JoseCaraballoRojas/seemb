<?php 
@session_start();
if(isset($_SESSION['usuario']))
{
$usuario=$_SESSION['usuario'];
  ?>
  <head>
  	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/font-awesome/css/font-awesome.min.css">
  </head>
<nav class="navbar navbar-inverse ">
	<div class="container-fluid">
		<div class="collapse navbar-collapse " id="myNavbar">
			<b>
			<ul class="nav navbar-nav " >
				<li id="li_inicio" class="active">
					<a href="inicio.php" >
						<span class="glyphicon glyphicon-home"></span> Inicio
					</a>
				</li>
				<li id="li_categorias">
					<a href="vista_listar_categorias.php" class="fa fa-th-list" aria-hidden="true"> Categorías</span></a>
				</li>
				<li id="li_grupos">
					<a href="vista_listar_grupos.php" class="fa fa-cubes" aria-hidden="true"> Grupos</a>
				</li>
				<li id="li_tipos">
					<a href="vista_listar_tipos.php" class="fa fa-asterisk" aria-hidden="true"> Tipos</a>
				</li>
				<!--<li id="li_unidades">
					<a href="vista_listar_unidades.php" class="fa fa-sliders" aria-hidden="true"> Unidades</a>
				</li>-->
				<li id="li_productos">
					<a href="vista_listar_productos.php" class="fa fa-cart-arrow-down" aria-hidden="true"> Productos</a>
				</li>
				<li id="li_platos">
					<a href="vista_listar_platos.php" class="fa fa-cutlery" aria-hidden="true"> Platos</a>
				</li>
				<li id="li_menus">
					<a href="#" class="fa fa-table dropdown-toggle" aria-hidden="true" data-toggle="dropdown"> Menús <span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li id="">
					<a href="vista_memu_especial.php" class="fa fa-pie-chart" aria-hidden="true"> Menú especial</a>
					</li>
				  	<li id="li_categorias">
					<a href="vista_menu_semanal.php" class="fa fa-bar-chart" aria-hidden="true"> Menú semanal</a>
					</li>
			  	</ul>
				</li>
				<li id="li_ayuda">
					<a  href="../librerias/Manual-de-usuario.pdf" target="newtab" class="fa fa-question-circle" aria-hidden="true" > Ayuda</a>
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