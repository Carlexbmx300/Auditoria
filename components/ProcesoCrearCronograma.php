<?php
include('Conexion.php');
$id=$_POST['ida'];

if(is_uploaded_file($_FILES["imagen"]["tmp_name"])) { 
     
     
    // creamos las variables para subir a la db
      $ruta = "../upload/"; 
      $nombrefinal= trim ($_FILES["imagen"]["name"]); //Eliminamos los espacios en blanco
     
     
      //$nombrefinala= preg_replace(" ","", $nombrefinal );//Sustituye una expresión regular
      $upload= $ruta . $nombrefinal;  



      if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $upload)) {

            $query="INSERT INTO cronograma (imagen, id_proyecto) values ('$nombrefinal','$id')";
            $res = mysqli_query($conexion, $query);
            if(!$res)
           {
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