<?php 
if (!isset($_SESSION["ID"]) or $_SESSION["tipo"]=="admin") {
    header('Location: login.php');}


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
    <title>Asiganciones</title>
</head>

<body>

    <?php


    $query = "select a.id as id, u.nombre as maestro_nombre, u.apellidos as maestro_apellidos, g.nombre as grupo, m.nombre as materia from asignacion as a inner join user as u on u.id=a.iduser inner join grupo as g on g.id=a.idgrupo inner join materia as m on m.id=a.idmateria where u.tipo='maestro' and a.activo=1";
    $asignaciones = mysqli_query($connection, $query);

    $query = "SELECT * FROM materia where activo='1' ";
    $materias = mysqli_query($connection, $query);

    $query3 = "SELECT id, nombre, apellidos from user where activo='1' and tipo= 'maestro'";
    $maestros = mysqli_query($connection, $query3); 

    $query = "SELECT * FROM grupo where activo='1' ";
    $grupos = mysqli_query($connection, $query);

    ?>

    
<div class="container-fluid  text-light bg-dark">
    <div>

    <td>

<a href="../dashboard.php" ><input type="button" class="text-light bg-dark" value="Página anterior"></a>
    </div>
    <div class = "row">
            <div class="col-md">
                <header class="py-3">
                    <h3>Asignaciones grupos</h3>
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
                    Asignaciones grupos
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Profesor</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Materia</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                                foreach ($asignaciones as $dato) {
                            ?>

                            <tr>
                                <td><?php echo $dato['maestro_nombre'].' '. $dato['maestro_apellidos']; ?></td>
                                <td><?php echo $dato['grupo']; ?></td>
                                <td><?php echo $dato['materia']; ?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a class="text-danger" href="./delete.php?id=<?php echo $dato['id']; ?>"><i class="bi bi-trash"></i></a></td>
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
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                    <select name="txtMaestro" class="form-select form-select-md" aria-label=".form-select-sm example">
                        <option selected>Selecciona maestro</option>
                        <?php 
                                foreach ($maestros as $dato) {
                            ?>
                        <option  value= <?php echo $dato['id']; ?>><?php echo $dato['nombre'].' '.$dato['apellidos']; ?></option>
                        <?php 
                                }
                            ?>
                    </select>
                    </div>
                    <div class="mb-3">
                    <select name="txtMateria" class="form-select form-select-md" aria-label=".form-select-sm example">
                        <option selected>Selecciona materia</option>
                        <?php 
                                foreach ($materias as $dato) {
                            ?>
                        <option  value= <?php echo $dato['id']; ?>><?php echo $dato['nombre']; ?></option>
                        <?php 
                                }
                            ?>
                    </select>
                    </div>
                    <div class="mb-3">
                    <select name="txtGrupo" class="form-select form-select-md" aria-label=".form-select-sm example">
                        <option selected>Selecciona grupo</option>
                        <?php 
                                foreach ($grupos as $dato) {
                            ?>
                        <option  value= <?php echo $dato['id']; ?>><?php echo $dato['nombre']; ?></option>
                        <?php 
                                }
                            ?>
                    </select>
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