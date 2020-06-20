<?php

include("Components/Conexion.php");
$progreso = $_POST['progreso'];
$id = $_POST['id'];

$query = "UPDATE proyecto set progreso='$progreso' where id_proyecto='$id'";
$res = mysqli_query($conexion,$query);


?>