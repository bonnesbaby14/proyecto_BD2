<?php
include("../../config/db.php"); 


    // for testing connection
    if(!$connection) {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
    else{

        $usuario = $_POST['usuario'];
        $nombre= $_POST['nombres'];
        $apellidos= $_POST['apellidos'];
        $matricula=$_POST['matricula'];
        $password = MD5($_POST['password']); 

        //Verifica si ya existe un correo en la tabla login.
        $query = "SELECT registro FROM user WHERE user='$user'";
        $resultcorreo = mysqli_query($connection, $query);
        //Verificamos cuantas filas (row) trae la consulta 
        $num_rows = mysqli_num_rows($resultcorreo);
        if ($num_rows>=1)
        {
            echo "<script>alert('Este correo ya existe.')</script>";
            header('Location: registrarMaestro.php?Error=Este usuario ya existe.&nombre='.$nombre.'&user='.$user);
        }
        else
        {

            //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
            //En este caso, la Consulta fue un INSERT-INTO
            $sql="INSERT INTO user(id, user, password, nombre, apellidos,registro,tipo,grado,activo) VALUES(NULL,'$usuario','$password', '$nombre', '$apellidos', '$matricula', 'admin', NULL,'1')";
            $resultado =mysqli_query($connection, $sql);
      
            
            if (!$resultado)
            {
                echo 'Error en la Consulta.'.mysqli_connect_error().$nombre.$password.$user;
                //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de Registro.
                // header('Location: formulario.html');
            }
            else{
                echo 'Se realizó correctamente el registro.';
                //Una vez que se insertaron los datos en la tabla "login", cargamos la pagina: "loginvista.html" 
                header('Location: admins.php?Message=Se Registro con exito');
            }
        }
        
    }

?>