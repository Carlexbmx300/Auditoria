<?php
include('Conexion.php');
$conexion->set_charset('utf8');
$id = $_POST['ida'];
$numV= $_POST['numeroV'];
$numO= $_POST['numeroO'];
$origen = $_POST['origen'];
$general = $_POST['objetivog'];

$query1 = "INSERT into origen(contenido, id_proyecto) values ('$origen','$id')";
$res1= mysqli_query($conexion, $query1);
$query2 = "INSERT into objetivog (contenido, id_proyecto) values ('$general','$id')";
$res2 = mysqli_query($conexion, $query2);

for($i = 1; $i <= $numV ; $i++){
    if(is_uploaded_file($_FILES["imagen".$i]["tmp_name"])) { 
     
     
        // creamos las variables para subir a la db
          $ruta = "../upload/"; 
          $nombrefinal= trim ($_FILES["imagen".$i]["name"]); //Eliminamos los espacios en blanco
         
         
          //$nombrefinala= preg_replace(" ","", $nombrefinal );//Sustituye una expresión regular
          $upload= $ruta . $nombrefinal;  
  
  
  
          if(move_uploaded_file($_FILES["imagen".$i]["tmp_name"], $upload)) {
                $titulo = $_POST['titulo'.$i];
                $contenido = $_POST['observacion'.$i];
                $query3 = "INSERT into visita(titulo, contenido,imagen, id_proyecto) values ('$titulo', '$contenido','$nombrefinal', '$id')";
                $res3 = mysqli_query($conexion, $query3);
          }
        }    
}

for($j = 1 ;$j <= $numO ; $j++ ){
    $especifico = $_POST['especifico'.$j];
    $query4 = "INSERT into objetivoe(contenido, id_proyecto) values ('$especifico', '$id')";
    $res4 = mysqli_query($conexion, $query4);
}

echo "<script>
    alert('se guardo');
    window.location.href='../ListaProyectos.php';
    </script>";


?>