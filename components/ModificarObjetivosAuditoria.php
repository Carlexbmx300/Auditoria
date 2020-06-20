<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];
$id_obja = $_REQUEST['id_obja'];
$query = "SELECT * from objetivoa where objetivoa.id_proyecto= '$id'";
$resultado = mysqli_query($conexion, $query);
$con = 1;


?>

<div class="container fluid">
    <form action="components/ProcesoModificarObjetivosAuditoria.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">
                <h4>MODIFICAR OBJETIVOS AUDITORIA</h4>
                <?php
                while($row=$resultado->fetch_assoc()){
                    $con++;

                    ?>
                    <div class="md-form">
                        <input type="hidden" value="<?php echo $row['id_obja'] ?>" name="<?php echo 'id_obja'.$con ?>">
                        <?php
                        echo "Objetivo"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'objetivo'.$con;?>" ><?php echo $row['contenido']; ?></textarea>


                    </div>



                    <?php

                }

                ?>

            </div>



        </div>
        <input type="hidden" value="<?php echo $con ?>" name="numoa">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success">MODIFICAR</button>
    </form>

</div>