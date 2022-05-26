
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
    <title>Registrar grupo</title>
</head>
<body>


<form action="./store.php" method="post">



<label for="">
    nombre del grupo
    <input type="text" name="nombre" id="">
</label>


<label for="">
    grado
    <input type="number" name="grado" id="">
</label>


<button type="submit">registar</button>

<button>Cancela</button>
</form>
    
</body>
</html>