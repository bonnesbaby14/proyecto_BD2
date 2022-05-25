<?php

    //Realizamos la conexion a la BD: "cursos"

    $connection = mysqli_connect('localhost', 'root', '', 'cursos');

    // for testing connection
    if(!$connection) {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
    else{
        
        //Tomamos las variables que viene del POST del formulario "registrar.html".
        $iNombre = $_POST['txtNombre'];
        $iCorreo = $_POST['eCorreo'];
        $iPassw = MD5($_POST['pContrasenia']); //Se aplica la función MD5 a la contraseña.

        //Verifica si ya existe un correo en la tabla login.
        $query = "SELECT correo FROM login WHERE correo='$iCorreo'";
        $resultcorreo = mysqli_query($connection, $query);
        //Verificamos cuantas filas (row) trae la consulta 
        $num_rows = mysqli_num_rows($resultcorreo);
        if ($num_rows>=1)
        {
            echo "<script>alert('Este correo ya existe.')</script>";
            header('Location: formulario.php?Error=Este correo ya existe.&Nombre='.$iNombre.'&Correo='.$iCorreo);
        }
        else
        {

            //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
            //En este caso, la Consulta fue un INSERT-INTO
            $sql="INSERT INTO login(id, nombre, correo, contrasenia) VALUES(NULL,'$iNombre','$iCorreo', '$iPassw')";
            $resultado =mysqli_query($connection, $sql);
      
            
            if (!$resultado)
            {
                echo 'Error en la Consulta.'.mysqli_connect_error().$iNombre.$iPassw.$iCorreo;
                //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de Registro.
                // header('Location: formulario.html');
            }
            else{
                echo 'Se realizó correctamente el registro.';
                //Una vez que se insertaron los datos en la tabla "login", cargamos la pagina: "loginvista.html" 
                header('Location: login.php?Message=Se Registro con exito');
            }
        }
        
    }

?>