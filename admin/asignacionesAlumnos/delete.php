<?php
 include("../../config/db.php"); 


    // for testing connection
    if(!$connection) {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
    else{

        $id=$_GET['id'];
       
       // var_dump($id);

        

            //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
            //En este caso, la Consulta fue un INSERT-INTO
            $sql="UPDATE asignacion SET activo='0' WHERE id=$id";
            $resultado =mysqli_query($connection, $sql);
      
            
            if (!$resultado)
            {
                echo 'Error en la Consulta.'.mysqli_connect_error().$nombre.$password.$user;
                header('Location:  asignaciones.php?');
                //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de Registro.
                // header('Location: formulario.html');
            }
            else{
                echo 'Se realizó correctamente el registro.';
                //Una vez que se insertaron los datos en la tabla "login", cargamos la pagina: "loginvista.html" 
                header('Location:  asignaciones.php?mensaje=eliminado');
            }
        
        
    }

?>