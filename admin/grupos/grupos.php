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
    <title>Grupos</title>
</head>

<body>

    <?php


    $query = "SELECT * from grupo where activo='1'";
    $grupos = mysqli_query($connection, $query);

    ?>
    
    <a href="registrar.php">Nuevo</a>

    <table>

        <tr>
            <th>nombre</th>
            <th>fecha</th>
            <th>grado</th>
            
            <th>activon</th>
           

        </tr>


<?php 
        foreach ($grupos as $grupo) {
        echo "<tr>
            <td> " . $grupo['nombre'] . " </td>
            <td> " . $grupo['fecha'] . " </td>
            <td> " . $grupo['grado'] . " </td>
       
            
            <td>
            <form action='#' method='POST'> <input type='hidden' name='id' value='" . $grupo["id"] . "'> <input type='submit' class='btn btn-danger' value='ver'> </input> </form>
            <form action='./editar.php' method='POST'> <input type='hidden' name='id' value='" . $grupo["id"] . "'> <input type='submit' class='btn btn-danger' value='editar'> </input> </form>
            <form action='./delete.php' method='POST'> <input type='hidden' name='id' value='" . $grupo["id"] . "'> <input type='submit' class='btn btn-danger' value='Eliminar'> </input> </form>

            </td>
        </tr>
        ";
        }

?>

    </table>






</body>

</html>