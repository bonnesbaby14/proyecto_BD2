<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}



    include("../../config/db.php"); 
    
    ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
</head>

<body>

    <?php


    $query = "SELECT * FROM user WHERE tipo='alumno' and activo='1'";
    $alumnos = mysqli_query($connection, $query);

    ?>
    
    <a href="registrar.php">Nuevo</a>

    <table>

        <tr>
            <th>nombre</th>
            <th>apellidos</th>
            <th>registho</th>
            <th>grado</th>
            <th>activon</th>
           

        </tr>


<?php 
        foreach ($alumnos as $alumno) {
        echo "<tr>
            <td> " . $alumno['nombre'] . " </td>
            <td> " . $alumno['apellidos'] . " </td>
            
            <td> " . $alumno['registro'] . " </td>
            <td> " . $alumno['grado'] . " </td>
            
            <td>
            <form action='#' method='POST'> <input type='hidden' name='id' value='" . $alumno["id"] . "'> <input type='submit' class='btn btn-danger' value='ver'> </input> </form>
            <form action='./editar.php' method='POST'> <input type='hidden' name='id' value='" . $alumno["id"] . "'> <input type='submit' class='btn btn-danger' value='editar'> </input> </form>
            <form action='./delete.php' method='POST'> <input type='hidden' name='id' value='" . $alumno["id"] . "'> <input type='submit' class='btn btn-danger' value='Eliminar'> </input> </form>

            </td>
        </tr>
        ";
        }

?>

    </table>






</body>

</html>