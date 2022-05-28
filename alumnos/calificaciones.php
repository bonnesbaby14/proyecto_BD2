<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}



    include("../config/db.php"); 
    
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
</head>
<body>


<?php

$query = "select m.nombre as nombre, a.primer_parcial, a.segundo_parcial, a.tercer_parcial, g.nombre as grupo, (a.primer_parcial + a.segundo_parcial +a.tercer_parcial)/3 as promeio from asignacion as a inner join grupo as g on g.id=a.idgrupo inner join materia as m on m.id=a.idmateria  where a.iduser=". $_SESSION['ID'];
// echo $connection;
$calificaciones = mysqli_query($connection, $query);

?>

<h1>Calificaciones</h1>



<table>
    <thead>
        <tr>
            <td>Materia</td>
            <td>Grupo</td>
            <td>Primer Parcial</td>
            <td>Segundo Parcial</td>
            <td>Tercer Parcial</td>
            <td>Promedio</td>
        </tr>

    </thead>
    <tbody>
    <?php
    foreach ($calificaciones as $calificacion) {
        echo "<tr>
            <td> " . $calificacion['nombre'] . " </td>
            <td> " . $calificacion['grupo'] . " </td>
            <td> " . $calificacion['primer_parcial'] . " </td>
            <td> " . $calificacion['segundo_parcial'] . " </td>
            <td> " . $calificacion['tercer_parcial'] . " </td>
            <td> " . $calificacion['promedio'] . " </td>
       
            
           
        </tr>
        ";
        }
    ?>
    </tbody>
</table>
</body>
</html>