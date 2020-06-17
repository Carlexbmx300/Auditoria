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

                <form action="components/ProcesoCrearAuditoria.php" method="post">
                            <div class="md-form">
                            <input type="text" id="form1" class="form-control" name="titulo" required>
                            <label for="form1">Titulo de auditoria</label>
                            </div>
                            <h4>Alcances</h4>
                            <div class="row">
                            
                            <div class="col-6">
                                <button type="button" class="btn btn-success" id="addAlc">Añadir alcance</button>
                            </div>
                            <div class="col-6">
                            <button type="button" class="btn btn-success" id="removeAlc">Quitar alcance</button>
                            </div>
                        </div>
                        <div id="dynamic_fieldAlc">

                        </div>
                        <input type="text" id="numeroAlc" name="numeroAlc">
                        <h4>Objetivos</h4>
                            <div class="row">
                            
                            <div class="col-6">
                                <button type="button" class="btn btn-success" id="addobj">Añadir objetivo</button>
                            </div>
                            <div class="col-6">
                            <button type="button" class="btn btn-success" id="removeobj">Quitar objetivo</button>
                            </div>
                        </div>
                        <div id="dynamic_fieldobj">

                        </div>
                        <input type="text" id="numeroobj" name="numeroobj">


                        <h4>Informes</h4>
                            <div class="row">
                            
                            <div class="col-6">
                                <button type="button" class="btn btn-success" id="addinf">Añadir informe</button>
                            </div>
                            <div class="col-6">
                            <button type="button" class="btn btn-success" id="removeinf">Quitar informe</button>
                            </div>
                        </div>
                        <div id="dynamic_fieldinf">

                        </div>
                        <input type="text" id="numeroinf" name="numeroinf">
                            
                            <input type="text" value="<?php echo $id ?>" name="ida">
                       


                              
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