<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}


    include("./config/db.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maesthos</title>
</head>

<body>

    <?php

    $query = "SELECT * FROM user WHERE tipo='maestro' and activo='1'";
    $maestros = mysqli_query($connection, $query);

    ?>
    <a href="registrarMaestro.php">Nuevo</a>

    <table>

        <tr>
            <th>nombre</th>
            <th>apellidos</th>
            <th>registho</th>
            <th>activon</th>
           

        </tr>


<?php 
        foreach ($maestros as $maestro) {
        echo "<tr>
            <td> " . $maestro['nombre'] . " </td>
            <td> " . $maestro['apellidos'] . " </td>
            <td> " . $maestro['registro'] . " </td>
            <td>
            <form action='verMaestro.php' method='POST'> <input type='hidden' name='id' value='" . $maestro["id"] . "'> <input type='submit' class='btn btn-danger' value='ver'> </input> </form>
            <form action='editarMaestro.php' method='POST'> <input type='hidden' name='id' value='" . $maestro["id"] . "'> <input type='submit' class='btn btn-danger' value='editar'> </input> </form>
            <form action='eliminarMaestro.php' method='POST'> <input type='hidden' name='id' value='" . $maestro["id"] . "'> <input type='submit' class='btn btn-danger' value='Eliminar'> </input> </form>

            </td>
        </tr>
        ";
        }

?>

    </table>






</body>

</html>