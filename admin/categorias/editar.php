
<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}
    include("../../config/db.php"); 
    $id=$_POST['id'];
    $sql = "SELECT * FROM categorias WHERE id=$id ";

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
    nombre de la categoria
    <input type="text" value="<?php echo $row["nombre"] ?>" name="nombre" id="">
</label>

<label for="">
    Categoria
   <textarea  name="descripcion" id="" cols="30" rows="10"><?php echo $row["descripcion"] ?></textarea>
</label>

<button type="submit">Actualizar</button>

<button>Cancela</button>
</form>
    
</body>
</html>