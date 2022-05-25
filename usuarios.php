<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/tabla.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Menú Responsive</title>
</head>

    <script>
        function editar(id_login)
        {
            //alert("Seleccionaste el ID: "+id_login);
            window.location="usuarios.php?editausuario="+id_login;
        }
    </script>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class='bx bx-menu'></i>
        </label>
        <a href="index.php" class="enlace">
            <img src="../images/logo.png" alt="" class="logo">
        
        <?php
            if (!isset($_SESSION["ID"]))
            {
                header('Location: ../index.html');
            }
            else
            {
                echo "Bienvenid@: ".$_SESSION['Nombre'];
            }
        ?>
        </a>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="usuarios.php" class="active">Usuarios</a></li>
            <li><a href="cursos.php">Cursos</a></li>
            <li><a href="../php/salir.php" >Salir</a></li>
        </ul>
    </nav>

    <section>
            <h1>Sección: Usuarios.</h1>
            
            <?php
                //Realizamos la conexion a la BD: "cursos"
                $connection = mysqli_connect('localhost', 'root', 'root', 'cursos');

                // for testing connection
                if(!$connection) {
                    echo 'Error de conexion a la BD...'. mysqli_connect_error();
                    exit();
                }
                else{
                    
                    if (isset($_GET['editausuario']))
                    {
                        //Aqui se muestra el formulario haciendo una consulta para extraer los datos ...
                        echo 'Aqui de edita al usuario: '.$_GET['editausuario'];
                        
                    }
                    else
                    {
                    //Consultamos todos los registros de la tabla "login"
                    $query = "SELECT idlogin, nombre, correo FROM login ORDER BY nombre";
                    $resultado = mysqli_query($connection, $query);

                    if (!$resultado)
                    {
                        echo 'Error en la Consulta.'.mysqli_connect_error();

                    }
                    else
                    {
                        //Verificamos cuantas filas (row) trae la consulta 
                        $num_rows = mysqli_num_rows($resultado);

                        //Una vez que fue correcta la consulta y que existe el usuario en la tabla "login", cargamos la pagina: "menuresponsivo.html"
                        
                        if ($num_rows==0)
                            echo "Se encontraron 0 registros.";
                        else
                        {
                            
                            echo '<table>'; //Se crea la tabla 
                            echo '<tr>'; //Crear una fila 
                            echo '<th>ID LOGIN</th> <th>NOMBRE</th> <th>CORREO</th> <th colspan="2" align="center">Acciones</th>';
                            echo '</tr>'; //Se cierra la fila 

                            //Mostramos todos los registros de la consulta 
                            while ($row = mysqli_fetch_array($resultado))
                            {
                                $cIdLog = $row['idlogin'];
                                $cNombre = $row['nombre'];
                                $cCorreo = $row['correo'];

                                echo '<tr>';
                                echo '<td>'.$cIdLog.' </td> <td>'.$cNombre.' </td> <td>'.$cCorreo.' </td>';
                                echo '<td> <input type="button" onclick="editar('.$cIdLog.');" class="boton" value="Editar"> </td>';
                                echo '<td> <input type="button" onclick="eliminar('.$cIdLog.');" class="boton2" value="Eliminar"> </td>';
                                echo '</tr>';

                            }
                            echo '</table>';
                        
                            mysqli_close($connection); //Cierra la conexión activa ...
                        }
                        
                    }
                }
                }

            ?>
    </section>

    <footer>
        <p>Copyright &copy; 2021</p>
    </footer>

</body>
</html>