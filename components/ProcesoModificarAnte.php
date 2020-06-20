<?php
header("Content-Type: text/html;charset=utf-8");
include("Conexion.php");
$conexion->set_charset('utf8');
$ida = $_POST['ida'];
$id = $_POST['id'];
$id_gen = $_POST['id_gen'];
//
$aspecto=$_POST['aspecto'];
$mision=$_POST['mision'];
$vision=$_POST['vision'];
$query = "UPDATE antecedentes set aspecto = '$aspecto', mision = '$mision', vision = '$vision' where antecedentes.id_proyecto = '$ida' and id_ante='$id'";
$resultado = mysqli_query($conexion, $query);
if(!$resultado){
    echo 'no se modifico';
}else{
    echo "<script>
    alert('introduccion modificada correctamente');
    window.location.href='../ListaProyectos.php';
    </script>";
}
$pais = $_POST['pais'];
$departamento = $_POST['departamento'];
$provincia = $_POST['provincia'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$fax = $_POST['fax'];
$query2 = "UPDATE generalidades set pais = '$pais', departamento = '$departamento', provincia = '$provincia', direccion = '$direccion', telefono = '$telefono', fax = 'fax' where  generalidades.id_proyecto = '$ida' and id_gen = '$id_gen'";
$resultado2 = mysqli_query($conexion, $query2);
if(!$resultado2){
    echo 'no se modifico';
}else{
    echo "<script>
    alert('introduccion modificada correctamente');
    window.location.href='../ListaProyectos.php';
    </script>";
}
?>