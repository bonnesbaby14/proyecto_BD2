<?php session_start();
if (!isset($_SESSION["ID"])) {
    header('Location: login.php');}


require 'consultaClientes.php'; 
require 'consultaTickets.php'; ?>


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Clientes
	</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" href="css/tickets.css">
</head>

<body>
	<nav id="navbar">

		<a href="dashboard.php" class="nav-link">Inicio</a>
		<a href="clientes.php" class="nav-link">Clientes</a>
		<a href="tickets.php" class="nav-link">Tickets</a>
		<a href="salir.php" class="nav-link">Salir</a>
	</nav>
	<section id="welcome-section">
		<div id="card">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar nuevo ticket</button>
			<table class="table">

				<tr>

					<th>FECHA</th>

					<th>IMPORTE</th>

					<th>CLIENTE</th>
					<th></th>

				</tr>


				<?php
				if (!isset($_SESSION["ID"])) {
					header('Location: login.php');
				} else {

					foreach ($resultcorreoTickets as $row) {
						echo "<tr> <td> " . $row['fecha'] . " </td> <td> " . $row['importe'] . " </td> <td> " . $row['id_cliente'] . " </td> <td> 
			<button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#exampleModal" . $row["id"] . "'>Editar</button>
			<form action='eliminarTicket.php' method='POST'>  <input type='hidden' name='id' value='" . $row["id"] . "'> <input type='submit' class='btn btn-danger' value='Eliminar'> </input> </form>
					
					</td> </tr>
					";
					}
				}
				?>

			</table>



		</div>
	</section>
	<?php
	if (!isset($_SESSION["ID"])) {
		header('Location: login.php');
	} else {

		foreach ($resultcorreoTickets as $row) {
			echo "<div class='modal fade' id='exampleModal" . $row["id"] . "' tabindex='-1' aria-labelledby='exampleModalLabel" . $row["id"] . "' aria-hidden='true'>
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title' id='exampleModalLabel" . $row["id"] . "'>Editar Ticket</h5>
									<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
								</div>
								<div class='modal-body'>
									<form action='actualizarTicket.php' method='post'>
										<div class='mb-3'>
											<label for='recipient-name' class='col-form-label'>Nombre:</label>
											<input type='text' class='form-control' id='nombre' name='fecha' value=" . $row["fecha"] . " >
										</div>
										<div class='mb-3'>
											<label for='message-text' class='col-form-label'>Correo:</label>
											<input class='form-control' id='correo' name='importe' value=" . $row["importe"] . "></input>
										</div>
										<div class='mb-3'>
											<label for='message-text' class='col-form-label'>Telefono:</label>
											<input class='form-control' id='telefono' name='id_cliente' value=" . $row["id_cliente"] . "></input>
										</div>
										<input type='hidden' name='id_user' value='" . $_SESSION["ID"] . " '>
										<input type='hidden' name='id' value='" . $row["id"] . " '>
										<input type='submit' class='btn btn-primary' value='Actualizar'>
									</form>
								</div>
								<div class='modal-footer'>
									<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
				
				
								</div>
							</div>
						</div>
					</div>
									
									";
		}
	}
	?>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo Ticket</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="registrarTicket.php" method="post">
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">fecha:</label>
							<input type="text" class="form-control" id="nombre" name="fecha">
						</div>
						<div class="mb-3">
							<label for="message-text" class="col-form-label">importe:</label>
							<textarea class="form-control" id="correo" name="importe"></textarea>
						</div>
						<div class="mb-3">
							<label for="message-text" class="col-form-label">ID Cliente:</label>
							<textarea class="form-control" id="telefono" name="id_cliente"></textarea>
						</div>
						<input type="hidden" name="id_user" value=' <?php echo $_SESSION["ID"]; ?> '>
						<input type="submit" class="btn btn-primary" value="Registrar">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>


				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>