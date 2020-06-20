<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$nump = $_POST['nump'];

for($i = 0 ; $i <= $nump ; $i++){
    $contenido = $_POST['contenido'.$i];
    $idp = $_POST['idp'.$i];
    $query = "UPDATE puntos set contenido = '$contenido' where puntos.id_proyecto = '$id' and id_punto = '$idp'";
    $resultado = mysqli_query($conexion, $query);
}

if(!$resultado){
    echo 'no se modifico';
}else{
    echo "<script>
    alert('introduccion modificada correctamente');
    window.location.href='../ListaProyectos.php';
    </script>";
}



?>