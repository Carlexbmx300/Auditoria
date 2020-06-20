<?php   
$usuario=$_POST['user'];
$password=$_POST['pass'];

include("components/Conexion.php");
$consulta="SELECT * FROM usuario where user ='$usuario' and password='$password'";
$resultado=mysqli_query($conexion, $consulta);

$filasM=mysqli_num_rows($resultado);
if($filasM>0)
{
    session_start();
    $_SESSION['usuario']=$usuario;
    header("location:Principal.php");    
}
else{
    echo "<script>
    alert('DATOS INCORRECTOS');
    window.history.back();
    </script>";

}



mysqli_free_result($resultado);
mysqli_free_result($resultadoE);
mysqli_free_result($resultadoA);
mysqli_close($conexion);