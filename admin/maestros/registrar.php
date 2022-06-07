<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellidos"]) || empty($_POST["txtRegistro"])){
        header('Location: maestros.php?mensaje=falta');
        exit();
    }

    
    include("../../config/db.php"); 

if (!$connection) {
    echo 'Error de conexion a la BD...' . mysqli_connect_error();
    exit();
} else {


    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellidos"];
    $registro = $_POST["txtRegistro"];
    $tipo = "maestro";
    $password =  MD5($_POST["txtPassword"]);
    $activo = "1";

    $sql = "INSERT INTO user(`user`, `password`, `nombre`, `apellidos`, `registro`, `tipo`, `activo`) VALUES ('$nombre', '$password', '$nombre', '$apellido','$registro','$tipo', '$activo');";
    // echo $sql;

    $resultado = mysqli_query($connection, $sql);
    echo $resultado;

    if ($resultado === TRUE) {
        header('Location:  maestros.php?mensaje=registrado');
    } else {
        header('Location:  maestros.php?mensaje=error');
        exit();
    }
}
?>