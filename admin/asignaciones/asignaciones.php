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
    <title>Asiganciones</title>
</head>

<body>

    <?php


    $query = "select a.id as id, u.nombre as maestro_nombre, u.apellidos as maestro_apellidos, g.nombre as grupo, m.nombre as materia from asignacion as a inner join user as u on u.id=a.iduser inner join grupo as g on g.id=a.idgrupo inner join materia as m on m.id=a.idmateria where u.tipo='maestro' and a.activo=1";
    $asignaciones = mysqli_query($connection, $query);

    ?>
    
    <a href="registrar.php">Nuevo</a>

    <table>

        <tr>
            <th>Profesor</th>
            <th>Grupo</th>
            <th>Materia</th>
            <th>activon</th>
           

        </tr>


<?php 
        foreach ($asignaciones as $asignacion) {
        echo "<tr>
            <td> " . $asignacion['maestro_nombre'] ." ".$asignacion['maestro_apellidos'] . " </td>
            <td> " . $asignacion['grupo'] . " </td>
            <td> " . $asignacion['materia'] . " </td>
       
            
            <td>
            <form action='#' method='POST'> <input type='hidden' name='id' value='" . $asignacion["id"] . "'> <input type='submit' class='btn btn-danger' value='ver'> </input> </form>
            <form action='./editar.php' method='POST'> <input type='hidden' name='id' value='" . $asignacion["id"] . "'> <input type='submit' class='btn btn-danger' value='editar'> </input> </form>
            <form action='./delete.php' method='POST'> <input type='hidden' name='id' value='" . $asignacion["id"] . "'> <input type='submit' class='btn btn-danger' value='Eliminar'> </input> </form>

            </td>
        </tr>
        ";
        }

?>

    </table>






</body>

</html>