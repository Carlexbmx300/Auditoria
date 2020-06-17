<?php 
include("Conexion.php");
$conexion->set_charset('utf8');
$id=$_POST['ida'];
$situacion=$_POST['situacion'];
$causa = $_POST['causa'];
$solucion = $_POST['solucion'];
$fecha=$_POST['fecha'];
$responsable=$_POST['responsable'];
$evidencia = $_POST['evidencia'];


$query= "INSERT into desviacion (situacion, causa, solucion, fecha, responsable, evidencia, id_proyecto) values ('$situacion', '$causa', '$solucion','$fecha', '$responsable','$evidencia','$id')";
$res = mysqli_query($conexion, $query);
if(!$res){
    echo "no se inserto";
}else{
    echo "<script>
alert('se guardo');
window.location.href='../ListaProyectos.php';
</script>";
}



?>

