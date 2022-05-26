
<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}



    include("../../config/db.php"); 

    $query = "SELECT * FROM categorias ";
$categorias = mysqli_query($connection, $query);

    
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
    nombre de la materia
    <input type="text" name="nombre" id="">
</label>

<label for="">
    Categoria
    <select name="categoria" id="">

    <?php

foreach($categorias as $categoria){

    echo "<option value='".$categoria['id']."'  > ".$categoria['nombre']." </option>";


}

?>
    


    </select>
</label>


<button type="submit">registar</button>

<button>Cancela</button>
</form>
    
</body>
</html>