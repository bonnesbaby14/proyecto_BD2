<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>

<form action="updateMaestro.php" method="post">

<input type="hidden" name="ID" value="<?php echo($_POST['id']);?>">


<label for="">
    usuario
    <input type="text" name="usuario" id="">
</label>

<label for="">
    nombre
    <input type="text" name="nombres" id="">
</label>
<label for="">
    apellidos
    <input type="text" name="apellidos" id="">
</label>
<label for="">
    password
    <input type="text" name="password" id="">
</label>
<label for="">
    Matricula
    <input type="text" name="matricula" id="">
</label>

<button type="submit">registar</button>

<button>Cancela</button>
</form>
    
</body>
</html>