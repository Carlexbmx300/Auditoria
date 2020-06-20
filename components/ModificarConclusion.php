<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];

$query = "SELECT * from conclusion where conclusion.id_proyecto= '$id'";
$resultado = mysqli_query($conexion, $query);
$con = 1;


?>

<div class="container fluid">
    <form action="components/ProcesoModificarConclusion.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">
                <h4>MODIFICAR CONCLUSIOM</h4>
                <?php
                while($row=$resultado->fetch_assoc()){
                    $con++;

                    ?>
                    <div class="md-form">
                        <input type="hidden" value="<?php echo $row['id_con'] ?>" name="<?php echo 'id_con'.$con ?>">
                        <?php
                        echo "Tarea"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'tarea'.$con;?>" ><?php echo $row['tarea']; ?></textarea>
                        <?php
                        echo "Conclusiones"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'con'.$con;?>" ><?php echo $row['con']; ?></textarea>
                        <?php
                        echo "Soluciones"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'sol'.$con;?>" ><?php echo $row['sol']; ?></textarea>
                        <?php
                        echo "Recomendaciones"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'recomendacion'.$con;?>" ><?php echo $row['recomendacion']; ?></textarea>




                    </div>



                    <?php

                }

                ?>

            </div>



        </div>
        <input type="hidden" value="<?php echo $con ?>" name="numcon">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success">MODIFICAR</button>
    </form>

</div>