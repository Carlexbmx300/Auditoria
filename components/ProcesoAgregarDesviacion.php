<?php 
include("Conexion.php");
$conexion->set_charset('utf8');
$id=$_POST['ida'];
$situacion=$_POST['situacion'];
$causa = $_POST['causa'];
$solucion = $_POST['solucion'];
$fecha=$_POST['fecha'];
$responsable=$_POST['responsable'];
//$evidencia = $_POST['evidencia'];

if(is_uploaded_file($_FILES["imagen"]["tmp_name"])) { 
     
     
    // creamos las variables para subir a la db
      $ruta = "../upload/"; 
      $nombrefinal= trim ($_FILES["imagen"]["name"]); //Eliminamos los espacios en blanco
     
     
      //$nombrefinala= preg_replace(" ","", $nombrefinal );//Sustituye una expresión regular
      $upload= $ruta . $nombrefinal;  



                    if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $upload)) {
                $query= "INSERT into desviacion (situacion, causa, solucion, fecha, responsable, evidencia, id_proyecto) values ('$situacion', '$causa', '$solucion','$fecha', '$responsable','$nombrefinal','$id')";
                $res = mysqli_query($conexion, $query);
                if(!$res){
                    echo "no se inserto";
                }else{
                    echo "<script>
                alert('se guardo');
                window.location.href='../ListaProyectos.php';
                </script>";
                }

             }
    }else{
        $query= "INSERT into desviacion (situacion, causa, solucion, fecha, responsable, evidencia, id_proyecto) values ('$situacion', '$causa', '$solucion','$fecha', '$responsable','N/A','$id')";
        $res = mysqli_query($conexion, $query);
        if(!$res){
            echo "no se inserto";
        }else{
            echo "<script>
        alert('se guardo');
        window.location.href='../ListaProyectos.php';
        </script>";
        }

     }

?>

