<?php
    //print_r($_POST);
    if(empty($_POST["txtNombre"]) || empty($_POST["txtDescripcion"])){
        header('Location: categorias.php?mensaje=falta');
        exit();
    }

    
    include("../../config/db.php"); 

if (!$connection) {
    echo 'Error de conexion a la BD...' . mysqli_connect_error();
    exit();
} else {


    $nombre = $_POST["txtNombre"];
    $descripcion = $_POST["txtDescripcion"];
    //echo $categoria;

    $sql = "INSERT INTO categorias(`nombre`, `descripcion`, `activo`) VALUES ('$nombre', '$descripcion', '1');";
    // echo $sql;

    $resultado = mysqli_query($connection, $sql);
    //echo $resultado;

    if ($resultado === TRUE) {
        header('Location:  categorias.php?mensaje=registrado');
    } else {
        header('Location:  categorias.php?mensaje=error');
        exit();
    } 
}
?>