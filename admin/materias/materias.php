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
    <title>Materias</title>
</head>

<body>

    <?php


    $query = "SELECT m.*, c.nombre as categoria FROM materia as m inner join categorias as c on c.id=m.idcategoria  WHERE  m.activo='1'";
    $materias = mysqli_query($connection, $query);

    ?>
    
    <a href="registrar.php">Nuevo</a>

    <table>

        <tr>
            <th>nombre</th>
            <th>categoria</th>
            
            <th>activon</th>
           

        </tr>


<?php 
        foreach ($materias as $materia) {
        echo "<tr>
            <td> " . $materia['nombre'] . " </td>
            <td> " . $materia['categoria'] . " </td>
       
            
            <td>
            <form action='#' method='POST'> <input type='hidden' name='id' value='" . $materia["id"] . "'> <input type='submit' class='btn btn-danger' value='ver'> </input> </form>
            <form action='./editar.php' method='POST'> <input type='hidden' name='id' value='" . $materia["id"] . "'> <input type='submit' class='btn btn-danger' value='editar'> </input> </form>
            <form action='./delete.php' method='POST'> <input type='hidden' name='id' value='" . $materia["id"] . "'> <input type='submit' class='btn btn-danger' value='Eliminar'> </input> </form>

            </td>
        </tr>
        ";
        }

?>

    </table>






</body>

</html>