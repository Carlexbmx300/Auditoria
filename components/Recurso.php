<?php

$id = $_REQUEST['id_proyecto'];
$query= "SELECT count(economico.id_proyecto) from economico where economico.id_proyecto='$id'";
$respuesta = mysqli_query($conexion, $query);
$row= $respuesta->fetch_array();
?>


<div class="accordion">
    <div class="accordion-item">
            <div class="accordion-item-header">
                <h4>RECURSOS</h4>
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
                        <p class="mt-3">RECURSO INSERTADO</p>
                    </div>
                    <div class="col-xl-2 col-3">
                        <a href="ModificarRecursosTecnicos.php?id_proyecto=<?php echo $id;?>" class="btn btn-warning">MODIFICAR TECNICOS</a>
                    </div>
                    <div class="col-xl-2 col-3">
                        <a href="ModificarRecursosEconomicos.php?id_proyecto=<?php echo $id;?>" class="btn btn-warning">MODIFICAR ECONOMICOS</a>
                    </div>
                </div>
            <?php    
            }
            else
            {
            ?>
           
           
                <div class="row">
                    <form action="components/ProcesoCrearRecurso.php" method="post">
                        
                        
                    <h4>Recursos tecnicos</h4>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-success" id="addTec">Añadir recurso</button>
                            </div>
                            <div class="col-6">
                            <button type="button" class="btn btn-success" id="removeTec">Quitar recurso</button>
                            </div>
                        </div>
                        <div id="dynamic_fieldTec">

                        </div>
                        
                        <h4>Recursos economicos</h4>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-success" id="addEco">Añadir recurso</button>
                            </div>
                            <div class="col-6">
                            <button type="button" class="btn btn-success" id="removeEco">Quitar recurso</button>
                            </div>
                        </div>
                        <div id="dynamic_fieldEco">

                        </div>
                        <input type="hidden" id="numeroTec" name="numeroTec">
                        <input type="hidden" id="numeroEco" name="numeroEco">
                            
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