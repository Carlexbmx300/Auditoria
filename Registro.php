<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">

<link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>

   
    <?php
    include('components/Nav_index.php');
   ?>

  <div class="mid pt-5 cards regi row">

<div class="col-xl-6">
<div class="reg">
<form action="components/ProcesoCrearUsuario.php" method="POST">
  <!-- Grid row -->
  <div class="form-group row ">
    <!-- Default input -->
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombres</label>
    <div class="col-sm-10">
      <input type="text" class="form-control " id="inputEmail3" placeholder="Nombres" name="nombre">
    </div>
  </div>
  <div class="form-group row ">
    <!-- Default input -->
    <label for="inputEmail3" class="col-sm-2 col-form-label">Apellidos</label>
    <div class="col-sm-10">
      <input type="text" class="form-control " id="inputEmail3" placeholder="Apellidos" name="apellido">
    </div>
  </div>
  <div class="form-group row ">
    <!-- Default input -->
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control " id="inputEmail3" placeholder="Email" name="email">
    </div>
  </div>
  <div class="form-group row ">
    <!-- Default input -->
    <label for="inputEmail3" class="col-sm-2 col-form-label">Usuario</label>
    <div class="col-sm-10">
      <input type="text" class="form-control " id="inputEmail3" placeholder="Nombre de usuario" name="user">
    </div>
  </div>
  <!-- Grid row -->

  <!-- Grid row -->
  <div class="form-group row ">
    <!-- Default input -->
    <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña" name="pass">
    </div>
  </div>
  <!-- Grid row -->

  <!-- Grid row -->
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary btn-md btnlog">INICIAR</button>
    </div>
    
  </div>
  <!-- Grid row -->
</form>
<!-- Default horizontal form -->
</div>
</div>
<div class="col-xl-6 align-self-center">
<h1 class="ml-xl-5 mid-text">REGISTRATE PARA VER TODO LO QUE PODEMOS OFRECERTE</h1>
</div>
  

    <!--Carousel Wrapper-->
<!--<div id="carousel-example-2" class="carousel slide " data-ride="carousel">
 
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
 
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="upload/fondo.jpg"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption mb-5 mt-n5">
        <h3 class="h3-responsive text-left">Light mask</h3>
        <p>First text</p>
      </div>
    </div>
    <div class="carousel-item">
   
     
      <div class="view">
        <img class="d-block w-100" src="upload/fondo3.jpg"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive ">Strong mask</h3>
        <p>Secondary text</p>
      </div>
    </div>
    <div class="carousel-item">
    
      <div class="view">
        <img class="d-block w-100 " src="upload/fondo2.jpg"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Slight mask</h3>
        <p>Third text</p>
      </div>
    </div>
  </div>
  
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <
</div>

</div>-->

</div>


  <div class="footer">

  </div>

</div>
<script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
<script src="js/integrantes.js"></script>
<script src="js/main.js"></script>
</body>
</html>