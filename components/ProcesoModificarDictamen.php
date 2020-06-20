<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$numdic = $_POST['numdic'];

for($i = 0 ; $i <= $numdic ; $i++){
    $para = $_POST['para'.$i];
    $de = $_POST['de'.$i];
    $proyecto = $_POST['proyecto'.$i];
    $fecha = $_POST['fecha'.$i];
    $contenido = $_POST['contenido'.$i];
    $id_dictamen = $_POST['id_dictamen'.$i];
    $query = "UPDATE dictamen set para = '$para', de ='$de', proyecto = '$proyecto', fecha = '$fecha', contenido = '$contenido' where dictamen.id_proyecto = '$id' and id_dictamen = '$id_dictamen'";
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