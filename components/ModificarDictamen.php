<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];

$query = "SELECT * from dictamen where dictamen.id_proyecto= '$id'";
$resultado = mysqli_query($conexion, $query);
$con = 1;


?>

<div class="container fluid">
    <form action="components/ProcesoModificarDictamen.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">
                <h4>MODIFICAR DICTAMEN</h4>
                <?php
                while($row=$resultado->fetch_assoc()){
                    $con++;

                    ?>
                    <div class="md-form">
                        <input type="hidden" value="<?php echo $row['id_dictamen'] ?>" name="<?php echo 'id_dictamen'.$con ?>">
                        <?php
                        echo "Para"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'para'.$con;?>" ><?php echo $row['para']; ?></textarea>
                        <?php
                        echo "De"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'de'.$con;?>" ><?php echo $row['de']; ?></textarea>
                        <?php
                        echo "Proyecto"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'proyecto'.$con;?>" ><?php echo $row['proyecto']; ?></textarea>
                        <?php
                        echo "Fecha"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'fecha'.$con;?>" ><?php echo $row['fecha']; ?></textarea>
                        <?php
                        echo "Dictamen"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'contenido'.$con;?>" ><?php echo $row['contenido']; ?></textarea>



                    </div>



                    <?php

                }

                ?>

            </div>



        </div>
        <input type="hidden" value="<?php echo $con ?>" name="numdic">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success">MODIFICAR</button>
    </form>

</div>