    <?php
    include("Conexion.php");
    $conexion->set_charset('utf8');
    $id= $_REQUEST['id_proyecto'];
    $query = "SELECT * from introduccion where introduccion.id_proyecto= '$id'";
    $resultado = mysqli_query($conexion, $query);
    $con = 1;
    ?>
    
    
    
    
    
    
    <div class="container fluid">
    <form action="components/ProcesoModificarIntro.php" method="post">
        <div class="row">
          
              <div class="col-xl-6 offset-3">

              <h4>MODIFICAR INTRODUCCION</h4>
         
            <?php
            while($row=$resultado->fetch_assoc()){
            
            

            ?>
            <div class="md-form">
                <input type="hidden" name="id<?php echo $con?>" value="<?php echo $row['id_introduccion']; ?>">
                <textarea id="form7" class="md-textarea form-control" rows="3" name="intro<?php echo $con; ?>"><?php echo $row['contenido']; ?></textarea>
                <label for="form7">Parrafo <?php echo $con;?></label>
                </div>


            
            <?php
            $con++;
            }
            ?>
                 <input type="hidden" name="numero" id="" value="<?php echo $con-1;?>"> 
                 <input type="hidden" name="idp" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-success">MODIFICAR</button>
                </div>
               

        </div>
        </form>
    </div>