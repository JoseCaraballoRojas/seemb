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
								<h3 class="form-signin-heading text-center"><b>Crear Usuario</b></h3>
							</div>
							<div class="panel-body">		
						 	<form class="form-inline" method="POST" action="../controladores/personas/controlador_crear.php">
						 		<ul class="list-group" id="datos_personales">
							        <li class="list-group-item list-group-item-danger ">
							        <b>Datos Personales</b>
							        </li>
							    </ul>
						 		<div class="col-md-5 input-group">		 		
						        <label > Cedula:</label>
						        <br>
						         <input type="text" id="inputcedula" class="form-control input-xlarge" placeholder="Cedula de identidad " required autofocus autocomplete="off" name="cedula">	
						        </div>
						        <br><br>
						        <div class="col-md-5 input-group">		 		
						        <label > Primer Nombre:</label>
						        <br>
						         <input type="text" id="inputprimernombre" class="form-control input-xlarge" placeholder="Primer Nombre " required autofocus autocomplete="off" name="primer_nombre">	
						        </div>
						        <br><br>
						        <div class="col-md-5 input-group">
						        <label > Segundo Nombre:</label>
						        <br>
						         <input type="text" id="inputsegundonombre" class="form-control input-xlarge" placeholder="Segundo Nombre " required autofocus autocomplete="off" name="segundo_nombre">	
						        </div>
						        <br><br>
						        <div class="col-md-5 input-group">
						        <label > Primer Apellido:</label>
						        <br>
						         <input type="text" id="inputprimerapellido" class="form-control input-xlarge" placeholder="Primer Apellido " required autofocus autocomplete="off" name="primer_apellido">	
						        </div>
						        <br><br>
						        <div class="col-md-5 input-group">
						        <label > Segundo Apellido:</label>
						        <br>
						         <input type="text" id="inputsegundoapellido" class="form-control input-xlarge" placeholder="Segundo Apellido " required autofocus autocomplete="off" name="segundo_apellido">	
						        </div>
						        <br><br>
						      	<div class="col-md-5 input-group">	
						        <label > Fecha de Nacimiento:</label>
						        <br>
						        <input type="date" id="inputfechanacimiento" class="form-control input-xlarge" placeholder="Fecha de nacimiento" required autofocus autocomplete="off" name="fecha_nacimiento">
								</div>
								<br><br>
								<ul class="list-group" id="datos_usuario">
							        <li class="list-group-item list-group-item-danger ">
							        	<b>Datos de Usuario</b>
							        </li>
							    </ul>
								<div class="col-md-5 input-group">
							        <label > Nombre de Usuario:</label>
							        <br>
							         <input type="text" id="inputusuaario" class="form-control input-xlarge" placeholder="Nombre de usuario" required autofocus autocomplete="off" name="usuario">	
						        </div>
						        <br><br>
						        <div class="col-md-5 input-group">
							        <label > Tipo de Usuario:</label>
							        <br>
							         <select name="tipo" id="selectunidad"class=" form-control select" required>
								   		<option value="ADMINISTRADOR">ADMINISTRADOR</option>
								   		<option value="ESPECIALISTA">ESPECIALISTA</option>
								   	</select>
						        </div>
						        <br><br>
								<div class="col-md-5 input-group">
							        <label > Estatus del Usuario:</label>
							        <br>
							         <select name="estatus" id="selectestatus"class=" form-control select" required>
								   		<option value="ACTIVO">ACTIVO</option>
								   		<option value="INACTIVO">INACTIVO</option>
								   	</select>
						        </div>
						    	
								
							</div>
							<div class="panel-footer">
								<div class="text-center">
									<a class="btn  btn-info " href="vista_listar_usuarios.php" id="atras" >
										<span class='fa fa-reply'>  Atras</span>
									</a>
									<button class="btn  btn-danger " type="reset" name="cancelar" value="borrar" >
										<span class='glyphicon glyphicon-remove'> Borrar</span></button>
									<button class="btn  btn-success " type="submit" name="crear" value="crear" id="crear" >
										<span class='glyphicon glyphicon-floppy-disk'> Crear</span>
									</button>

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