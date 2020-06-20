<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$numal = $_POST['numal'];

for($i = 0 ; $i <= $numal ; $i++){
    $contenido = $_POST['contenido'.$i];
    $id_al = $_POST['id_al'.$i];
    $query = "UPDATE alcance set contenido = '$contenido' where alcance.id_proyecto = '$id' and id_al = '$id_al'";
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