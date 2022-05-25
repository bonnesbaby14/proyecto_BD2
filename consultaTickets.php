<?php
session_start();

    //Realizamos la conexion a la BD: "cursos"

    $connection = mysqli_connect('localhost', 'root', '', 'cursos');

    // for testing connection
    if(!$connection) {
        echo 'Error de conexion a la BD...'. mysqli_connect_error();
        exit();
    }
   
        

        //Verifica si ya existe un correo en la tabla login.
        $id=$_SESSION['ID'];
        $query = "SELECT * FROM Tickets WHERE id_user=$id";
        $resultcorreoTickets = mysqli_query($connection, $query);
        //Verificamos cuantas filas (row) trae la consulta

    
