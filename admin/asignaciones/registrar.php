<?php
    //print_r($_POST);
    if( ($_POST["txtGrupo"]) == "Selecciona grupo"  || ($_POST["txtMateria"]) == "Selecciona materia"  || ($_POST["txtMaestro"]) == "Selecciona maestro" ){
        header('Location: asignaciones.php?mensaje=falta');
        exit();
    }

    
    include("../../config/db.php"); 

if (!$connection) {
    echo 'Error de conexion a la BD...' . mysqli_connect_error();
    exit();
} else {


    $grupo = $_POST["txtGrupo"];
    $materia = $_POST["txtMateria"];
    $maestro = $_POST["txtMaestro"];
    //echo $categoria;

    $sql="INSERT INTO asignacion(id, idgrupo, iduser ,primer_parcial,segundo_parcial,tercer_parcial,idmateria,activo) VALUES(NULL,'$grupo','$maestro',NULL,NULL,NULL,'$materia','1')";
    $resultado =mysqli_query($connection, $sql);

    //echo $resultado;

    if ($resultado === TRUE) {
        header('Location:  asignaciones.php?mensaje=registrado');
    } else {
        header('Location:  asignaciones.php?mensaje=error');
        exit();
    } 
}
?>