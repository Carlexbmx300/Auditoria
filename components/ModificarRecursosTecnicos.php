<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];

$query = "SELECT * from tecnicos where tecnicos.id_proyecto= '$id'";


$resultado = mysqli_query($conexion, $query);

$con = 1;


?>

<div class="container fluid">
    <form action="components/ProcesoModificarRecursosTecnicos.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">
                <h4>MODIFICAR RECURSOS TECNICOS</h4>
                <?php
                while($row=$resultado->fetch_assoc()){
                    $con++;

                    ?>
                    <div class="md-form">
                        <input type="hidden" value="<?php echo $row['id_tec'] ?>" name="<?php echo 'id_tec'.$con ?>">
                        <?php
                        echo "recurso"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'recurso'.$con;?>" ><?php echo $row['recurso']; ?></textarea>


                    </div>



                    <?php

                }

                ?>

            </div>



        </div>
        <input type="hidden" value="<?php echo $con ?>" name="numt">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success">MODIFICAR</button>
    </form>

</div>