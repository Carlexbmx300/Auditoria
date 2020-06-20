<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/contenido.css">
<link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
    <?php
    include('components/Navbar.php');
    include('Clases/Progreso.php');   
    $progress = new Progreso();
    $pt = new ProgresoTotal();
    $id=$_REQUEST['id_proyecto'];
       ?>
   <br><br>
<h2 class="text-center mt-5" style="color:black;font-family:fantasy,arial;font-size:50px;">Introduzca el contenido <br> de su Proyecto</h2>



</div>
<div class="progress">
  <div class="progress-bar" style="width: 0%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>

       <?php
            
             include('components/Introduccion.php');
             include('components/Antecedentes.php');
           
             include('components/Origen.php');
             include('components/PuntosEvaluados.php');
             include('components/Cronograma.php');
             include('components/Herramientas.php');
             include('components/Guias.php');
             include('components/Recurso.php');
             include('components/Rubrica.php');
             include('components/Auditoria.php');
             include('components/Desviacion.php');
             include('components/Dictamen.php');
             include('components/Conclusion.php');
             
            
          
       ?>
        <input type="hidden" value="<?php echo $progress->mostrar() ?>" id="dato">
        <input type="hidden" value="<?php echo $id?>" id="idp">

   


    

<script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
<script src="js/integrantes.js"></script>
<script src="js/main.js"></script>
<script src="js/ProgressBar.js"></script>

</body>
</html>