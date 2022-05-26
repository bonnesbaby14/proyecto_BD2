<?php
include("../../config/db.php"); 


    // for testing connection
    if(!$connection) {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
    else{

        $nombre = $_POST['nombre'];
        $grado = $_POST['grado'];
        $fecha = date('Y-m-d H:i:s');

       
            //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
            //En este caso, la Consulta fue un INSERT-INTO

            $sql="INSERT INTO grupo(id, nombre, fecha, grado,activo) VALUES(NULL,'$nombre','$fecha ','$grado','1')";
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
                header('Location: grupos.php?Message=Se Registro con exito');
            }
        
        
    }

?>