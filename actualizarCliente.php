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
        $iNombre = $_POST['nombre'];
        $iCorreo = $_POST['correo'];
        $iTelefono = $_POST['telefono']; //Se aplica la función MD5 a la contraseña.
        $id=$_POST['id'];
        $idUser= $_POST['idCliente'];

      

            //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
            //En este caso, la Consulta fue un INSERT-INTO
            $sql="UPDATE  Clientes SET nombre='$iNombre', correo='$iCorreo', telefono='$iTelefono',id_user=$idUser WHERE id=$id ";
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
                header('Location: clientes.php?Message=Se Actualizo con exito');
            }
        
        
    }

?>