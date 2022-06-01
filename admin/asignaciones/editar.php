<?php
    if(!isset($_GET['codigo'])){
        echo $_GET['codigo'];
        header('Location: index.php?mensaje=error');
        exit();
    }

    include("../../config/db.php"); 
    $id=$_GET['codigo'];

    $sql = "select a.id as id,u.id as maestroid,g.id as grupoid,m.id as materiaid, u.nombre as maestro_nombre, u.apellidos as maestro_apellidos, 
    g.nombre as grupo, m.nombre as materia from asignacion as a inner join user as u on u.id=a.iduser inner join grupo as g on g.id=a.idgrupo
    inner join materia as m on m.id=a.idmateria where u.tipo='maestro' and a.activo=1 and a.id=$id";
   
    $resultado = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($resultado);
   


    $query = "SELECT * FROM user where activo='1' and tipo='maestro' ";
    $maestros = mysqli_query($connection, $query);

    $query = "SELECT * FROM materia where activo='1' ";
    $materias = mysqli_query($connection, $query);

    $query = "SELECT * FROM grupo where activo='1' ";
    $grupos = mysqli_query($connection, $query);

   // echo $persona;

?>
<!doctype html>
<html lang="es">
  <head>
    <title>CRUD asignaciones</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>
  <body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
              

                <form class="p-4" method="POST" action="update.php">
                
                <?php 
                                foreach ($resultado as $d) {
                            ?>

                    <div class="mb-3">
                    <select name="txtMaestro" class="form-select form-select-md" aria-label=".form-select-sm example">
                        <option selected>Seleccione un maestro:</option>
                        <?php 
                                foreach ($maestros as $datos) {
                            ?>
                        <option  value= <?php echo $datos['id']; ?>><?php echo $datos['nombre'].' '.$datos['apellidos']; ?></option>
                        <?php 
                                }
                            ?>
                    </select>
                    </div>
                    <div class="mb-3">
                    <select name="txtMateria" class="form-select form-select-md" aria-label=".form-select-sm example">
                        <option selected>Seleccione una materia:</option>
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
                        <option selected>Seleccione un grupo:</option>
                        <?php 
                                foreach ($grupos as $dat) {
                            ?>
                        <option  value= <?php echo $dat['id']; ?>><?php echo $dat['nombre']; ?></option>
                        <?php 
                                }
                            ?>
                    </select>
                    </div>
                    
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $d['id']; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>

                    <?php 
                                }
                            ?>
                    
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

