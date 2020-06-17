<?php
include('Conexion.php');
$conexion->set_charset('utf8');
$id=$_POST['ida'];
$aspecto = $_POST['aspecto'];
$mision = $_POST['mision'];
$vision = $_POST['vision'];
$pais = $_POST['pais'];
$departamento = $_POST['departamento'];
$provincia = $_POST['provincia'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$fax = $_POST['fax'];


if(is_uploaded_file($_FILES["imagen"]["tmp_name"])) { 
     
     
    // creamos las variables para subir a la db
      $ruta = "../upload/"; 
      $nombrefinal= trim ($_FILES["imagen"]["name"]); //Eliminamos los espacios en blanco
     
     
      //$nombrefinala= preg_replace(" ","", $nombrefinal );//Sustituye una expresión regular
      $upload= $ruta . $nombrefinal;  



      if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $upload)) {
     
    
        $query = "INSERT into antecedentes (aspecto, mision, vision, id_proyecto) values ('$aspecto','$mision','$vision','$id')";
        $resultado = mysqli_query($conexion, $query);
        $query2 = "INSERT into generalidades (pais, departamento, provincia, direccion, telefono, fax, imagen, id_proyecto) values ('$pais','$departamento','$provincia','$direccion','$telefono','$fax','$nombrefinal','$id')";
        $res2 =mysqli_query($conexion, $query2);
        if(!$res2){
            echo 'no se inserto';
        }
        else{
            echo "<script>
            alert('se guardo');
            window.location.href='../ListaProyectos.php';
            </script>";
        }
    
    
        }
    }



?>