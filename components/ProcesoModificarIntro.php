<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$idp = $_POST['idp'];
$numero = $_POST['numero'];

for($i= 1 ; $i <= $numero ; $i++)
{
$contenido=$_POST['intro'.$i];
$id = $_POST['id'.$i];
$query = "UPDATE introduccion set contenido = '$contenido' where introduccion.id_proyecto = '$idp' and id_introduccion='$id'";
$resultado = mysqli_query($conexion, $query);
if(!$resultado){
    echo 'no se modifico';
}else{
    echo "<script>
    alert('introduccion modificada correctamente');
    window.location.href='../ListaProyectos.php';
    </script>";
}

}


?>