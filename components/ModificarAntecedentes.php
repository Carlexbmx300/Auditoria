<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];
$query = "SELECT * from antecedentes where antecedentes.id_proyecto= '$id'";
$resultado = mysqli_query($conexion, $query);
$query2 = "SELECT * FROM generalidades where generalidades.id_proyecto= '$id'";
$resultado2 = mysqli_query($conexion, $query2);
$con = 1;
$con2 = 1;
?>






<div class="container fluid">
    <form action="components/ProcesoModificarAnte.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">

                <h4>MODIFICAR Antecedentes</h4>

                <?php
                while($row=$resultado->fetch_assoc()){



                    ?>
                    <div class="md-form">
                        <input type="hidden" name="id" value="<?php echo $row['id_ante']; ?>">
                        <?php 
                        echo "Aspecto"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="aspecto"><?php echo $row['aspecto']; ?></textarea>
                        <?php 
                        echo "Mision"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="mision"><?php echo $row['mision']; ?></textarea>
                        <?php 
                        echo "Vision"
                        ?>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="vision"><?php echo $row['vision']; ?></textarea>
                        
                    </div>



                    <?php
                    $con++;
                }
                ?>
                <?php
                while($row2=$resultado2->fetch_assoc()){



                    ?>
                    <div class="md-form">
                        <input type="hidden" name="id_gen" value="<?php echo $row2['id_gen']; ?>">
                        <?php
                        echo "Pais"
                        ?>

                        <input type="text" id="form1" class="form-control" name="pais" value="<?php echo $row2['pais']; ?>">

                    </div>
                    <div class="md-form">
                        <?php
                        echo "Departamento"
                        ?>
                        <input type="text" id="form1" class="form-control" name="departamento" value="<?php echo $row2['departamento']; ?>">

                    </div>
                    <div class="md-form">
                        <?php
                        echo "Provincia"
                        ?>
                        <input type="text" id="form1" class="form-control" name="provincia" value="<?php echo $row2['provincia']; ?>">
                    </div>
                    <div class="md-form">
                        <?php
                        echo "Direccion"
                        ?>
                        <input type="text" id="form1" class="form-control" name="direccion" value="<?php echo $row2['direccion']; ?>">
                    </div>
                    <div class="md-form">
                        <?php
                        echo "Telefono"
                        ?>
                        <input type="text" id="form1" class="form-control" name="telefono" value="<?php echo $row2['telefono']; ?>">
                    </div>
                    <div class="md-form">
                        <?php
                        echo "Fax"
                        ?>
                        <input type="text" id="form1" class="form-control" name="fax" value="<?php echo $row2['fax']; ?>">
                    </div>
                    <div class="input-file float-left ml-n3">
                        <input type="file" ref="file" name="imagen" id="file">
                        <p  id="texto" for="file">Subir logo</p>
                    </div>



                    <?php
                    $con2++;
                }
                ?>
                <input type="hidden" value="<?php echo $con2 ?>" name="num">
                <input type="hidden" name="ida" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-success">MODIFICAR</button>
            </div>


        </div>
    </form>
</div>



