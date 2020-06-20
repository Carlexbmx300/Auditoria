<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];
//$id_visita = $_REQUEST['id_visita'];
$query = "SELECT * from origen where origen.id_proyecto= '$id'";
$query1 = "SELECT * from visita where visita.id_proyecto= '$id'";
$query2 = "SELECT * from objetivog where objetivog.id_proyecto= '$id'";
$query3 = "SELECT * from objetivoe where objetivoe.id_proyecto= '$id'";

$resultado = mysqli_query($conexion, $query);
$resultado1 = mysqli_query($conexion, $query1);
$resultado2 = mysqli_query($conexion, $query2);
$resultado3 = mysqli_query($conexion, $query3);
$con = 1;
$con2 = 1;
$con3= 1;
$con4=1;
?>






<div class="container fluid">
    <form action="components/ProcesoModificarOrigen.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">

                <h4>MODIFICAR Origen</h4>

                <?php
                while($row=$resultado->fetch_assoc()){



                    ?>
                    <div class="md-form">
                        <input type="hidden" name="id" value="<?php echo $row['id_origen']; ?>">
                        <?php 
                        echo "Origen"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="origen"><?php echo $row['contenido']; ?></textarea>
                        
                    </div>



                    <?php
                    $con++;
                }
                
                ?>
                <h4>MODIFICAR VISITA</h4>

                <?php
                while($row2=$resultado1->fetch_assoc()){
                    $con2++;
                    ?>
                    <div class="md-form">
                        <input type="hidden" value="<?php echo $row2['id_visita'] ?>" name="<?php echo 'idv'.$con2 ?>">
                        <?php
                        echo "Titulo de la visita"
                        ?>
                        <input type="text" id="form7" class="form-control" name="<?php echo 'titulo'.$con2;?>" value="<?php echo $row2['titulo']; ?>">
                        <?php
                        echo "Contenido"
                        ?>

                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'contenido'.$con2;?>" ><?php echo $row2['contenido']; ?></textarea>


                    </div>



                    <?php

                }

                ?>
                <h4>MODIFICAR OBJETIVO GENERAL</h4>

                <?php
                while($row3=$resultado2->fetch_assoc()){



                    ?>
                    <div class="md-form">
                        <input type="hidden" name="idog" value="<?php echo $row3['id_objetivo']; ?>">
                        <?php
                        echo "Objetivo"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="objetivog"><?php echo $row3['contenido']; ?></textarea>


                    </div>



                    <?php
                    $con3++;
                }

                ?>
                <h4>MODIFICAR OBJETIVOS ESPECIFICOS</h4>

                <?php
                while($row4=$resultado3->fetch_assoc()){
                    $con4++;

                    ?>
                    <div class="md-form">
                        <input type="hidden" value="<?php echo $row4['id_objetivo'] ?>" name="<?php echo 'idoe'.$con4 ?>">
                        <?php
                        echo "Contenido"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="<?php echo 'contenidooe'.$con4;?>" ><?php echo $row4['contenido']; ?></textarea>


                    </div>



                    <?php

                }

                ?>
                <input type="hidden" value="<?php echo $con2 ?>" name="numv">
                <input type="hidden" value="<?php echo $con4 ?>" name="numoe">
                <input type="hidden" name="ido" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-success">MODIFICAR</button>
            </div>


        </div>
    </form>
    
</div>



