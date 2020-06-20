
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
$idu = $row['id_usuario'];
$nombre=$row['nombre'];
$apellido=$row['apellido'];
?>
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
<link rel="stylesheet" href="css/index.css">

<link rel="stylesheet" href="css/listaProyectos.css">
    <title>Document</title>
</head>
<body>
    <?php
    include('components/Navbar.php');
    include('Clases/Progreso.php');
    $progres = new Progreso();
    $pt = new ProgresoTotal();
 
  

    ?>

        <div class="container-fluid mt-5 contenedor-list">
            <div class="row justify-content-xl-center">
                <div class="col-xl-12 text-center">
                <h1>MIS PROYECTOS</h1>
                </div>
            </div>
            </div>
            <div class="cards-list row">
            <?php
            include("components/Conexion.php");
            $query="SELECT * from proyecto where id_usuario='$idu'";
            $resultado = mysqli_query($conexion, $query);
            $cona=0;
            while($row=$resultado->fetch_assoc()){
            $cona++;
            $id= $row['id_proyecto'];
           
            ?>
           
 
            <div class="col col-xl-4 col-12 mb-5">
                <div class="card card-cascade card-list">

<!-- Card image -->
                        <div class="view view-cascade overlay">
                            <img class="card-img-top" src="upload/<?php echo $row['imagen'];?>" alt="Card image cap">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

<!-- Card content -->
                <div class="card-body card-body-cascade text-center">

<!-- Title -->
                        <h4 class="card-title mt-n5 position-relative h4-responsive"><strong><?php echo $row['nombre'];?></strong></h4>
                        <!-- Subtitle -->
                        <div class="sub">
                        <h6 class=" indigo-text py-2"><i class="far fa-clipboard fa-2x float-left"></i> <a href="components/Documento.php?id_proyecto=<?php echo $row['id_proyecto'];?>"></i>VISTA PREVIA</a></li></h6>
                        </div>
                        <div class="sub">
                        <h6 class=" indigo-text py-2"><i class="far fa-file-alt fa-2x float-left"></i>  <a  href="Contenido.php?id_proyecto=<?php echo $row['id_proyecto'];?>"><i ></i>CONTENIDO</a></li></h6>
                        </div>
                        <div class="sub">
                        <h6 class=" indigo-text py-2"><i class="far fa-edit fa-2x float-left"></i><a href="ModificarProyecto.php?id_proyecto=<?php echo $row['id_proyecto'];?>"></i>MODIFICAR</a></h6>
                        </div>
                        <div class="sub">
                        <h6 class=" indigo-text py-2"><i class="far fa-file-excel fa-2x float-left"></i></i> <a href="" ></i>ELIMINAR</a></li></h6>
                        </div>
<!-- Text -->

                </div>

<!-- Card footer -->
                <div class="card-footer text-muted text-center">
                Progreso : <?php echo $row['progreso'].'%'?>
                </div>

            </div>
        </div>






            <?php
                }
            ?>
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