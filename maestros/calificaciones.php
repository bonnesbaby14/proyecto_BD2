<?php 
session_start(); 
if (!isset($_SESSION["ID"]) or $_SESSION["tipo"]!="maestro") {
    header('Location: ./../../login2.php ');}
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
$materias = mysqli_query($connection, $query);

$query = "select g.nombre as nombre, g.id as id from asignacion as a inner join grupo as g on g.id=a.idgrupo where a.iduser='".$_SESSION['ID']."' and a.activo='1'";
$grupos = mysqli_query($connection, $query);


$query = "select a.id as asigancion, u.registro as matricula ,concat(u.nombre,' ', u.apellidos) as alumno, a.primer_parcial as primero, a.segundo_parcial as segundo, a.tercer_parcial as tercero from asignacion as a inner join user as u on u.id=a.iduser where idgrupo='".$grupoid."' and a.idmateria='".$materiaid."' and u.tipo='alumno' and u.activo=1" ;
// echo $query;
$calificaciones = mysqli_query($connection, $query);


?>


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

<input type="hidden" name="grupo" value='<?php echo $grupoid; ?>'>
<input type="hidden" name="materia" value='<?php echo $materiaid; ?>'>

</br>
<form action="./calificaciones.php" method="get">


<div class="mb-3">
    <label for="">
        Grupos
            <select class="form-select"  aria-label=".form-select-sm example" name="grupo" id="">
            <option selected>Selecciona el grupo</option>
                <?php

foreach ($grupos as $grupo) {

    echo "<option value='" . $grupo['id'] . "'  > " . $grupo['nombre'] . " </option>";
}

?>



</select>
</label>

<label for="">
    Materia
    <select class="form-select"  aria-label=".form-select-sm example" name="materia" id="">
    <option selected>Selecciona la materia</option>
        <?php

foreach ($materias as $materia) {

    echo "<option value='" . $materia['id'] . "'  > " . $materia['nombre'] . " </option>";
}

?>



</select>
</label>


<button class="btn btn-secondary" type="submit">Filtrar</button>
</form>

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
                <th scope="col">Matricula</th>
                <th scope="col">Alumno</th>
                <th scope="col">Primer Parcial</th>
                <th scope="col">Segundo Parcial</th>
                <th scope="col">Tercer Parcial</th>

            </tr>

        </thead>
    <tbody>
    <?php
    $asignaciones="";
    foreach ($calificaciones as $calificacion) {
        $asignaciones=$asignaciones.",".$calificacion['asigancion'];
        echo "<tr>
            <td> " . $calificacion['matricula'] . " </td>
            <td> " . $calificacion['alumno'] . " </td>
            <td>  <input style='width:90%' type='number' name='primero-" . $calificacion['asigancion'] . "' id='' value='" . $calificacion['primero'] . "'>  </td>
            <td>  <input style='width:90%' type='number' name='segundo-" . $calificacion['asigancion'] . "' id='' value='" . $calificacion['segundo'] . "'>  </td>
            <td>  <input style='width:90%' type='number' name='tercero-" . $calificacion['asigancion'] . "' id='' value='" . $calificacion['tercero'] . "'>  </td>
        
       
            
           
        </tr>
        ";
        }
    ?>

    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>

<input type="hidden" name="asignaciones" value="<?php echo $asignaciones; ?>">
&nbsp;&nbsp;

<div class="d-grid gap-2 col-5 mx-auto">
<button class="btn btn-primary" type="submit">Guardar</button>
</div>
</form>



</body>
</html> 