<?php
session_start();
$varsesion=$_SESSION['usuario'];
if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorizacion';
    die();
}
session_destroy();
header("location:index.php");
?>
