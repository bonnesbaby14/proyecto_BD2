<?php
include("../../config/db.php"); 

if(empty($_POST["txtNombre"]) || empty($_POST["txtCategoria"]) || ($_POST["txtCategoria"]) == "Seleccione una categoria" ){
    header('Location: materias.php?mensaje=falta');
    exit();
}

    // for testing connection
    if(!$connection) {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
    else{

        $nombre= $_POST['txtNombre'];
        $categoria= $_POST['txtCategoria'];
        $id = $_POST['codigo'];
        // var_dump($id);
       // echo $id;
        //echo $categoria;

        

            //La función: "mysqli_query" ejecuta cualquier instrucción SQL en la BD correspondiente que se encuentre en la conexión especificada.
            //En este caso, la Consulta fue un INSERT-INTO
            $sql="UPDATE  materia SET  nombre='$nombre', idcategoria='$categoria',activo='1' WHERE id='$id' ";
            //echo $sql;
            $resultado =mysqli_query($connection, $sql);
          
          //  echo $resultado;
      
            
            if (!$resultado)
            {
                echo 'Error en la Consulta.'.mysqli_connect_error().$nombre.$password.$user;
                //Podemos tambien redireccionarlo de nueva cuenta a la pagina de Formulario de Registro.
                header('Location:  materias.php?mensaje=falta');
            }
            else{
                echo 'Se realizó correctamente el registro.';
                //Una vez que se insertaron los datos en la tabla "login", cargamos la pagina: "loginvista.html" 
                header('Location:  materias.php?mensaje=editado');
            }
        
        
    }

?>