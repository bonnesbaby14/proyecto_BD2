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
    <title>Materias</title>
</head>
<body>

<?php

$query = "select m.nombre as nombre, c.descripcion as descripcion ,g.nombre as grupo , c.nombre as categoria from asignacion as a inner join grupo as g on g.id=a.idgrupo inner join materia as m on m.id=a.idmateria inner join categorias as c on c.id=m.idcategoria where a.iduser=". $_SESSION['ID'];
// echo $connection;
$materias = mysqli_query($connection, $query);

?>

<div class="container-fluid  text-light bg-dark">
    <div>

    <td>

<a href="./dashboard.php" ><input type="button" class="text-light bg-dark" value="Menú"></a>
    </div>
    <div class = "row">
            <div class="col-md">
                <header class="py-3">
                    <h3>Materias</h3>
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
                    Materias del alumno
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Materia</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Grupo</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                                foreach ($materias as $dato) {
                            ?>

                            <tr>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['categoria']; ?></td>
                                <td><?php echo $dato['descripcion']; ?></td>
                                <td><?php echo $dato['grupo']; ?></td>

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