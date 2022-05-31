<?php
    //print_r($_POST);
    if(empty($_POST["txtNombre"]) || empty($_POST["txtCategoria"]) || ($_POST["txtCategoria"]) == "Selecciona categoria" ){
        header('Location: materias.php?mensaje=falta');
        exit();
    }

    
    include("../../config/db.php"); 

if (!$connection) {
    echo 'Error de conexion a la BD...' . mysqli_connect_error();
    exit();
} else {


    $nombre = $_POST["txtNombre"];
    $categoria = $_POST["txtCategoria"];
    //echo $categoria;

    $sql = "INSERT INTO materia(`nombre`, `idcategoria`, `activo`) VALUES ('$nombre', '$categoria', '1');";
    // echo $sql;

    $resultado = mysqli_query($connection, $sql);
    //echo $resultado;

    if ($resultado === TRUE) {
        header('Location:  materias.php?mensaje=registrado');
    } else {
        header('Location:  materias.php?mensaje=error');
        exit();
    } 
}
?>