
<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}



    include("../config/db.php"); 
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


$query = "select a.id as asigancion, u.registro as matricula ,concat(u.nombre,' ', u.apellidos) as alumno, a.primer_parcial as primero, a.segundo_parcial as segundo, a.tercer_parcial as tercero from asignacion as a inner join user as u on u.id=a.iduser where idgrupo='".$grupoid."' and a.idmateria='".$materiaid."' and u.tipo='alumno'" ;
// echo $query;
$calificaciones = mysqli_query($connection, $query);


?>

<form action="./calificaciones.php" method="get">


    <label for="">
        Grupos
            <select name="grupo" id="">
                
                <?php

foreach ($grupos as $grupo) {
    
    echo "<option value='" . $grupo['id'] . "'  > " . $grupo['nombre'] . " </option>";
}

?>



</select>
</label>

<label for="">
    Materia
    <select name="materia" id="">
        
        <?php

foreach ($materias as $materia) {
    
    echo "<option value='" . $materia['id'] . "'  > " . $materia['nombre'] . " </option>";
}

?>



</select>
</label>


<button type="submit">Filtrar</button>
</form>

<form action="./registrar.php" method="post">


<h1>Calificaciones</h1>
<input type="hidden" name="grupo" value='<?php echo $grupoid; ?>'>
<input type="hidden" name="materia" value='<?php echo $materiaid; ?>'>


<table>
    <thead>
        <tr>
            <td>Matricula</td>
            <td>Alumno</td>
            <td>Primer Parcial</td>
            <td>Segundo Parcial</td>
            <td>Tercer Parcial</td>
            
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

            <td>  <input type='number' name='primero-" . $calificacion['asigancion'] . "' id='' value='" . $calificacion['primero'] . "'>  </td>
            <td>  <input type='number' name='segundo-" . $calificacion['asigancion'] . "' id='' value='" . $calificacion['segundo'] . "'>  </td>
            <td>  <input type='number' name='tercero-" . $calificacion['asigancion'] . "' id='' value='" . $calificacion['tercero'] . "'>  </td>
        
       
            
           
        </tr>
        ";
        }
    ?>

    </tbody>
</table>


<input type="hidden" name="asignaciones" value="<?php echo $asignaciones; ?>">

<button type="submit">Guardar</button>
</form>



</body>
</html>