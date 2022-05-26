
<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}
    include("../../config/db.php"); 
    $id=$_POST['id'];
    $sql = "SELECT * FROM grupo WHERE id=$id ";

    $resultado = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($resultado);

  

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
    nombre del grupo
    <input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" id="">
</label>


<label for="">
    grado
    <input type="number" value="<?php echo $row['grado'] ?>" name="grado" id="">
</label>
<button type="submit">Actualizar</button>

<button>Cancela</button>
</form>
    
</body>
</html>