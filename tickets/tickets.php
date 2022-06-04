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
    <title>Tickets</title>
</head>
<body>

<?php

$query = "select t.texto, t.urgencia,t.atendido, u.nombre, u.apellidos  from ticket_soporte as t inner join user as u on u.id=t.idusuario ";
if($_SESSION["tipo"]!="admin"){
$query=$query." where u.id=".$_SESSION["ID"]."";
}

$tickets = mysqli_query($connection, $query);
?>
<h1>Tickets de soporte</h1>

<table>
    <thead>
        <tr>
            <td>Problema</td>
            <td>Urgencia</td>
            <td>Atendido</td>
            <td>Usuario</td>
           
            
        </tr>

    </thead>
    <tbody>
<?php
    foreach ($tickets as $ticket) {
        echo "<tr>
            <td> " . $ticket['texto'] . " </td>
            <td> " . $ticket['urgencia'] . " </td>
            <td> " . $ticket['atendido'] . " </td>
            <td> " . $ticket['nombres']." ".$ticket['apellidos'] . " </td>
       
            
           
        </tr>
        ";
        }
    ?>
        </tbody>
</table>
</body>
</html>