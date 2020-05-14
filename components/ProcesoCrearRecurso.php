<?php
 include('Conexion.php');
 $conexion->set_charset('utf8');
 $id = $_POST['ida'];
 $numeroEco=$_POST['numeroEco'];
 $numeroTec = $_POST['numeroTec'];

 for ($i=1; $i <= $numeroTec ; $i++) { 
     $tecnico = $_POST['tecnico'.$i];
     $query1= "INSERT into tecnicos (recurso, id_proyecto) values ('$tecnico', '$id')";
     $res = mysqli_query($conexion, $query1);
 }
for ($j=1; $j <=$numeroEco ; $j++) {

    $economico = $_POST['economico'.$j];
    $costo = $_POST['costo'.$j];
    $query2 = "INSERT into economico(recurso, costo, id_proyecto) values ('$economico','$costo','$id')";
    $res2 = mysqli_query($conexion,$query2);

}
echo "<script>
    alert('se guardo');
    window.location.href='../ListaProyectos.php';
    </script>";
?>