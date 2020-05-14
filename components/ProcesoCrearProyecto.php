<?php
include("Conexion.php");
$nombre=$_POST['nombre'];
$numero = $_POST['numero'];




    if(is_uploaded_file($_FILES["imagen"]["tmp_name"])) { 
     
     
      // creamos las variables para subir a la db
        $ruta = "../upload/"; 
        $nombrefinal= trim ($_FILES["imagen"]["name"]); //Eliminamos los espacios en blanco
       
       
        //$nombrefinala= preg_replace(" ","", $nombrefinal );//Sustituye una expresión regular
        $upload= $ruta . $nombrefinal;  



        if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $upload)) { //movemos el archivo a su ubicacion 
                    
                   //echo "<b>Upload exitoso!. Datos:</b><br>";  
                   // echo "Nombre: <i><a href=\"".$ruta . $nombrefinal."\">".$_FILES["fichero"]["name"]."</a></i><br>";  
                   // echo "Tipo MIME: <i>".$_FILES['fichero']['type']."</i><br>";  
                   // echo "Peso: <i>".$_FILES['fichero']['size']." bytes</i><br>";  
                   // echo "<br><hr><br>";  
                         

                 
           


$sql = "INSERT into proyecto (nombre, imagen) values ('$nombre', '$nombrefinal')";
$res = mysqli_query($conexion, $sql);
if(!$res){
    echo "no se inserto";
}
else{
   
    $query = " SELECT max(id_proyecto) as id from proyecto ";
    $r = mysqli_query($conexion, $query);
    while($row = $r->fetch_assoc()){
        echo "".$row['id']."";
        for($j = 0 ; $j< $numero ; $j++){

        $nombre=$_POST['campo'.$j];
        $queryA= "INSERT into integrante(nombre, id_proyecto) VALUES ('$nombre', '$row[id]')";
        $resA = mysqli_query($conexion, $queryA);
        echo $nombre;
    }
    }
    echo "<script>
    alert('se creo proyecto correctamente');
    window.location.href='../ListaProyectos.php';
    </script>";
}
}
    }
  
    

?>