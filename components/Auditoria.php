<?php
$id = $_REQUEST['id_proyecto'];
$query= "SELECT count(elementos.id_proyecto) from elementos where elementos.id_proyecto='$id'";
$respuesta = mysqli_query($conexion, $query);
$row= $respuesta->fetch_array();
if($row[0]>0){
    $valor=5;
    $progress->suma($valor,$id);
}
?>


<div class="accordion">
    <div class="accordion-item">
            <div class="accordion-item-header">
                <h4>AUDITORIAS</h4>
            </div>
            <div class="accordion-item-body">
            <div class="accordion-item-body-content">
            
                <div class="row">
                    <div class="col-xl-4 col-4">
                    <a href="InsertarAuditoria.php?id_proyecto=<?php echo $id;?>" class="btn btn-success">INSERTAR</a>
                    </div>
                    <div class="col-xl-4 col-4">
                        <a href="" class="btn btn-warning">MODIFICAR</a>
                    </div>
                    <div class="col-xl-4 col-4">
                        <a href="" class="btn btn-danger">ELIMINAR</a>
                    </div>
                </div>
       
           
                
              
            </div>
            </div>


        
    </div>
</div>