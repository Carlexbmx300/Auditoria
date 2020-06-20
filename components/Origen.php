<?php
$id = $_REQUEST['id_proyecto'];
$query= "SELECT count(origen.id_proyecto) from origen where origen.id_proyecto='$id'";
$respuesta = mysqli_query($conexion, $query);
$row= $respuesta->fetch_array();
?>


<div class="accordion">
    <div class="accordion-item">
            <div class="accordion-item-header">
                <h4>ORIGEN</h4>
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
                        <p class="mt-3">ORIGEN INSERTADO</p>
                    </div>
                    <div class="col-xl-2 col-3">
                        <a href="ModificarOrigen.php?id_proyecto=<?php echo $id;?>" class="btn btn-warning">MODIFICAR</a>
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
                    <form action="components/ProcesoCrearOrigen.php" method="post" enctype="multipart/form-data">
                        <div class="md-form ml-5">
                            <textarea id="form7" class="md-textarea form-control" rows="3" name="origen"></textarea>
                            <label for="form7">Origen de la auditoria</label>
                        </div>
                        
                        <h4>Visita preliminar</h4>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-success" id="addV">Añadir visita</button>
                            </div>
                            <div class="col-6">
                            <button type="button" class="btn btn-success" id="removeV">Quitar visita</button>
                            </div>
                        </div>
                        <div id="dynamic_fieldV">

                        </div>
                        <div class="md-form ml-5">
                            <textarea id="form7" class="md-textarea form-control" rows="3" name="objetivog"></textarea>
                            <label for="form7">Objetivo general</label>
                        </div>
                        <h4>Objetivos especificos</h4>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-success" id="addO">Añadir objetivo</button>
                            </div>
                            <div class="col-6">
                            <button type="button" class="btn btn-success" id="removeO">Quitar objetivo</button>
                            </div>
                        </div>
                        <div id="dynamic_fieldO">

                        </div>
                        <input type="hidden" id="numeroO" name="numeroO">
                        <input type="hidden" id="numeroV" name="numeroV">
                            
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