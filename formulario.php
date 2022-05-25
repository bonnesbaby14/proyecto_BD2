<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/formulario.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <title>Registrate</title>
      <link rel="stylesheet" href="css/formulario.css">
    </head>
    <body>
            <form action="registrar.php" method="post" class="formulario">
                <h1>Registrate</h1>
                <div class="contenedor">

                    <div class="input-contenedor">
                        <i class='bx bxs-user icon'></i>
                        <input type="text" name="txtNombre" value="<?php if(isset($_GET['Nombre'])) echo $_GET['Nombre']; ?>"  placeholder="Nombre Completo" required>
                    </div>
                        <?php
                            if (isset($_GET['Error']))
                                echo $_GET['Error'];
                        ?>
                    <div class="input-contenedor">
                        <i class='bx bx-envelope icon'></i>
                        <input type="email" name="eCorreo" value="<?php if(isset($_GET['Correo'])) echo $_GET['Correo']; ?>" placeholder="correo electronico" required>
                        
                    </div>
                    
                    <div class="input-contenedor">
                        <i class='bx bx-lock-alt icon'></i>
                        <input type="password" name="pContrasenia" placeholder="contraseña" required>
                    </div>

                    <input type="submit" value="Registrate" class="button">

                    <p>Al registrarte, aceptas las condiciones de uso y privacidad.</p>
                    <p>¿Ya tienes cuenta? <a href="login.php" class="link">Iniciar Sesión</a></p>
                </div>
            </form>
        
    </body>

</html>