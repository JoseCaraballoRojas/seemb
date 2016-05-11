<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
@session_start();
if(isset($_SESSION['usuario']) AND ($_SESSION['tipo']=='ADMINISTRADOR'))
{
  ?>
<!DOCTYPE html>	
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Seemb</title>
		<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../publico/css/estilo-index.css">
		<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../librerias/datatables/media/css/jquery.dataTables.css">
		<script src="../librerias/jquery-1.12.0.js"></script>
		<script src="../librerias/datatables/media/js/jquery.dataTables.js"></script>
  		<script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
  		
  		<script>
			$(document).ready(function() {
    			$("#tablas").DataTable();
    			
			} );
  		</script>
  		<style type="text/css">
			#contenido{
						height: 350px;
						overflow-y:scroll;
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
					<div class="col-md-12">
						<div id="contenido" class="col-md-12  table  ">
							<table id="tablas" class="display" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						                <th>Name</th>
						                <th>Position</th>
						                <th>Office</th>
						                <th>Age</th>
						                <th>Start date</th>
						                <th>Salary</th>
						            </tr>
						        </thead>
						        <tfoot>
						            <tr>
						                <th>Name</th>
						                <th>Position</th>
						                <th>Office</th>
						                <th>Age</th>
						                <th>Start date</th>
						                <th>Salary</th>
						            </tr>
						        </tfoot>
						        <tbody>
						            <tr>
						                <td>Tiger Nixon</td>
						                <td>System Architect</td>
						                <td>Edinburgh</td>
						                <td>61</td>
						                <td>2011/04/25</td>
						                <td>$320,800</td>
						            </tr>
						            <tr>
						                <td>Garrett Winters</td>
						                <td>Accountant</td>
						                <td>Tokyo</td>
						                <td>63</td>
						                <td>2011/07/25</td>
						                <td>$170,750</td>
						            </tr>
						            <tr>
						                <td>Ashton Cox</td>
						                <td>Junior Technical Author</td>
						                <td>San Francisco</td>
						                <td>66</td>
						                <td>2009/01/12</td>
						                <td>$86,000</td>
						            </tr>
						            <tr>
						                <td>Cedric Kelly</td>
						                <td>Senior Javascript Developer</td>
						                <td>Edinburgh</td>
						                <td>22</td>
						                <td>2012/03/29</td>
						                <td>$433,060</td>
						            </tr>
						            <tr>
						                <td>Airi Satou</td>
						                <td>Accountant</td>
						                <td>Tokyo</td>
						                <td>33</td>
						                <td>2008/11/28</td>
						                <td>$162,700</td>
						            </tr>
						            <tr>
						                <td>Brielle Williamson</td>
						                <td>Integration Specialist</td>
						                <td>New York</td>
						                <td>61</td>
						                <td>2012/12/02</td>
						                <td>$372,000</td>
						            </tr>
						            </tbody>
						            </table>
												</div>
											</div>
										</div>
									</section> <!--section-->
									</div>
		
		
			<div class="container ">
				<div class="row ">
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