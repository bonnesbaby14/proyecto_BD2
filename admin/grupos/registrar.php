<?php
    //print_r($_POST);
    if(empty($_POST["txtNombre"]) || empty($_POST["txtGrado"])){
        header('Location: grupos.php?mensaje=falta');
        exit();
    }

    
    include("../../config/db.php"); 

if (!$connection) {
    echo 'Error de conexion a la BD...' . mysqli_connect_error();
    exit();
} else {


    $nombre = $_POST["txtNombre"];
    $grado = $_POST["txtGrado"];
  ;

    $sql = "INSERT INTO grupo( `nombre`, `grado`, `activo` ) VALUES ('$nombre', '$grado', '1');";
    //echo $sql;

    $resultado = mysqli_query($connection, $sql);
    //echo $resultado;

    if ($resultado === TRUE) {
        header('Location:  grupos.php?mensaje=registrado');
    } else {
        header('Location:  grupos.php?mensaje=error');
        exit();
    }
}
?>