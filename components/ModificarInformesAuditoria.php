<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];
$id_in = $_REQUEST['id_in'];
$query = "SELECT * from informe where informe.id_proyecto= '$id'";
$resultado = mysqli_query($conexion, $query);
$con = 1;


?>

<div class="container fluid">
    <form action="components/ProcesoModificarInformeAuditoria.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">
                <h4>MODIFICAR INFORMES AUDITORIA</h4>
                <?php
                while($row=$resultado->fetch_assoc()){
                    $con++;

                    ?>
                    <div class="md-form">
                        <input type="hidden" value="<?php echo $row['id_in'] ?>" name="<?php echo 'id_in'.$con ?>">
                        <?php
                        echo "Informe"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'informe'.$con;?>" ><?php echo $row['contenido']; ?></textarea>


                    </div>



                    <?php

                }

                ?>

            </div>



        </div>
        <input type="hidden" value="<?php echo $con ?>" name="numin">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success">MODIFICAR</button>
    </form>

</div>