<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$numin = $_POST['numin'];

for($i = 0 ; $i <= $numin ; $i++){
    $informe = $_POST['informe'.$i];
    $id_in = $_POST['id_in'.$i];
    $query = "UPDATE informe set contenido = '$informe' where informe.id_proyecto = '$id' and id_in = 'id_in'";
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