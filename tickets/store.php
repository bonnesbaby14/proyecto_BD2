<?php
/*session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: tickets.php');} */




    include("../config/db.php"); 

 

$urgencia=$_POST["urgencia"];
$texto=$_POST["texto"];


     $sql="INSERT INTO ticket_soporte(id, texto,urgencia,atendido, idusuario) VALUES(NULL,'$texto','".$urgencia."','0','".$_SESSION['ID']."')";
    $resultado =mysqli_query($connection, $sql);
   

   



if ($resultado === TRUE) {
    header('Location:  ./tickets.php?mensaje=registrado');
} else {
    header('Location:  ./tickets.php?mensaje=error');
    exit();
} 



//header("Location: ./asignaciones.php?grupo=$grupo&materia=$materia&Mensaje=Actuaizado con exito");



?>