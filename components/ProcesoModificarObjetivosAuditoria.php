<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$id = $_POST['id'];
$numoa = $_POST['numoa'];

for($i = 0 ; $i <= $numoa ; $i++){
    $objetivo = $_POST['objetivo'.$i];
    $id_obja = $_POST['id_obja'.$i];
    $query = "UPDATE objetivoa set contenido = '$objetivo' where objetivoa.id_proyecto = '$id' and id_obja = '$id_obja'";
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