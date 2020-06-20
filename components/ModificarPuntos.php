<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];

$query = "SELECT * from puntos where puntos.id_proyecto= '$id'";


$resultado = mysqli_query($conexion, $query);

$con = 1;


?>

<div class="container fluid">
    <form action="components/ProcesoModificarPuntos.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">

            </div>
            <h4>MODIFICAR PUNTOS</h4>

            <?php
            while($row=$resultado->fetch_assoc()){
                $con++;

                ?>
                <div class="md-form">
                    <input type="hidden" value="<?php echo $row['id_punto'] ?>" name="<?php echo 'idp'.$con ?>">
                    <?php
                    echo "Contenido"
                    ?>
                    <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'contenido'.$con;?>" ><?php echo $row['contenido']; ?></textarea>


                </div>



                <?php

            }

            ?>
            <input type="hidden" value="<?php echo $con ?>" name="nump">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-success">MODIFICAR</button>


        </div>
    </form>

</div>
