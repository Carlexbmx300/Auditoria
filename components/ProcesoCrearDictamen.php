<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$de = $_POST['de'];
$para = $_POST['para'];
$pro = $_POST['proyecto'];
$id = $_POST['ida'];
$fecha = $_POST['fecha'];
$contenido = $_POST['contenido'];

$query = "INSERT into dictamen(de, para, proyecto, fecha, contenido, id_proyecto) values ('$de','$para','$pro', '$fecha', '$contenido', '$id')";
$res = mysqli_query($conexion,$query);
if (!$res){
    echo 'no se inserto';

}
else{
    echo "<script>
    alert('se guardo');
    window.location.href='../ListaProyectos.php';
    </script>";

}



?>