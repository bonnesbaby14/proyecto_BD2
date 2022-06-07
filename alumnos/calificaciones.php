<?php 
session_start(); 
if (!isset($_SESSION["ID"]) or $_SESSION["tipo"]!="alumno") {
    header('Location: ./../../login2.php ');}
    include("../config/db.php"); 
    
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Calificaciones</title>
</head>
<body>


<?php

$query = "select m.nombre as nombre, a.primer_parcial, a.segundo_parcial, a.tercer_parcial, g.nombre as grupo, round((a.primer_parcial + a.segundo_parcial +a.tercer_parcial)/3,2) as promedio from asignacion as a inner join grupo as g on g.id=a.idgrupo inner join materia as m on m.id=a.idmateria  where a.iduser=". $_SESSION['ID'];
// echo $connection;
$calificaciones = mysqli_query($connection, $query);

?>

<div class="container-fluid  text-light bg-dark">
    <div>

    <td>

<a href="./dashboard.php" ><input type="button" class="text-light bg-dark" value="Menú"></a>
    </div>
    <div class = "row">
            <div class="col-md">
                <header class="py-3">
                    <h3>Calificaciones</h3>
                </header>

            </div>
    </div> 
</td>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Calificaciones del alumno
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Materia</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Primer Parcial</th>
                                <th scope="col">Segundo Parcial</th>
                                <th scope="col">Tercer Parcial</th>
                                <th scope="col">Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                                foreach ($calificaciones as $dato) {
                            ?>

                            <tr>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['grupo']; ?></td>
                                <td><?php echo $dato['primer_parcial']; ?></td>
                                <td><?php echo $dato['segundo_parcial']; ?></td>
                                <td><?php echo $dato['tercer_parcial']; ?></td>
                                <td><?php echo $dato['promedio']; ?></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div> 
    </div> 
</div>     
</body>
</html>