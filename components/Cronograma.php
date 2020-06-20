<?php
$id = $_REQUEST['id_proyecto'];
$query= "SELECT count(cronograma.id_proyecto) from cronograma where cronograma.id_proyecto='$id'";
$respuesta = mysqli_query($conexion, $query);
$row= $respuesta->fetch_array();
?>


<div class="accordion">
    <div class="accordion-item">
            <div class="accordion-item-header">
                <h4>CRONOGRAMA DE ACTIVIDADES</h4>
            </div>
            <div class="accordion-item-body">
            <div class="accordion-item-body-content">
            <?php
            if($row[0]>0){
               
            ?>
                <div class="row">
                    <div class="col-xl-6 col-4">
                        <p class="mt-3">CRONOGRAMA INSERTADO</p>
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
                    <form action="components/ProcesoCrearCronograma.php" method="post" enctype="multipart/form-data">
                      
                        
                    <div class="input-file float-left ml-n3">
                    <input type="file" ref="file" name="imagen" id="file">
                    <p  id="texto" for="file">Subir logo</p>
                    </div>      

                    <div class="preview" id="preview">
            
                    </div>
                        
                   
                     
                     
                            
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