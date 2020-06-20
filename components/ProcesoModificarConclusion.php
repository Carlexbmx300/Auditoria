<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$numcon = $_POST['numcon'];

for($i = 0 ; $i <= $numcon ; $i++){
    $tarea = $_POST['tarea'.$i];
    $con = $_POST['con'.$i];
    $sol = $_POST['sol'.$i];
    $recomendacion = $_POST['recomendacion'.$i];
    $id_con = $_POST['id_con'.$i];
    $query = "UPDATE conclusion set tarea = '$tarea', con ='$con', sol = '$sol', recomendacion = '$recomendacion' where conclusion.id_proyecto = '$id' and id_con = '$id_con'";
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