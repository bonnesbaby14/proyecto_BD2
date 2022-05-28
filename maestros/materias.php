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
    <title>Materias</title>
</head>
<body>

<?php

$query = "select m.nombre as nombre, c.descripcion as descripcion ,g.nombre as grupo , c.nombre as categoria from asignacion as a inner join grupo as g on g.id=a.idgrupo inner join materia as m on m.id=a.idmateria inner join categorias as c on c.id=m.idcategoria where a.iduser=". $_SESSION['ID'];
// echo $connection;
$materias = mysqli_query($connection, $query);

?>
<h1>Materias en curso</h1>



<table>
    <thead>
        <tr>
            <td>Materia</td>
            <td>Categoria</td>
            <td>Descripción</td>
            <td>Grupo</td>
           
            
        </tr>

    </thead>
    <tbody>
<?php
    foreach ($materias as $materia) {
        echo "<tr>
            <td> " . $materia['nombre'] . " </td>
            <td> " . $materia['categoria'] . " </td>
            <td> " . $materia['descripcion'] . " </td>
            <td> " . $materia['grupo'] . " </td>
       
            
           
        </tr>
        ";
        }
    ?>
        </tbody>
</table>
</body>
</html>