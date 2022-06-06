<?php 
/*session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}


*/
    include("../../config/db.php"); 
    
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

    <title>Tickets</title>
</head>
<body>

<?php

$query = "select * from ticket_soporte";
// echo $connection;
$materias = mysqli_query($connection, $query);

?>

<div class="container-fluid  text-light bg-dark">
    <div>

    <td>

<a href="../dashboard.php" ><input type="button" class="text-light bg-dark" value="Menú"></a>
    </div>
    <div class = "row">
            <div class="col-md">
                <header class="py-3">
                    <h3>Tickets</h3>
                </header>

            </div>
    </div> 
</td>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
             <!-- inicio alerta -->
             <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Listado de tickets
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Texto</th>
                                <th scope="col">Urgencia</th>
                                <th scope="col">Atendida</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                                foreach ($materias as $dato) {
                            ?>

                            <tr>
                                <td><?php echo $dato['texto']; ?></td>
                                <td><?php echo $dato['urgencia']; ?></td>
                                <td><?php if ($dato['atendido'] == '0') {
                                     echo "No";
                                    }else {
                                    echo "Si";
                                    }?></td>
                                <td><a class="text-danger" href="./delete.php?id=<?php echo $dato['id']; ?>"><i class="bi bi-trash"></i></a></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato['id']; ?>"><i class="bi bi-check"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos
                </div>
                <form class="p-4" method="POST" action="registrarTicket.php">
                    <div class="mb-3">
                        <label class="form-label">Texto: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Urgencia: </label>
                        <input type="number" min="1" max="10" class="form-control" name="txtUrgencia" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>     


</body>
</html>