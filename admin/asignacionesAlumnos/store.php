<?php
session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}



    include("../../config/db.php"); 
    
    
$ids=explode(",",$_POST["ids"]);
$grupo=$_POST["grupo"];
$materia=$_POST["materia"];



for ($i=1; $i <count($ids) ; $i++) { 
    $id=$ids[$i];
    if(isset($_POST["alumno$id"])){
        
        $sql="INSERT INTO asignacion(id, idgrupo,iduser,primer_parcial, segundo_parcial, tercer_parcial, idmateria,activo) VALUES(NULL,'$grupo','".$_POST["alumno$id"]."','0','0','0','$materia','1')";
        $resultado =mysqli_query($connection, $sql);
    }

    // $demo=$demo.", ".(isset($_POST["alumno$id"])?$_POST["alumno$id"]:"");
    // $sql="update asignacion set primer_parcial='$primer', segundo_parcial='$segundo', tercer_parcial='$tercero' where id='$id' ";
    // $resultado =mysqli_query($connection, $sql);

}



header("Location: ./asignaciones.php?grupo=$grupo&materia=$materia&Mensaje=Actuaizado con exito");



?>