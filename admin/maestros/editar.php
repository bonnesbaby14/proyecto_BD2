
<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}
    include("../../config/db.php"); 
    $id=$_POST['id'];
    $sql = "SELECT * FROM user WHERE id=$id ";

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
    usuario
    <input type="text" name="usuario" value="<?php echo $row["user"] ?>">
</label>

<label for="">
    nombre
    <input type="text" name="nombres" id="" value="<?php echo $row["nombre"] ?>">
</label>
<label for="">
    apellidos
    <input type="text" name="apellidos" id="" value="<?php echo $row["apellidos"] ?>">
</label>
<label for="">
    password
    <input type="text" name="password" id="" value="<?php echo $row["password"] ?>">
</label>
<label for="">
    Matricula
    <input type="text" name="matricula" id="" value="<?php echo $row["registro"] ?>">
</label>

<button type="submit">Actualizar</button>

<button>Cancela</button>
</form>
    
</body>
</html>