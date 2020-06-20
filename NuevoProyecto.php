
<?php
include('components/Conexion.php');
session_start();



$varsesion=$_SESSION['usuario'];
if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorizacion';
    die();
}

$usuario = "SELECT * from usuario where user='$_SESSION[usuario]'";
$resp = mysqli_query($conexion, $usuario);
$row = $resp->fetch_assoc();
$id = $row['id_usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/contenido.css">
<link rel="stylesheet" href="css/index.css">
    <title>Document</title>
    <style>

.principal{
    margin-top:60px;
    font-family:'Roboto';
}
.card-header-first{
  
    margin-top:-30px;
    height:90px;
    background-color:#00EBEE;
    box-shadow:1px 10px 5px #a2a2a2;
}

    </style>
</head>
<body>
    <?php
    include('components/Navbar.php');
    ?><br>
    <br>
    <br>

<div class="container principal">
    <div class="row ">
    <div class="card border-dark col  text-center ml-0">
    <div class="card-header-first pb-5">
      <h2 class="card-header-title text-white pt-3" style=" color:black !important;font-size:40px;">NUEVO PROYECTO</h2>  
    </div>
    <div class="card-body">
    <?php
    include("components/FormProyectos.php");
 
?>
    </div>
</div>
</div>
</div>
    
<?php
 include('components/Footer.php');
 ?>

<script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
<script src="js/integrantes.js"></script>
<script src="js/main.js"></script>
</body>
</html>