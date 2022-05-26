
<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}



    include("../../config/db.php"); 

 

    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Categoria</title>
</head>
<body>


<form action="./store.php" method="post">



<label for="">
    nombre de la categoria
    <input type="text" name="nombre" id="">
</label>

<label for="">
    Categoria
   <textarea name="descripcion" id="" cols="30" rows="10"></textarea>
</label>


<button type="submit">registar</button>

<button>Cancela</button>
</form>
    
</body>
</html>