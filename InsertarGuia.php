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

                <form action="components/ProcesoCrearGuia.php" method="post">
                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="codigo" required>
                            <label for="form1">Codigo</label>
                            </div>
                            <div class="md-form">
                            <textarea id="form7" class="md-textarea form-control" rows="2" name="punto"></textarea>
                            <label for="form7">Punto a ser evaluado</label>
                            </div>
                            <div class="md-form">
                            <textarea id="form7" class="md-textarea form-control" rows="2" name="guia"></textarea>
                            <label for="form7">Guia</label>
                            </div>
                            <div class="md-form">
                            <textarea id="form7" class="md-textarea form-control" rows="2" name="actividad"></textarea>
                            <label for="form7">Actividad que sera evaluada</label>
                            </div>
                            <div class="md-form">
                            <textarea id="form7" class="md-textarea form-control" rows="2" name="procedimiento"></textarea>
                            <label for="form7">Procedimientos de auditoria</label>
                            </div>
                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="herramienta" required>
                            <label for="form1">Herramientas que seran utilizadas</label>
                            </div>
                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="tecnica" required>
                            <label for="form1">Tecnicas que seran utilizadas</label>
                            </div>
                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="porcentaje" required>
                            <label for="form1">Porcentaje</label>
                            </div>
                            <div class="md-form">
                            <textarea id="form7" class="md-textarea form-control" rows="2" name="observacion"></textarea>
                            <label for="form7">Observaciones</label>
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