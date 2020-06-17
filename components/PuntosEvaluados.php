<?php
$id = $_REQUEST['id_proyecto'];
$query= "SELECT count(puntos.id_proyecto) from puntos where puntos.id_proyecto='$id'";
$respuesta = mysqli_query($conexion, $query);
$row= $respuesta->fetch_array();
?>


<div class="accordion">
    <div class="accordion-item">
            <div class="accordion-item-header">
                <h4>PUNTOS A SER EVALUADOS</h4>
            </div>
            <div class="accordion-item-body">
            <div class="accordion-item-body-content">
            <?php
            if($row[0]>0){
            ?>
                <div class="row">
                    <div class="col-xl-6 col-4">
                        <p class="mt-3">PUNTOS INSERTADOS</p>
                    </div>
                    <div class="col-xl-2 col-3">
                        <a href="" class="btn btn-warning">MODIFICAR</a>
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
                    <form action="components/ProcesoCrearPunto.php" method="post">
                      
                        
                        
                        
                   
                     
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-success" id="addP">Añadir punto</button>
                            </div>
                            <div class="col-6">
                            <button type="button" class="btn btn-success" id="removeP">Quitar punto</button>
                            </div>
                        </div>
                        <div id="dynamic_fieldP">

                        </div>
                        <input type="hidden" id="numeroP" name="numeroP">
                     
                            
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