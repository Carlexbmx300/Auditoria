<?php
    include("Conexion.php");
    $conexion->set_charset('utf8');
    $id= $_REQUEST['id_proyecto'];
    $query = "SELECT * from proyecto where proyecto.id_proyecto= '$id'";
    $resultado = mysqli_query($conexion, $query);
 //   $con = 1;
    $con2=0;
    $query2="SELECT * from integrante where integrante.id_proyecto='$id'";
    $res2 = mysqli_query($conexion, $query2);
?>
    
    
    
    
    
    
   <div class="container fluid modificar">
    <form action="components/ProcesoModificarProyecto.php" method="post"  enctype="multipart/form-data">
        <div class="row">
          
              <div class="col-xl-6 offset-3">

              <h4>MODIFICAR INTRODUCCION</h4>
         
            <?php
            while($row=$resultado->fetch_assoc()){
            
            

            ?>
            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="titulo" value="<?php echo $row['nombre']?>"required>
                            <label for="form1">Titulo del proyecto</label>
            </div>
            <div class="input-file float-left ml-n3">
                    <input type="file" ref="file" name="imagen" id="file">
                    <p  id="texto" for="file">Subir logo</p>
            </div>
            <div class="preview" id="preview">
            
            </div>
            <?php
            while($row2 = $res2->fetch_assoc()){
               $con2++;
            ?>

            <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="<?php echo 'nombre'.$con2;?>" value="<?php echo $row2['nombre']; ?>">
                        <label for="form1">Integrante</label>
            </div>
                <input type="hidden" value="<?php echo $row2['id_integrante'] ?>" name="<?php echo 'idi'.$con2 ?>">
                


            <?PHP    
            }
            ?>
            <input type="hidden" value="<?php echo $con2 ?>" name="num">
            <input type="hidden" value="<?php echo $id ?>" name="idm">

            
            <?php
         
            }
            ?>
             
                <button type="submit" class="btn btn-success">MODIFICAR</button>
                </div>
               

        </div>
        </form>
    </div>