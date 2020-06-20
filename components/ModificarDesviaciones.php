<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];

$query = "SELECT * from desviacion where desviacion.id_proyecto= '$id'";
$resultado = mysqli_query($conexion, $query);
$con = 1;


?>

<div class="container fluid">
    <form action="components/ProcesoModificarDesviaciones.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">
                <h4>MODIFICAR DESVIACION</h4>
                <?php
                while($row=$resultado->fetch_assoc()){
                    $con++;

                    ?>
                    <div class="md-form">
                        <input type="hidden" value="<?php echo $row['id_des'] ?>" name="<?php echo 'id_des'.$con ?>">
                        <?php
                        echo "Situacion"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'situacion'.$con;?>" ><?php echo $row['situacion']; ?></textarea>
                        <?php
                        echo "Causa"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'causa'.$con;?>" ><?php echo $row['causa']; ?></textarea>
                        <?php
                        echo "solucion"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'solucion'.$con;?>" ><?php echo $row['solucion']; ?></textarea>
                        <?php
                        echo "Fecha"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'fecha'.$con;?>" ><?php echo $row['fecha']; ?></textarea>
                        <?php
                        echo "Responsable"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'responsable'.$con;?>" ><?php echo $row['responsable']; ?></textarea>
                        <?php
                        echo "Evidencia"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'evidencia'.$con;?>" ><?php echo $row['evidencia']; ?></textarea>
                        <br><br><br>


                    </div>



                    <?php

                }

                ?>

            </div>



        </div>
        <input type="hidden" value="<?php echo $con ?>" name="numades">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success">MODIFICAR</button>
    </form>

</div>