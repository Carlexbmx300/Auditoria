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
<link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <?php
    include('components/Navbar.php');

    ?>
    <div class="container mt-5">
            <div class="row justify-content-xl-center">
            <div class="col-xl-12 text-center">
            <h1>MIS PROYECTOS</h1>  
            </div>
            </div>
            </div>
            <?php
            include("components/Conexion.php");
            $query="SELECT * from proyecto";
            $resultado = mysqli_query($conexion, $query);

            while($row=$resultado->fetch_assoc()){

            $id= $row['id_proyecto'];
        ?>
            <div class="container mt-5">
            <div class="row">
            <div class="col-xl-2">
            <h4>
            <?php
            echo $row['nombre'];
            ?>
            </h4>

        
            </div>
            
            <div class="col-xl-6 logo ">
            <img src="upload/<?php echo $row['imagen'];?>" alt="">
            </div>
            <div class="col-xl-2">
            <?php
            $query2="SELECT * from integrante where integrante.id_proyecto='$id'";
            $resultado2= mysqli_query($conexion, $query2);
            while($row2 = $resultado2->fetch_assoc()){
                echo "<P>".$row2['nombre']."</P>";
            }
            
            ?>
            </div>
            <div class="col-xl-2">
                <div class="operaciones">
                <li><a  href="Contenido.php?id_proyecto=<?php echo $row['id_proyecto'];?>"><i class="fas fa-book mr-2"></i>CONTENIDO</a></li>
                <li><a href="components/Documento.php?id_proyecto=<?php echo $row['id_proyecto'];?>"><i class="far fa-file-alt mr-2"></i>VISTA PREVIA</a></li>
                <li><a href=""><i class="fas fa-times mr-2"></i>ELIMINAR</a></li>
                
            
            
                </div>
            </div>
            </div>
    </div>



   <?php
    }
   ?>



    

<script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
<script src="js/integrantes.js"></script>
<script src="js/main.js"></script>
</body>
</html>