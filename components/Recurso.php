<?php
$id = $_REQUEST['id_proyecto'];

?>


<div class="accordion">
    <div class="accordion-item">
            <div class="accordion-item-header">
                <h4>RECURSOS</h4>
            </div>
            <div class="accordion-item-body">
            <div class="accordion-item-body-content">
           
           
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
             
            </div>
            </div>


        </div>
    </div>
</div>