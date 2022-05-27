<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');
}



include("../../config/db.php");

$query = "SELECT * FROM user where activo='1' and tipo='maestro' ";
$maestros = mysqli_query($connection, $query);

$query = "SELECT * FROM materia where activo='1' ";
$materias = mysqli_query($connection, $query);

$query = "SELECT * FROM grupo where activo='1' ";
$grupos = mysqli_query($connection, $query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Materias</title>
</head>

<body>


    <form action="./store.php" method="post">





        <label for="">
            Maestro
            <select name="maestro" id="">

                <?php

                foreach ($maestros as $maestro) {

                    echo "<option value='" . $maestro['id'] . "'  > " . $maestro['nombre'] . " " . $maestro['apellidos'] . " </option>";
                }

                ?>



            </select>





            </select>

        </label>

        <label for="">
            Grupos
            <select name="grupo" id="">

                <?php

                foreach ($grupos as $grupo) {

                    echo "<option value='" . $grupo['id'] . "'  > " . $grupo['nombre'] . " </option>";
                }

                ?>



            </select>
        </label>

        <label for="">
            Materia
            <select name="materia" id="">

                <?php

                foreach ($materias as $materia) {

                    echo "<option value='" . $materia['id'] . "'  > " . $materia['nombre'] . " </option>";
                }

                ?>



            </select>
        </label>



        <button type="submit">registar</button>

        <button>Cancela</button>
    </form>

</body>

</html>