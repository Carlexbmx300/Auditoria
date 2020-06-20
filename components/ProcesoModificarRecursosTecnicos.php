<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$numt = $_POST['numt'];

for($i = 0 ; $i <= $numt ; $i++){
    $recurso = $_POST['recurso'.$i];
    $id_tec = $_POST['id_tec'.$i];
    $query = "UPDATE tecnicos set recurso = '$recurso' where tecnicos.id_proyecto = '$id' and id_tec = '$id_tec'";
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