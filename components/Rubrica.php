<?php

$id = $_REQUEST['id_proyecto'];
$query= "SELECT count(rubrica.id_proyecto) from rubrica where rubrica.id_proyecto='$id'";
$respuesta = mysqli_query($conexion, $query);
$row= $respuesta->fetch_array();
?>


<div class="accordion">
    <div class="accordion-item">
            <div class="accordion-item-header">
                <h4>RUBRICA DE EVALUACION</h4>
            </div>
            <div class="accordion-item-body">
            <div class="accordion-item-body-content">

            <?php
            if($row[0]>0){
                $valor=9;
                $progress->suma($valor,$id);
            ?>
                <div class="row">
                    <div class="col-xl-6 col-4">
                        <p class="mt-3">RUBRICA INSERTADA</p>
                    </div>
                    <div class="col-xl-2 col-3">
                        <a href="ModificarRubricas.php?id_proyecto=<?php echo $id;?>" class="btn btn-warning">MODIFICAR</a>
                    </div>
                    <div class="col-xl-2 col-3">
                        <a href="" class="btn btn-danger">ELIMINAR</a>
                    </div>
                </div>
            <?php    
            }
            else
            {
            ?>
           
           
                <div class="row">
                    <form action="components/ProcesoCrearRubrica.php" method="post">
                      
                        
                        
                        
                   
                     
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-success" id="addA">Añadir aspecto</button>
                            </div>
                            <div class="col-6">
                            <button type="button" class="btn btn-success" id="removeA">Quitar aspecto</button>
                            </div>
                        </div>
                        <div id="dynamic_fieldA">

                        </div>
                        <input type="hidden" id="numeroA" name="numeroA">
                     
                            
                            <input type="hidden" value="<?php echo $id ?>" name="ida">
                        <button type="submit" class="btn btn-success">ENVIAR</button>

                    </form>
                </div>
                <?php
            }
                ?>
               
            </div>
            </div>


        </div>
    </div>
</div>