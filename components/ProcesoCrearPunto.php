    <?php
    include('Conexion.php');
    $conexion->set_charset('utf8');
    $id = $_POST['ida'];
    $numero = $_POST['numeroP'];


    for($i=1 ; $i <= $numero ; $i++ ){

    $contenido = $_POST['punto'.$i];    
    $query = "INSERT into puntos (contenido, id_proyecto) values ('$contenido', '$id')";
    $respuesta = mysqli_query($conexion, $query);
    }
    echo "<script>
    alert('se guardo');
    window.location.href='../ListaProyectos.php';
    </script>";
    ?>

