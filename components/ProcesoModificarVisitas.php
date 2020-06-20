<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$idv = $_POST['idv'];
$id = $_POST['id'];

//
$titulo=$_POST['titulo'];
$contenido = $_POST['contenido'];


    $query = "UPDATE visita set titulo = '$titulo', contenido = '$contenido' where visita.id_proyecto = '$idv' and id_visita='$id'";
   
    $resultado = mysqli_query($conexion, $query);
   
if(!$resultado){
    echo 'no se modifico';
}else{
    echo "<script>
    alert('visita modificada correctamente');
    window.location.href='../ListaProyectos.php';
    </script>";
}



?>