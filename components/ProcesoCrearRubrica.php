<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id=$_POST['ida'];
$numero=$_POST['numeroA'];


for($i = 1 ; $i <= $numero ; $i++){
$aspecto = $_POST['aspecto'.$i];
$porcentaje= $_POST['porcentaje'.$i];
$query="INSERT into rubrica (estado, porcentaje, id_proyecto) values ('$aspecto', '$porcentaje', '$id')";
$res = mysqli_query($conexion, $query);
}
echo "<script>
alert('se guardo');
window.location.href='../ListaProyectos.php';
</script>";





?>