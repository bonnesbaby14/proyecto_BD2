<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/formulario.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
font-family: Arial, Helvetica, sans-serif;
margin: 0;
background: url(../images/mac.jpg);
background-size: cover;
background-attachment: fixed;

}

*{
box-sizing: border-box;
}

.contenedor{
width: 100%;
padding: 15px;
}

.formulario{
background: #fff;
margin-top: 150px;
padding: 3px;
}

h1{
text-align: center;
color: #1a2537;
font-size: 40px;
}

input[type="text"], input[type="password"]{
font-size: 20px;
width: 80%;
padding: 10px;
border: none;
} 

.input-contenedor{
margin-bottom: 15px;
width: 95%;
border: 1px solid #aaa;
}

.icon{
min-width: 50px;
text-align: center;
color: #999;
}

.button{
border: none;
width: 95%;
color: white;
font-size: 20px;
background: #1a2537;
padding: 15px 20px;
border-radius: 5px;
cursor: pointer;
}

.button:hover{
background: cadetblue;
}

p{
text-align: center;
}

.link{
text-decoration: none;
color: #1a2537;
}

.link:hover{
background: cadetblue;
}

@media screen and (max-width:768px)
{
.formulario{
    margin: auto;
    width: 500px;
    margin-top: 150px;
    border-radius: 2%;
}
}
    </style>
</head>
<body>
    <form action="veriflogin.php" method="post" class="formulario">
        <h1>Login</h1>
        <?php
        if (isset($_GET['Message']))
            echo $_GET['Message'];
    ?>
        <div class="contenedor">

            <div class="input-contenedor">
                <i class='bx bx-envelope icon'></i>
                <input type="text" name="txtCorreo" placeholder="correo electronico" required>
            </div>

            <div class="input-contenedor">
                <i class='bx bx-lock-alt icon'></i>
                <input type="password" name="txtContra" placeholder="contraseña" required>
            </div>

            <input type="submit" value="Login" class="button">

            <p>Al registrarte, aceptas las condiciones de uso y privacidad.</p>
            <p>¿No tienes cuenta? <a href="formulario.php" class="link">Registrate</a></p>
        </div>
    </form>
</body>
</html>