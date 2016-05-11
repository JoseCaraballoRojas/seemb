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
  		<style type="text/css">
			#contenido{
						height: 350px;
					  }
  		</style>
  		<script>

  			$(document).ready(function(){
				//para cargar el select de la unidad de la porcion expresada
				$.post("../controladores/unidades/controlador_cargar.php", {}, function(data){
               	//$("#selectunidad").html('<option>unid.</option>');
                $("#selectunidad").append(data);
                //$("#selectunidad2").html('<option>unid.</option>');
                $("#selectunidad2").append(data);
            	});

            	//para cargar el tipo de plato que integrara el menu
            	$.post("../controladores/tipos/controlador_cargar.php", {}, function(data){
               	//$("#selecttipo").html('<option>Selecione...</option>');
                $("#selecttipo").append(data);
            	});

            	// para agregar ingredientes,
            	//para cargar el tipo de plato que integrara el menu
            	$.post("../controladores/productos/controlador_cargar.php", {}, function(data){
               	//$("#selectproductos").html('<option>Selecione producto...</option>');
                $("#selectproductos").append(data);
            	});

            	//para cargar los grupos al que pertenece el ingrediente
            	$.post("../controladores/grupos/controlador_cargar.php", {}, function(data){
               	//$("#selectgrupos").html('<option>Selecione grupo...</option>');
                $("#selectgrupos").append(data);
            	});

					});

		  	$(document).ready(function() {

		    var MaxInputs       = 10; //Número Maximo de Campos
		    var contenedor       = $("#contenedor"); //ID del contenedor
		    var AddButton       = $("#agregar"); //ID del Botón Agregar
		    var BtnAgg			= $(AddButton).clone();
		    //var x = número de campos existentes en el contenedor
		    var x = $("#contenedor div").length + 1;
		    var FieldCount = x-1; //para el seguimiento de los campos

		     $("body").on("click","#agregar", function(e){
		        if(x <= MaxInputs) //max input box allowed
		        {
		            FieldCount++;
		           //ocultar el boton de agregar original
		            //agregar campo 
		           	$(contenedor).append('<div><br> <label>'+FieldCount+':</label> <select name="producto[]" class="form-control "  id="producto_'+ FieldCount +'" ></select> <input type="text" name="cantidad[]"  class="form-control" placeholder="Cantidad del ingrediente " id="cantidad_'+ FieldCount +'" required/> <select name="unidad2[]" id="unidad_'+ FieldCount +'" class=" form-control" ></select> <select name="grupo[]" id="selectgrupos_'+ FieldCount +'"class=" form-control select" > </select> <a class="btn  btn-danger eliminar"  href="#" ><span class="glyphicon glyphicon-minus-sign"></span></a><a class="btn  btn-success"  id="agregar" href="#" ><span class="glyphicon glyphicon-plus-sign"></span></a></td></tr></div>');

		           	//para cargar los productos que forman parte de el ingrediente..
	            	$.post("../controladores/productos/controlador_cargar.php", {}, function(data){
	               	//$('#producto_'+ FieldCount +'').html('<option>Selecione producto...</option>');
	                $('#producto_'+ FieldCount +'').append(data);
	            	});
	            	//para cargar las unidades que forman parte de el ingrediente..
	            	$.post("../controladores/unidades/controlador_cargar.php", {}, function(data){
	               	//$('#unidad_'+ FieldCount +'').html('<option>Unid.</option>');
	                $('#unidad_'+ FieldCount +'').append(data);
	            	});
					//para cargar los grupos al que pertenece el ingrediente
	            	$.post("../controladores/grupos/controlador_cargar.php", {}, function(data){
	               	//$('#selectgrupos_'+ FieldCount +'').html('<option>Selecione grupo...</option>');
	                $('#selectgrupos_'+ FieldCount +'').append(data);
	            	});
	            	

		            x++; //incrementar el contador
		        }
		        return false;
		    });

		    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
		        if( x > 1 ) {
		            $(this).parent('div').remove(); //eliminar el campo
		            x--;//disminuir el contador
		            FieldCount--;//disminuir la variable que cuenta los
		            
		        }
		        
		        return false;
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
					<div class="col-md-10 col-md-offset-1 ">
						<div class="panel panel-danger">
							<div class="panel-heading">
								<h3 class="panel-title"><b>Crear Platos</b></h3>
							</div>

							<div class="panel-body ">
								<form class="form-inline" method="POST" action="../controladores/platos/controlador_crear.php">

								<label > Plato:</label>
								<input type="text" id="inputplato" class="form-control input-xlarge " placeholder="Ingresa un plato" required autofocus  name="plato">
								<br><br>
								<label > Descripcion:</label>
								<input type="text" id="inputdescripcionn" class="form-control input-xlarge" placeholder="Ingresa una descripcionn" required autofocus  name="descripcion">
								<br><br>
								<label > Porcion:</label>
								<input type="text" class="form-control" placeholder="Porcion del Plato " required  name="porcion" />
								<select name="unidad" id="selectunidad"class=" form-control select" required>
							   		<!--aqui se cargara lo varoles de las unidades -->
							   	</select>
								<br><br>
								<label > Tipo:</label>
								<select name="tipo" id="selecttipo" class="form-control" required></select>
								<br><br>
								<label >Calorias:</label>
								<input type="text" class="form-control" placeholder="Valor Energetico " required  name="calorias" />
								<br><br>
								<label >Carbohidratos:</label>
								<input type="text" class="form-control" placeholder="Carbohidatos" required  name="carbohidratos" />
								<br><br>
								<label >Grasas:</label>
								<input type="text" class="form-control" placeholder="Grasas " required  name="grasas" />
								<br><br>
								<label >Proteinas:</label>
								<input type="text" class="form-control" placeholder="Valor Proteico " required  name="proteinas" />
								<br><br>
								<label >Azucares:</label>
								<input type="text" class="form-control" placeholder="Azucares " required  name="azucares" />
								<br><br>
								<label >sal:</label>
								<input type="text" class="form-control" placeholder="Sal " required  name="sal" />
								<br><br>
								<!-- Lista  de ingredientes-->
								<ul class="list-group">
							        <li class="list-group-item list-group-item-danger ">
							        <b>Ingredientes del Plato</b>
							        </li>
							       <br>
							        <div id="contenedor">
                                        <div  class="added">
                                         
                                        	<label>1:</label>
                                            
                                            <select name="producto[]" class="form-control select" id="selectproductos">
                                                
                                            </select>
                                      
                                            <input type="text" name="cantidad[]"  class="form-control" placeholder="Cantidad del ingrediente " required/>
                                            <select name="unidad2[]" id="selectunidad2"class=" form-control select" >
                                            
                                            </select>

                                             <select name="grupo[]" id="selectgrupos"class=" form-control select" >
                                            
                                            </select>
                                        
                                            <a class="btn  btn-success"  id="agregar" href="#" >
                                                <span class='glyphicon glyphicon-plus-sign'></span>
                                            </a>
                                           
                                        </div>
                                    </div>	
							    </ul>	

							</div>
								

							<div class="panel-footer">
								<div class="text-center">
									<a class="btn  btn-info " href="vista_listar_platos.php" ><span class='fa fa-reply'>  Atras</span></a>
									<button class="btn  btn-danger " type="reset" name="cancelar" value="borrar" >
										<span class='glyphicon glyphicon-remove'> Borrar</span>
									</button>
									<button class="btn  btn-success " type="submit" name="crear" value="crear" >
										<span class='glyphicon glyphicon-floppy-disk'> Crear</span>
									</button>
								</div>
							</div>
								</form>
							</div>
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
		<div hidden="true" >
			<a class="btn  btn-success"  id="agregar2" href="#" >
                <span class='glyphicon glyphicon-plus-sign'></span>
            </a>
		</div>
	</body>		
</html>
<?php
}
else{
	header('Location: index.php' );
}
?>