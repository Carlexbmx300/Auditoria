<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];

$query = "SELECT * from economico where economico.id_proyecto= '$id'";


$resultado = mysqli_query($conexion, $query);

$con = 1;


?>

<div class="container fluid">
    <form action="components/ProcesoModificarRecursosEconomicos.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">
                <h4>MODIFICAR RECURSOS ECONOMICOS</h4>
                <?php
                while($row=$resultado->fetch_assoc()){
                    $con++;

                    ?>
                    <div class="md-form">
                        <input type="hidden" value="<?php echo $row['id_eco'] ?>" name="<?php echo 'id_eco'.$con ?>">
                        <?php
                        echo "recurso"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'recurso'.$con;?>" ><?php echo $row['recurso']; ?></textarea>
                        <?php
                        echo "costo"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'costo'.$con;?>" ><?php echo $row['costo']; ?></textarea>


                    </div>



                    <?php

                }

                ?>

            </div>



        </div>
        <input type="hidden" value="<?php echo $con ?>" name="numec">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success">MODIFICAR</button>
    </form>

</div>