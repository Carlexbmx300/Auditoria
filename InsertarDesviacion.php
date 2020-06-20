<?php
$id = $_REQUEST['id_proyecto'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
<link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <?php
    include('components/Navbar.php');
   
   ?>


    <div class="container insert">
        <div class="row">
        
            <div class="col-xl-6 offset-3 text-white">

                <form action="components/ProcesoAgregarDesviacion.php" method="post" enctype="multipart/form-data">
                           
                            <div class="md-form">
                            <textarea id="form7" class="md-textarea form-control" rows="2" name="situacion"></textarea>
                            <label for="form7">Situacion</label>
                            </div>
                            <div class="md-form">
                            <textarea id="form7" class="md-textarea form-control" rows="2" name="causa"></textarea>
                            <label for="form7">Causa</label>
                            </div>
                            <div class="md-form">
                            <textarea id="form7" class="md-textarea form-control" rows="2" name="solucion"></textarea>
                            <label for="form7">Solucion</label>
                            </div>
                            <input type="datetime-local" name="fecha" id="">

                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="responsable" required>
                            <label for="form1">Responsable</label>
                            </div>

                            <div class="input-file float-left ml-n3">
                             <input type="file" ref="file" name="imagen" id="file">
                    <p  id="texto" for="file">Subir evidencia</p>
            </div>      

            <div class="preview" id="preview">
            
            </div>
                            

                             <input type="text" name="ida" value="<?php echo $id; ?>">       
                            <button type="submit" class="btn btn-success">ENVIAR</button>


                </form>
            
            </div>
        
        </div>
    
    </div>


   


    

<script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
<script src="js/integrantes.js"></script>
<script src="js/main.js"></script>

</body>
</html>