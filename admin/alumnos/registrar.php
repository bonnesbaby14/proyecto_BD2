<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellidos"]) || empty($_POST["txtGrado"]) || empty($_POST["txtRegistro"])){
        header('Location: alumnos.php?mensaje=falta');
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
    $grado = $_POST["txtGrado"];
    $tipo = "alumno";
    $password =  MD5($_POST["txtPassword"]);
    $activo = "1";

    $sql = "INSERT INTO user(`user`, `password`, `nombre`, `apellidos`, `registro`, `tipo`, `activo`, `grado` ) VALUES ('$nombre', '$password', '$nombre', '$apellido','$registro','$tipo', '$activo', '$grado');";
    //echo $sql;

    $resultado = mysqli_query($connection, $sql);
    //echo $resultado;

    if ($resultado === TRUE) {
        header('Location:  alumnos.php?mensaje=registrado');
    } else {
        header('Location:  alumnos.php?mensaje=error');
        exit();
    }
}
?>