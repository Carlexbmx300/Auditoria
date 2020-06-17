<?php 
include('Conexion.php');
$conexion->set_charset('utf8');
$id = $_POST['ida'];
$codigo = $_POST['codigo'];
$punto = $_POST['punto'];
$guia = $_POST['guia'];
$actividad = $_POST['actividad'];
$procedimiento = $_POST['procedimiento'];
$herramienta = $_POST['herramienta'];
$tecnica = $_POST['tecnica'];
$porcentaje = $_POST['porcentaje'];
$observacion = $_POST['observacion'];

$query = "INSERT into guia(codigo, punto, guia, actividad, procedimiento, herramienta, tecnica,  porcentaje, observacion, id_proyecto) values ('$codigo','$punto','$guia','$actividad','$procedimiento','$herramienta','$tecnica','$porcentaje','$observacion','$id')";
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