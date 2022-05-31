

<?php
    if(!isset($_GET['codigo'])){
        echo $_GET['codigo'];
        header('Location: index.php?mensaje=error');
        exit();
    }

    include("../../config/db.php"); 
    $id=$_GET['codigo'];
    
    $sql = "SELECT m.*, c.nombre as categoria FROM materia as m inner join categorias as c on c.id=m.idcategoria  WHERE m.id= '$id' ";
    //echo $sql;

    $materia = $connection->query($sql);

    $query2 = "SELECT id, nombre from categorias where activo='1' ";
    $categorias = mysqli_query($connection, $query2);

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
              

                <form class="p-4" method="POST" action="update.php">
                <?php 
                                foreach ($materia as $dato) {
                            ?>

                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo  $dato['nombre']; ?>">
                    </div>
                    <div class="mb-3">
                    <select name="txtCategoria" class="form-select form-select-md" aria-label=".form-select-sm example">
                        <option selected>Seleccione una categoria</option>
                        <?php 
                                foreach ($categorias as $datos) {
                            ?>
                        <option  value= <?php echo $datos['id']; ?>><?php echo $datos['nombre']; ?></option>
                        <?php 
                                }
                            ?>
                    </select>
                    </div>
                    
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $dato['id']; ?>">
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