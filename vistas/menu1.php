<?php
  include_once("../aplicacion/config.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>SEBCEMB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
  <script src="../librerias/jquery-1.12.0.js"></script>
  <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">SEBCEMB</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="inicio.php">Inicio</a></li>
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
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  <h3>Collapsible Navbar</h3>
  <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
  <p>Only when the button is clicked, the navigation bar will be displayed.</p>
</div>

</body>
</html>
