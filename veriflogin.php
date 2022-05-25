<?php
session_start();

    //Realizamos la conexion a la BD: "cursos"

    $connection = mysqli_connect('localhost', 'root', '', 'cursos');

    // for testing connection
    if(!$connection) {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
    else{
        
        //Tomamos las variables que viene del POST del formulario "loginvista.html".
        $cCorreo = $_POST['txtCorreo'];
        $cPassw = MD5($_POST['txtContra']); //Se aplica la función MD5 a la contraseña.

        //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
        //En este caso, la Consulta fue un SELECT-FROM-WHERE
        $sql="SELECT * FROM login WHERE correo='$cCorreo' AND contrasenia='$cPassw'";
        
        $resultado =mysqli_query($connection, $sql);
        $count = mysqli_num_rows($resultado);
        if($count == 1) {
            echo 'Se realizó correctamente la consulta.';
                
          
            $row = mysqli_fetch_array($resultado);
        
            $_SESSION['ID'] = $row['id'];
            $_SESSION['Nombre'] = $row['nombre'];
            $_SESSION['eMail'] = $row['correo'];

            //Se genera la Sesión para el usuario y se manda llamar al index.php de la carpeta: admin
            header('Location: dashboard.php'); 
        
            //Una vez que fue correcta la consulta y que existe el usuario en la tabla "login", cargamos la pagina: "menuresponsivo.html"
                // header('Location: menuresponsivo.html');
         }else {
                echo 'Error en la Consulta.'.mysqli_connect_error();
            //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de "loginvista.html".
            header('Location: login.php?Message=El correo o contraseña son incorrectas');
        
         }
        // if (!$resultado)
        // {
        //     echo 'Error en la Consulta.'.mysqli_connect_error();
        //     //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de "loginvista.html".
        //     header('Location: login.php?Message=El correo o contraseña son incorrectas');
        // }
        // else{
        //     echo 'Se realizó correctamente la consulta.';
        //     //Una vez que fue correcta la consulta y que existe el usuario en la tabla "login", cargamos la pagina: "menuresponsivo.html"
        //     header('Location: menuresponsivo.html');
        // }
        
    }
