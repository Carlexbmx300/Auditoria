<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];

$query = "SELECT * from guia where guia.id_proyecto= '$id'";
$resultado = mysqli_query($conexion, $query);

$con = 1;


?>

<div class="container fluid">
    <form action="components/ProcesoModificarGuias.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">
                <h4>MODIFICAR GUIIA</h4>
                <?php
                while($row=$resultado->fetch_assoc()){
                    $con++;

                    ?>
                    <div class="md-form">
                        <input type="hidden" value="<?php echo $row['id_guia'] ?>" name="<?php echo 'id_guia'.$con ?>">
                        <?php
                        echo "Codigo"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'codigo'.$con;?>" ><?php echo $row['codigo']; ?></textarea>
                        <?php
                        echo "punto"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'punto'.$con;?>" ><?php echo $row['punto']; ?></textarea>
                        <?php
                        echo "guia"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'guia'.$con;?>" ><?php echo $row['guia']; ?></textarea>
                        <?php
                        echo "actividad"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'actividad'.$con;?>" ><?php echo $row['actividad']; ?></textarea>
                        <?php
                        echo "Procedimiento"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'procedimiento'.$con;?>" ><?php echo $row['procedimiento']; ?></textarea>
                        <?php
                        echo "herramienta"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'herramienta'.$con;?>" ><?php echo $row['herramienta']; ?></textarea>
                        <?php
                        echo "tecnica"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'tecnica'.$con;?>" ><?php echo $row['tecnica']; ?></textarea>
                        <?php
                        echo "porcentaje"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'porcentaje'.$con;?>" ><?php echo $row['porcentaje']; ?></textarea>
                        <?php
                        echo "obervacion"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'observacion'.$con;?>" ><?php echo $row['observacion']; ?></textarea>

                    </div>



                    <?php

                }

                ?>

            </div>



        </div>
        <input type="hidden" value="<?php echo $con ?>" name="numgu">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success">MODIFICAR</button>
    </form>

</div>