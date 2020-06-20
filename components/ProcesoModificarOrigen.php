<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$ido = $_POST['ido'];//id del proyecto
$id = $_POST['id'];

$idog = $_POST['idog'];
$numv = $_POST['numv'];
$numoe = $_POST['numoe'];
//
$origen=$_POST['origen'];


$objetivog = $_POST['objetivog'];

    $query = "UPDATE origen set contenido = '$origen' where origen.id_proyecto = '$ido' and id_origen='$id'";
    $resultado = mysqli_query($conexion, $query);
for($i = 0 ; $i <= $numv ; $i++){
    $contenidov = $_POST['contenido'.$i];
    $tilulo = $_POST['titulo'.$i];
    $idv = $_POST['idv'.$i];
    $query1 = "UPDATE visita set titulo = '$tilulo', contenido = '$contenidov' where visita.id_proyecto = '$ido' and id_visita = '$idv'";
    $resultado1 = mysqli_query($conexion, $query1);
    }
    $query2 = "UPDATE objetivog set contenido = '$objetivog' where objetivog.id_proyecto = '$ido' and id_objetivo = '$idog'";
    $resultado2 = mysqli_query($conexion, $query2);
for($i = 0 ; $i <= $numoe ; $i++){
    $contenidooe = $_POST['contenidooe'.$i];
    $idoe = $_POST['idoe'.$i];
    $query3 = "UPDATE objetivoe set contenido = '$contenidooe' where objetivoe.id_proyecto = '$ido' and id_objetivo = '$idoe'";
    $resultado3 = mysqli_query($conexion, $query3);
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