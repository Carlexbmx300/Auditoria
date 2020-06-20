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

  <div class="mid pt-5">
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

  <div class="cards row  pt-5 pb-5">
    <div class="col col-xl-7 align-self-center">

    <h1 class="ml-xl-5 mid-text">ADMINISTRA TUS PROYECTOS DE UNA MANERA UNICA</h1>

    </div>
    <div class="col col-xl-4 col-12">
    <div class="card card-cascade ">

<!-- Card image -->
    <div class="view view-cascade overlay">
      <img class="card-img-top" src="upload/uni4.png" alt="Card image cap">
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

<!-- Card content -->
<div class="card-body card-body-cascade text-center">

  <!-- Title -->
  <h4 class="card-title mt-n5 position-relative h4-responsive"><strong>AUDITORIA INFORMATICA</strong></h4>
  <!-- Subtitle -->
  <div class="sub">
  <h6 class=" indigo-text py-2"><i class="far fa-clipboard fa-2x float-left"></i>VISTA PREVIA</h6>
  </div>
  <div class="sub">
  <h6 class=" indigo-text py-2"><i class="far fa-file-alt fa-2x float-left"></i>CONTENIDO</h6>
  </div>
  <div class="sub">
  <h6 class=" indigo-text py-2"><i class="far fa-edit fa-2x float-left"></i>MODIFICAR</h6>
  </div>
  <div class="sub">
  <h6 class=" indigo-text py-2"><i class="far fa-file-excel fa-2x float-left"></i></i>ELIMINAR</h6>
  </div>
  <!-- Text -->

</div>

<!-- Card footer -->
<div class="card-footer text-muted text-center">
  Progreso actual 30%
</div>

</div>
</div>
  </div>
  </div>

<div class="login">
  <div class="row pt-5 pb-5">
    <div class="col-xl-6 align-self-center">
    <?php
      include('components/Registro.php');
    ?>
    </div>
    <div class="col-xl-6 align-self-center text-center text-xl-left ">
    <h1 class="ml-xl-5 ">INICIA SESION PARA EMEPEZAR A MANEJAR TUS PROYECTOS DE UNA MANERA FACIL, AGIL y CORRECTA</h1>
    </div>
  </div>


 <?php
 include('components/Footer.php');
 ?>

</div>
<script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
<script src="js/integrantes.js"></script>
<script src="js/main.js"></script>
</body>
</html>