
<?php /*session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}
*/


    include("../config/db.php"); 
    
    ?>
<!DOCTYPE html>
<html lang="en">
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

$grupoid=null;
$materiaid=null;

if(isset($_GET['grupo'])){
$grupoid=$_GET['grupo'];
    
}
if(isset($_GET['materia'])){
    $materiaid=$_GET['materia'];
        
    }

$query = "select m.nombre as nombre, m.id as id from asignacion as a inner join materia as m on m.id=a.idmateria where a.iduser='".$_SESSION['ID']."' and a.activo='1'";
$materia = mysqli_query($connection, $query);

$query = "select g.nombre as nombre, g.id as id from asignacion as a inner join grupo as g on g.id=a.idgrupo where a.iduser='".$_SESSION['ID']."' and a.activo='1'";
$grupo = mysqli_query($connection, $query);


$query = "select a.id as asigancion, u.registro as matricula ,concat(u.nombre,' ', u.apellidos) as alumno, a.primer_parcial as primero, a.segundo_parcial as segundo, a.tercer_parcial as tercero from asignacion as a inner join user as u on u.id=a.iduser where idgrupo='".$grupoid."' and a.idmateria='".$materiaid."' and u.tipo='alumno'" ;
// echo $query;
$calificaciones = mysqli_query($connection, $query);

$query = "select a.id as id, u.nombre as maestro_nombre, u.apellidos as maestro_apellidos, g.nombre as grupo, m.nombre as materia from asignacion as a inner join user as u on u.id=a.iduser inner join grupo as g on g.id=a.idgrupo inner join materia as m on m.id=a.idmateria where u.tipo='maestro' and a.activo=1";
$asignaciones = mysqli_query($connection, $query);

$query = "SELECT * FROM materia where activo='1' ";
$materias = mysqli_query($connection, $query);

$query3 = "SELECT id, nombre, apellidos from user where activo='1' and tipo= 'alumno'";
$alumnos = mysqli_query($connection, $query3); 

$query = "SELECT * FROM grupo where activo='1' ";
$grupos = mysqli_query($connection, $query);


?>




</label>



<form action="./registrar.php" method="post">



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
                    Calificaciones
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

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                    <select name="txtMaestro" class="form-select form-select-md" aria-label=".form-select-sm example">
                        <option selected>Selecciona alumno</option>
                        <?php 
                                foreach ($alumnos as $dato) {
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
                    <div class="mb-3">
                        <label class="form-label">Calificación P1: </label>
                        <input type="number" min="0" class="form-control" name="txtCal1" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calificación P2: </label>
                        <input type="number" min="0" class="form-control" name="txtCal2" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calificación P3: </label>
                        <input type="number" min="0" class="form-control" name="txtCal3" autofocus required>
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



</form>



</body>
</html>