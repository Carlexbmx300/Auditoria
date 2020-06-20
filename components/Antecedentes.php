<?php
$id = $_REQUEST['id_proyecto'];
$query= "SELECT count(antecedentes.id_proyecto) from antecedentes where antecedentes.id_proyecto='$id'";
$respuesta = mysqli_query($conexion, $query);
$row= $respuesta->fetch_array();

?>

<div class="accordion">
    <div class="accordion-item">
            <div class="accordion-item-header">
                <h4>ANTECEDENTES</h4>
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
                        <p class="mt-3">ANTECEDENTES INSERTADO</p>
                    </div>
                    <div class="col-xl-2 col-3">
                        <a href="ModificarAntecedentes.php?id_proyecto=<?php echo $id;?>" class="btn btn-warning">MODIFICAR</a>
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
                <div class="row ml-5">
                    <form action="components/ProcesoCrearAntecedente.php" method="post" enctype="multipart/form-data">
                        <div class="md-form ml-5">
                            <textarea id="form7" class="md-textarea form-control" rows="3" name="aspecto"></textarea>
                            <label for="form7">Aspecto historico de la empresa</label>
                        </div>
                        <div class="md-form ml-5">
                            <textarea id="form7" class="md-textarea form-control" rows="3" name="mision"></textarea>
                            <label for="form7">mision</label>
                        </div>
                        <div class="md-form ml-5">
                            <textarea id="form7" class="md-textarea form-control" rows="3" name="vision"></textarea>
                            <label for="form7">vision</label>
                        </div>
                        <h4>GENERALIDADES DE LA EMPRESA</h4>
                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="pais" required>
                            <label for="form1">Pais de origen</label>
                            </div>
                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="departamento" required>
                            <label for="form1">departamento</label>
                            </div>
                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="provincia" required>
                            <label for="form1">Provincia</label>
                            </div>
                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="direccion" required>
                            <label for="form1">Direccion</label>
                            </div>
                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="telefono" required>
                            <label for="form1">Telefono</label>
                            </div>
                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="fax" required>
                            <label for="form1">Fax</label>
                            </div>
                            <div class="input-file float-left ml-n3">
                            <input type="file" ref="file" name="imagen" id="file">
                            <p  id="texto" for="file">Subir Ubicacion</p>
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