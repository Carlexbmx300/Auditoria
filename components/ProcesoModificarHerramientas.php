<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$numhe = $_POST['numhe'];

for($i = 0 ; $i <= $numhe ; $i++){
    $contenido = $_POST['contenido'.$i];
    $idhe = $_POST['idhe'.$i];
    $query = "UPDATE herramienta set contenido = '$contenido' where herramienta.id_proyecto = '$id' and id_he = '$idhe'";
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