<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$numades = $_POST['numades'];

for($i = 0 ; $i <= $numades ; $i++){
    $situacion = $_POST['situacion'.$i];
    $causa = $_POST['causa'.$i];
    $solucion = $_POST['solucion'.$i];
    $fecha = $_POST['fecha'.$i];
    $responsable = $_POST['responsable'.$i];
    $evidencia = $_POST['evidencia'.$i];
    $id_des = $_POST['id_des'.$i];
    $query = "UPDATE desviacion set situacion = '$situacion', causa ='$causa', solucion = '$solucion', fecha = '$fecha', responsable = '$responsable', evidencia = '$evidencia' where desviacion.id_proyecto = '$id' and id_des = '$id_des'";
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