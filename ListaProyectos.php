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
<link rel="stylesheet" href="css/listaProyectos.css">
    <title>Document</title>
</head>
<body>
    <?php
    include('components/Navbar.php');

    ?>
    <div class="container mt-5">
            <div class="row justify-content-xl-center">
            <div class="col-xl-12 text-center">
            <h1 style="font-family:'lucida calligraphy','Arial'">MIS PROYECTOS</h1>
            </div>
            </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2">
            <?php
            include("components/Conexion.php");
            $query="SELECT * from proyecto";
            $resultado = mysqli_query($conexion, $query);

            while($row=$resultado->fetch_assoc()){

            $id= $row['id_proyecto'];
            ?>
             <div class="container item ">
                <div class="box  mb-4">
                    <div class="card ">
                        <img src="upload/<?php echo $row['imagen'];?>" class="card-img-top" alt=""> 
                    </div>
                    <div class="content">
                        <h4 class="card-title  text-center" style="color:black;font-family:Arial Black;"><?php echo $row['nombre'];?></h4>
                        <div class="card-footer ">
                            <h5 class="text-muted">INTEGRANTES</h5>
                        </div>
                            <?php
                        $query2="SELECT * from integrante where integrante.id_proyecto='$id'";
                        $resultado2= mysqli_query($conexion, $query2);
                        while($row2 = $resultado2->fetch_assoc()){
                            echo "<h4 class='card-text text-center'>".$row2['nombre']."</h4>";
                        } 
                        ?>
                        <a  href="Contenido.php?id_proyecto=<?php echo $row['id_proyecto'];?>"class="btn blue-gradient  waves-effect mx-auto d-block"><i ></i>CONTENIDO</a></li>
                        <a href="components/Documento.php?id_proyecto=<?php echo $row['id_proyecto'];?>" class="btn blue-gradient darken-4 mx-auto d-block"><i class="far fa-file-alt mr-2"></i>VISTA PREVIA</a></li>
                        <a href="ModificarProyecto.php?id_proyecto=<?php echo $row['id_proyecto'];?>"class="btn blue-gradient mx-auto d-block"><i class="far fa-edit mr-2"></i>MODIFICAR</a>
                        <a href=""class="btn blue-gradient mx-auto d-block" ><i class="fas fa-times mr-2" ></i>ELIMINAR</a></li>
                    
                    </div>
                </div>
            </div>



   <?php
    }
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