<?php
include("Conexion.php");
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email = $_POST['email'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$query = "INSERT INTO usuario (nombre,apellido,email,user,password)values('$nombre','$apellido','$email','$user','$pass')";
$res = mysqli_query($conexion,$query);
if(!$res){
    echo 'no se inserto';
}
else{
    echo "<script>
    alert('se guardo');
    window.location.href='../index.php';
    </script>";
}
?>