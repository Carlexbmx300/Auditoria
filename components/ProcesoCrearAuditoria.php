<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id=$_POST['ida'];
$titulo = $_POST['titulo'];
$numero=$_POST['numeroAlc'];
$numero2=$_POST['numeroobj'];
$numero3=$_POST['numeroinf'];

$query = "INSERT into elementos (contenido, id_proyecto) values ('$titulo', '$id')";
$res = mysqli_query($conexion, $query);
if(!$res){

    echo "no se inserto";
}else{
$query2 = "SELECT max(id_el) as id from elementos";
$res2 = mysqli_query($conexion, $query2);
$row = $res2 ->fetch_assoc();
$idau = $row['id'];
for ($i = 1 ; $i <= $numero ; $i++){
    $alcance = $_POST['alcance'.$i];
    $query3= "INSERT into alcance (contenido, id_el, id_proyecto) values ('$alcance', '$idau', '$id')";
    $res3 = mysqli_query($conexion, $query3); 
}
for($j = 1 ; $j <= $numero2 ; $j++){
   $objetivo = $_POST['objetivo'.$j];
   $query4 = "INSERT into objetivoa(contenido, id_el, id_proyecto) values ('$objetivo', '$idau', '$id')";
   $res4 = mysqli_query($conexion, $query4); 
}  

for($x = 1 ; $x <= $numero3 ; $x++){
    $informe = $_POST['informe'.$x];
    $query5 = "INSERT into informe(contenido, id_el, id_proyecto) values ('$informe', '$idau', '$id')";
    $res5 = mysqli_query($conexion, $query5);
}
echo "<script>
alert('se guardo');
window.location.href='../ListaProyectos.php';
</script>";
}



?>