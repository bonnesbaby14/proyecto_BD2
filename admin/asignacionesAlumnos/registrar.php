<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');
}



include("../../config/db.php");



$query = "SELECT * FROM grupo where activo='1' ";
$grupos = mysqli_query($connection, $query);

$query = "SELECT * FROM user where activo='1' and tipo='alumno'";
$alumnos = mysqli_query($connection, $query);

$query = "SELECT * FROM materia where activo='1' ";
$materias = mysqli_query($connection, $query);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Alumnos</title>
</head>

<body>


    <form action="./store.php" method="post">





        
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

    <table>

<tr>
    <th>Matricula</th>
    <th>Nombre</th>
    <th></th>
  
   

</tr>


<?php 
foreach ($alumnos as $alumno) {
    $ids=$ids.",".$alumno['id'];
echo "<tr>
<td> " . $alumno['registro'] . " </td>
    <td> " . $alumno['nombre'] ." ". $alumno['apellidos'] . " </td>
    <td> <input type='checkbox' name='alumno".$alumno['id']."' value='".$alumno['id']."'>   </td>


    
    <td>
   
    </td>
</tr>
";
}

?>

</table>

<input type="hidden" name="ids" value="<?php echo $ids; ?>">

        <button type="submit">registar</button>

        <button>Cancela</button>
    </form>

</body>

</html>