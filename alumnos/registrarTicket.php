<?php
    //print_r($_POST);
    if(empty($_POST["txtNombre"]) || empty($_POST["txtUrgencia"]) ){
        header('Location: ticket.php?mensaje=falta');
        exit();
    }

    
    include("../config/db.php"); 

if (!$connection) {
    echo 'Error de conexion a la BD...' . mysqli_connect_error();
    exit();
} else {


    $nombre = $_POST["txtNombre"];
    $urgencia = $_POST["txtUrgencia"];
    //echo $categoria;

    $sql="INSERT INTO ticket_soporte(id, texto, urgencia, atendido, idusuario) VALUES(NULL,'$nombre','$urgencia','0', NULL)";
    $resultado =mysqli_query($connection, $sql);

    //echo $resultado;

    if ($resultado === TRUE) {
        header('Location:  ticket.php?mensaje=registrado');
    } else {
        header('Location:  ticket.php?mensaje=error');
        exit();
    } 
}
?>