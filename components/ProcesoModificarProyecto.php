<?php
include("Conexion.php");
$num = $_POST['num'];
$id= $_POST['idm'];
$nombre = $_POST['titulo'];
if(is_uploaded_file($_FILES["imagen"]["tmp_name"])) { 
     
     
    // creamos las variables para subir a la db
      $ruta = "../upload/"; 
      $nombrefinal= trim ($_FILES["imagen"]["name"]); //Eliminamos los espacios en blanco
     
     
      //$nombrefinala= preg_replace(" ","", $nombrefinal );//Sustituye una expresión regular
      $upload= $ruta . $nombrefinal;  



      if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $upload)) { //movemos el archivo a su ubicacion 
                  
                    $sql = "UPDATE proyecto SET nombre='$nombre', imagen='$nombrefinal' where id_proyecto = '$id'";
                    $res = mysqli_query($conexion, $sql);
                    if(!$res){
                    echo "no se modifico";
                    }
                    else{
                    
                   
                        for($i = 0 ; $i <= $num ; $i++){

                        $nom=$_POST['nombre'.$i];
                        $idi=$_POST['idi'.$i];
                        $queryA= "UPDATE integrante SET nombre='$nom' where integrante.id_proyecto='$id' and id_integrante='$idi'";
                        $resA = mysqli_query($conexion, $queryA);
                      
                    }
                    }
                    echo "<script>
                    alert('se modifico correctamente');
                    window.location.href='../ListaProyectos.php';
                    </script>";
                    }
        }
  

?>