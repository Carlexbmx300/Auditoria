<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$numec = $_POST['numec'];

for($i = 0 ; $i <= $numec ; $i++){
    $recurso = $_POST['recurso'.$i];
    $costo = $_POST['costo'.$i];
    $id_eco = $_POST['id_eco'.$i];
    $query = "UPDATE economico set recurso = '$recurso', costo = '$costo' where economico.id_proyecto = '$id' and id_eco = 'id_eco'";
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