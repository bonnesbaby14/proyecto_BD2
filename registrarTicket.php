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
        $iNombre = $_POST['fecha'];
        $iCorreo = $_POST['importe'];
        $idCliente = $_POST['id_cliente']; //Se aplica la función MD5 a la contraseña.
        $idUser= $_POST['id_user'];

      

            //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
            //En este caso, la Consulta fue un INSERT-INTO
            $sql="INSERT INTO Tickets (id, fecha, importe,id_cliente,id_user) VALUES(NULL,'$iNombre','$iCorreo', '$idCliente',$idUser)";
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
                header('Location: tickets.php?Message=Se Registro con exito');
            }
        
        
    }

?>