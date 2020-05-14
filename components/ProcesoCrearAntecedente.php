<?php
include('Conexion.php');
$conexion->set_charset('utf8');
$id=$_POST['ida'];
$aspecto = $_POST['aspecto'];
$mision = $_POST['mision'];
$vision = $_POST['vision'];
$pais = $_POST['pais'];
$departamento = $_POST['departamento'];
$provincia = $_POST['provincia'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$fax = $_POST['fax'];

$query = "INSERT into antecedentes (aspecto, mision, vision, id_proyecto) values ('$aspecto','$mision','$vision','$id')";
$resultado = mysqli_query($conexion, $query);
$query2 = "INSERT into generalidades (pais, departamento, provincia, direccion, telefono, fax, id_proyecto) values ('$pais','$departamento','$provincia','$direccion','$telefono','$fax','$id')";
$res2 =mysqli_query($conexion, $query2);
if(!$res2){
    echo 'no se inserto';
}
else{
    echo "<script>
    alert('se guardo');
    window.location.href='../ListaProyectos.php';
    </script>";
}

?>