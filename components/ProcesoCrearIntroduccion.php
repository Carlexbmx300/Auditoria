<?php
include('Conexion.php');

$numero = $_POST['numero'];
$id= $_POST['id'];

for($i = 1 ; $i <= $numero ; $i++){

$intro = utf8_encode( $_POST['intro'.$i]);

$query= "INSERT into introduccion(contenido, id_proyecto) values ('$intro', '$id')";
$resultado = mysqli_query($conexion, $query);
/*if(!$resultado){
    echo 'no se inserto';

}
else{
    echo "<script>
    alert('introduccion insertada con exito !!!');
    window.location.href='../Contenido.php';
    </script>";
}*/
}

?>
