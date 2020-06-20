<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$numgu = $_POST['numgu'];

for($i = 0 ; $i <= $numgu ; $i++){
    $codigo = $_POST['codigo'.$i];
    $id_guia = $_POST['id_guia'.$i];
    $punto = $_POST['punto'.$i];
    $guia = $_POST['guia'.$i];
    $actividad = $_POST['actividad'.$i];
    $procedimiento = $_POST['procedimiento'.$i];
    $herramienta = $_POST['herramienta'.$i];
    $tecnica = $_POST['tecnica'.$i];
    $porcentaje = $_POST['porcentaje'.$i];
    $observacion = $_POST['observacion'.$i];
    $query = "UPDATE guia set codigo = '$codigo', punto = '$punto', guia = '$guia', actividad = '$actividad', procedimiento = '$procedimiento', herramienta = '$herramienta',
                tecnica = '$tecnica', porcentaje = '$porcentaje', observacion = '$observacion' where guia.id_proyecto = '$id' and id_guia = '$id_guia'";
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