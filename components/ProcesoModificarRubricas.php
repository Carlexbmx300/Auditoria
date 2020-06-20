<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$numru = $_POST['numru'];

for($i = 0 ; $i <= $numru ; $i++){
    $estado = $_POST['estado'.$i];
    $porcentaje = $_POST['porcentaje'.$i];
    $id_ru = $_POST['id_ru'.$i];
    $query = "UPDATE rubrica set estado = '$estado', porcentaje = '$porcentaje' where rubrica.id_proyecto = '$id' and id_ru = '$id_ru'";
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