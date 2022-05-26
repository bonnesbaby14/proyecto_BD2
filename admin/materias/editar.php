
<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}
    include("../../config/db.php"); 
    $id=$_POST['id'];
    $sql = "SELECT * FROM materia WHERE id=$id ";

    $resultado = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($resultado);
    $query = "SELECT * FROM categorias ";

    $categorias = mysqli_query($connection, $query);
  

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
    nombre de la materia
    <input type="text" name="nombre" id="" value="<?php echo $row['nombre'] ?>">
</label>

<label for="">
    Categoria
    <select name="categoria" id="">

    <?php

foreach($categorias as $categoria){

    echo "<option  ".($row["idcategoria"]==$categoria['id']? "selected": "" )."  value='".$categoria['id']."'  > ".$categoria['nombre']." </option>";


}

?>
    


    </select>
</label>

<button type="submit">Actualizar</button>

<button>Cancela</button>
</form>
    
</body>
</html>