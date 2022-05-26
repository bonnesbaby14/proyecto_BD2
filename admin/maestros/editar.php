

<?php
    if(!isset($_GET['codigo'])){
        echo $_GET['codigo'];
        header('Location: index.php?mensaje=error');
        exit();
    }

    include("../../config/db.php"); 
    $id=$_GET['codigo'];
    
    $sql = "SELECT * FROM user WHERE registro= '$id' ";
    //echo $sql;

    $persona = $connection->query($sql);
   // echo $persona;

?>
<!doctype html>
<html lang="es">
  <head>
    <title>CRUD php y mysql b5</title>
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
              

                <form class="p-4" method="POST" action="editarProceso.php">
                <?php 
                                foreach ($persona as $dato) {
                            ?>

                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo  $dato['nombre']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos: </label>
                        <input type="text" class="form-control" name="txtEdad" autofocus required
                        value="<?php echo $dato['apellidos']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required
                        value="<?php echo $dato['registro']; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $dato['registro']; ?>">
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
