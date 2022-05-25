<?php
include("./config/db.php");
session_start();

if (!$connection) {
    echo 'Error de conexion a la BD...' . mysqli_connect_error();
    exit();
} else {


    $cCorreo = $_POST['txtCorreo'];
    $cPassw = $_POST['txtContra'];
    // $cPassw = MD5($_POST['txtContra']); //Se aplica la función MD5 a la contraseña.

    $sql = "SELECT * FROM user WHERE user='$cCorreo' AND password='$cPassw'";

    $resultado = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($resultado);
    if ($count == 1) {



        $row = mysqli_fetch_array($resultado);

        $_SESSION['ID'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellidos'];
        $_SESSION['registro'] = $row['registro'];
        $_SESSION['tipo'] = $row['tipo'];
        $_SESSION['grado'] = $row['grado'];

        if ($row["tipo"] == "maestro") {
            header('Location: ./maestros/dashboard.php ');
        } else if ($row["tipo"] == "alumno") {
            header('Location: ./alumno/dashboard.php');
        } else if ($row["tipo"] == "admin") {
            header('Location: ./admin/dashboard.php');
        }
    } else {
        echo 'Error en la Consulta.' . mysqli_connect_error();
        header('Location: login.php?Message=El correo o contraseña son incorrectas');
    }
}
