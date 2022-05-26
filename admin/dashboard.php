<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');
}


include("./config/db.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>

    <nav>
        <ul>
            <li>
                <a href="./maestros/maestros.php">Maestros</a>
            </li>
            <li>
                <a href="./alumnos/alumnos.php">Alumnos</a>
            </li>
            <li>
                <a href="./materias/materias.php">Materia</a>
            </li>
            <li>
                <a href="./admin/admins.php">Admin</a>
            </li>
            <li>
                <a href="./categorias/categorias.php">Categorias</a>
            </li>
            <li>
                <a href="./grupos/grupos.php">Grupos</a>
            </li>
            <li>
                <a href="#">Asignaciones</a>
            </li>
        </ul>
    </nav>

</body>

</html>