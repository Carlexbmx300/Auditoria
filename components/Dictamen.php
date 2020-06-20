<?php
$id = $_REQUEST['id_proyecto'];
$query= "SELECT count(dictamen.id_proyecto) from dictamen where dictamen.id_proyecto='$id'";
$respuesta = mysqli_query($conexion, $query);
$row= $respuesta->fetch_array();
?>


<div class="accordion">
    <div class="accordion-item">
            <div class="accordion-item-header">
                <h4>DICTAMEN DE LA AUDITORIA</h4>
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
                        <p class="mt-3">DICTAMEN INSERTADO</p>
                    </div>
                    <div class="col-xl-2 col-3">
                        <a href="ModificarDictamen.php?id_proyecto=<?php echo $id;?>" class="btn btn-warning">MODIFICAR</a>
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
                    <form action="components/ProcesoCrearDictamen.php" method="post">
                      
                        
                        
                        
                   
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="md-form">
                                        <textarea id="form7" class="md-textarea form-control" rows="2" name="para"></textarea>
                                    <label for="form7">Para</label>
                                    </div>
                                    <div class="md-form">
                                        <textarea id="form7" class="md-textarea form-control" rows="2" name="de"></textarea>
                                        <label for="form7">De</label>
                                    </div>
                                
                                    <div class="md-form">
                                        <textarea id="form7" class="md-textarea form-control" rows="2" name="proyecto"></textarea>
                                        <label for="form7">Proyecto</label>
                                    </div>
                                    <input type="Date" name="fecha">
                                    <div class="md-form">
                                        <textarea id="form7" class="md-textarea form-control" rows="5" name="contenido"></textarea>
                                        <label for="form7">CONTENIDO</label>
                                    </div>
                                </div>
                    
                            </div>
                        </div>
                     
                            
                            <input type="text" value="<?php echo $id ?>" name="ida">
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