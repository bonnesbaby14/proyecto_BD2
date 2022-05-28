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


    $query = "select u.registro as matricula, a.id as id, CONCAT(u.nombre,' ' ,u.apellidos) as alumno, m.nombre as materia,g.nombre as grupo from asignacion as a inner join user as u on u.id=a.iduser inner join grupo as g on g.id=a.idgrupo inner join materia as m on m.id=a.idmateria where u.tipo='alumno' and a.activo=1";
    $asignaciones = mysqli_query($connection, $query);

    ?>
    
    <a href="registrar.php">Nuevo</a>

    <table>

        <tr>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Materia</th>
            <th>Grupo</th>
          
           

        </tr>


<?php 
        foreach ($asignaciones as $asignacion) {
        echo "<tr>
            <td> " . $asignacion['matricula'] . " </td>
            <td> " . $asignacion['alumno'] . " </td>
            <td> " . $asignacion['materia'] . " </td>
            <td> " . $asignacion['grupo'] . " </td>
            
       
            
            <td>
            <form action='./delete.php' method='POST'> <input type='hidden' name='id' value='" . $asignacion["id"] . "'> <input type='submit' class='btn btn-danger' value='Eliminar'> </input> </form>

            </td>
        </tr>
        ";
        }

?>

    </table>






</body>

</html>