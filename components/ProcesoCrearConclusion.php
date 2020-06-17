<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id=$_POST['ida'];

$tarea = $_POST['tarea'];
$con = $_POST['con'];
$sol = $_POST['solucion'];
$rec = $_POST['reco'];


$query = "INSERT into conclusion (tarea, con, sol, recomendacion, id_proyecto) values ('$tarea','$con','$sol','$rec','$id')";
$res = mysqli_query($conexion, $query);
if (!$res){
    echo 'no se inserto';

}
else{
    echo "<script>
    alert('se guardo');
    window.location.href='../ListaProyectos.php';
    </script>";

}



?>