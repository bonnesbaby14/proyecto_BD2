
<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}

    include("../../config/db.php"); 

    $id=$_POST['id'];

    $sql = "select a.id as id,u.id as maestroid,g.id as grupoid,m.id as materiaid, u.nombre as maestro_nombre, u.apellidos as maestro_apellidos, g.nombre as grupo, m.nombre as materia from asignacion as a inner join user as u on u.id=a.iduser inner join grupo as g on g.id=a.idgrupo inner join materia as m on m.id=a.idmateria where u.tipo='maestro' and a.activo=1 and a.id=$id";
   
    $resultado = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($resultado);
   


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
    <title>Registrar</title>
</head>
<body>

<form action="./update.php" method="post">

<input type="hidden" name="ID" value="<?php echo $id?>">




<label for="">
            Maestro
            <select name="maestro" id="">

                <?php

                foreach ($maestros as $maestro) {

                    echo "<option  ".($row["maestroid"]==$maestro['id']? "selected": "" )."  value='" . $maestro['id'] . "'  > " . $maestro['nombre'] . " " . $maestro['apellidos'] . " </option>";
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

                    echo "<option ".($row["grupoid"]==$grupo['id']? "selected": "" )." value='" . $grupo['id'] . "'  > " . $grupo['nombre'] . " </option>";
                }

                ?>



            </select>
        </label>

        <label for="">
            Materia
            <select name="materia" id="">

                <?php

                foreach ($materias as $materia) {

                    echo "<option ".($row["materiaid"]==$materia['id']? "selected": "" )." value='" . $materia['id'] . "'  > " . $materia['nombre'] . " </option>";
                }

                ?>



            </select>
        </label>



<button type="submit">Actualizar</button>

<button>Cancela</button>
</form>
    
</body>
</html>