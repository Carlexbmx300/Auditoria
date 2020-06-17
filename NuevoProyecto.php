

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <title>Document</title>
    <style>
    body{
    background: #dbdbdb;
}
.principal{
    margin-top:60px;
    font-family:'Roboto';
}
.card-header-first{
    margin-top:-30px;
    height:90px;
    background:linear-gradient(-90deg, #05756C, #0CBDAE);
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
    <div class="row row-cols-1 row-cols-xl-1">
<div class="card border-dark col md-8  text-center">
    <div class="card-header-first pb-5">
      <h2 class="card-header-title text-white pt-3" style="color:black;font-family:fantasy,arial;font-size:40px;">NUEVO PROYECTO</h2>  
    </div>
    <div class="card-body">
    <?php
    include("components/FormProyectos.php");
?>
    </div>
</div>
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