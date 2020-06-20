<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];

$query = "SELECT * from rubrica where rubrica.id_proyecto= '$id'";


$resultado = mysqli_query($conexion, $query);

$con = 1;


?>

<div class="container fluid">
    <form action="components/ProcesoModificarRubricas.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">
                <h4>MODIFICAR ASPECTOS</h4>
                <?php
                while($row=$resultado->fetch_assoc()){
                    $con++;

                    ?>
                    <div class="md-form">
                        <input type="hidden" value="<?php echo $row['id_ru'] ?>" name="<?php echo 'id_ru'.$con ?>">
                        <?php
                        echo "estado"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'estado'.$con;?>" ><?php echo $row['estado']; ?></textarea>
                        <?php
                        echo "porcentaje"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'porcentaje'.$con;?>" ><?php echo $row['porcentaje']; ?></textarea>


                    </div>



                    <?php

                }

                ?>

            </div>



        </div>
        <input type="hidden" value="<?php echo $con ?>" name="numru">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success">MODIFICAR</button>
    </form>

</div>