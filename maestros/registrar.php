<?php
session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}



    include("../config/db.php"); 
    
    
$asiganciones=explode(",",$_POST["asignaciones"]);
$grupo=$_POST["grupo"];
$materia=$_POST["materia"];


for ($i=1; $i <count($asiganciones) ; $i++) { 
    $id=$asiganciones[$i];
    $primer= $_POST["primero-$asiganciones[$i]"];
    $segundo= $_POST["segundo-$asiganciones[$i]"];
    $tercero= $_POST["tercero-$asiganciones[$i]"];
    $sql="update asignacion set primer_parcial='$primer', segundo_parcial='$segundo', tercer_parcial='$tercero' where id='$id' ";
    $resultado =mysqli_query($connection, $sql);

}


header("Location: ./calificaciones.php?grupo=$grupo&materia=$materia&Mensaje=Actuaizado con exito");



?>