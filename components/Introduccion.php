<?php
include('Conexion.php');
$id = $_REQUEST['id_proyecto'];
$query= "SELECT count(introduccion.id_proyecto) from introduccion where introduccion.id_proyecto='$id'";
$respuesta = mysqli_query($conexion, $query);
$row= $respuesta->fetch_array();

?>

<div class="container fluid">
    <div class="accordion">
    <div class="accordion-item">
        <div class="accordion-item-header">
          <h4>INTRODUCCION</h4>
        </div>
        <div class="accordion-item-body">
        <div class="accordion-item-body-content">
        <?php
        if($row[0]>0){
        ?>
            <div class="row">
                <div class="col-xl-6 col-4">
                    <p class="mt-3">INTRODUCCION INSERTADA</p>
                </div>
                <div class="col-xl-2 col-3">
                    <a href="ModificarIntro.php?id_proyecto=<?php echo $id;?>" class="btn btn-warning">MODIFICAR</a>
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
        <button class="btn btn-success" id="add"> Añadir parrafo</button>
        </div>
        <div class="row">
        <form action="components/ProcesoCrearIntroduccion.php" method="post">
            
        <div class="col-xl-12" id="dynamic_field">
        </div>
        <button type="submit" class="btn btn-success">ENVIAR</button>
        <input type="hidden" name="numero" id="numero">
        <input type="hidden" name="id" id=""value="<?php echo $id; ?>">
        </form>
        </div>
        <?php
        }
        ?>
        </div>
        </div>
    </div>
    
   
</div>


