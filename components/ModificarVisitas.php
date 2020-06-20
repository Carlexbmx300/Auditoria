<?php
include("Conexion.php");
$conexion->set_charset('utf8');
$id= $_REQUEST['id_proyecto'];
$query = "SELECT * from visita where visita.id_proyecto= '$id'";
$resultado = mysqli_query($conexion, $query);

$con = 1;
?>






<div class="container fluid">
    <form action="components/ProcesoModificarVisitas.php" method="post">
        <div class="row">

            <div class="col-xl-6 offset-3">

                <h4>MODIFICAR VISITAS</h4>

                <?php
                while($row=$resultado->fetch_assoc()){



                    ?>
                    <div class="md-form">
                        <input type="hidden" name="id" value="<?php echo $row['id_visita']; ?>">
                        
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="titulo"><?php echo $row['titulo']; ?></textarea>
                        <textarea id="form7" class="md-textarea form-control" rows="3" name="contenido"><?php echo $row['contenido']; ?></textarea>
                        
                    </div>



                    <?php
                    $con++;
                }
                
                ?>
                
                
                <input type="hidden" name="idv" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-success">MODIFICAR</button>
            </div>


        </div>
    </form>
    
</div>