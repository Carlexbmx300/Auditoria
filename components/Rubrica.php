<?php
$id = $_REQUEST['id_proyecto'];

?>


<div class="accordion">
    <div class="accordion-item">
            <div class="accordion-item-header">
                <h4>RUBRICA DE EVALUACION</h4>
            </div>
            <div class="accordion-item-body">
            <div class="accordion-item-body-content">
           
           
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
               
            </div>
            </div>


        </div>
    </div>
</div>