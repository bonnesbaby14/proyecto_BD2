<?php
include("../../config/db.php"); 

if( ($_POST["txtGrupo"]) == "Seleccione un grupo:" ||($_POST["txtMateria"]) == "Seleccione una materia:"  || ($_POST["txtMaestro"]) == "Seleccione un maestro:" ){
    header('Location: asignaciones.php?mensaje=falta');
    exit();
}

    // for testing connection
    if(!$connection) {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
    else{

        $grupo= $_POST['txtGrupo'];
        $materia = $_POST['txtMateria'];
        $maestro = $_POST['txtMaestro'];
        $id = $_POST['codigo'];
        // var_dump($id);
       // echo $id;
        //echo $categoria;

        

            //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
            //En este caso, la Consulta fue un INSERT-INTO
            $sql="UPDATE  asignacion SET  idgrupo='$grupo', iduser='$maestro',activo='1', idmateria='$materia' WHERE id='$id' ";
            echo $sql;
            $resultado =mysqli_query($connection, $sql);
          
          //  echo $resultado;
      
            
            if (!$resultado)
            {
                echo 'Error en la Consulta.'.mysqli_connect_error().$nombre.$password.$user;
                //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de Registro.
                header('Location:  asignaciones.php?mensaje=falta');
            }
            else{
                echo 'Se realizó correctamente el registro.';
                //Una vez que se insertaron los datos en la tabla "login", cargamos la pagina: "loginvista.html" 
                header('Location:  asignaciones.php?mensaje=editado');
            }
        
        
    }

?>