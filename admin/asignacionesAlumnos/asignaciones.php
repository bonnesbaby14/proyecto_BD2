<?php 
session_start();
if (!isset($_SESSION["ID"]) or $_SESSION["tipo"]!="admin") {
    header('Location: ./../../login2.php ');}


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
    <title>Asignaciones</title>

    <style>

table{
	background-color: white;
	text-align: left;
	width: 100%;
	border-collapse: collapse;
}

tr,td {
	padding: 10px;
}

thead{
	background-color: #246355;
	border-bottom: solid 5px #0F362D;
	color: white;
}


</style>
</head>

<body>

    <?php


    $query = "select u.registro as matricula, a.id as id, CONCAT(u.nombre,' ' ,u.apellidos) as alumno, m.nombre as materia,g.nombre as grupo from asignacion as a inner join user as u on u.id=a.iduser inner join grupo as g on g.id=a.idgrupo inner join materia as m on m.id=a.idmateria where u.tipo='alumno' and a.activo=1";
    $asignaciones = mysqli_query($connection, $query);

    $query = "SELECT * FROM user where activo='1' and tipo='alumno'";
    $alumnos = mysqli_query($connection, $query);

    $query = "SELECT * FROM materia where activo='1' ";
    $materias = mysqli_query($connection, $query);

    $query3 = "SELECT id, nombre, apellidos from user where activo='1' and tipo= 'maestro'";
    $maestros = mysqli_query($connection, $query3); 

    $query = "SELECT * FROM grupo where activo='1' ";
    $grupos = mysqli_query($connection, $query);

    $ids='';

    ?>

<div class="container-fluid  text-light bg-dark">
    <div>

    <td>

<a href="../dashboard.php" ><input type="button" class="text-light bg-dark" value="P??gina anterior"></a>
    </div>
    <div class = "row">
            <div class="col-md">
                <header class="py-3">
                    <h3>Asignaciones alumnos</h3>
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
                    Asignaciones alumnos
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Matricula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Materia</th>
                                <th scope="col">Grupo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                                foreach ($asignaciones as $dato) {
                            ?>

                            <tr>
                                <td><?php echo $dato['matricula']?></td>
                                <td><?php echo $dato['alumno']; ?></td>
                                <td><?php echo $dato['materia']; ?></td>
                                <td><?php echo $dato['grupo']; ?></td>
                             
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
                    <div class = "mb-3"> 
                    <table>

<tr>
    <th>Matricula</th>
    <th>Nombre</th>
    <th></th>
  
   

</tr>


<?php 
foreach ($alumnos as $alumno) {
    $ids=$ids.",".$alumno['id'];
echo "<tr>
    <td> " . $alumno['registro'] . " </td>
    <td> " . $alumno['nombre'] ." ". $alumno['apellidos'] . " </td>
    <td> <input type='checkbox' name='alumno".$alumno['id']."' value='".$alumno['id']."'>   </td>
    <td>
    
</tr>
";
}

?>

</table>
<input type="hidden" name="ids" value="<?php echo $ids; ?>">
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