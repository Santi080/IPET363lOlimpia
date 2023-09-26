<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="formulario.css">
    <title>Document</title>
</head>
<body>
<header>
        <h1>Hospital de Tucuman</h1>
        <nav>
            <ul>
			    <li><a href="principal.php">Inicio</a></li>
                <li><a href="pacientes_admin.php">Citas</a></li>
                <li><a href="llamada.php">Paciente</a></li>
				<li><a href="grafico_de_llamadas.php">Registro</a></li>

            </ul>
        </nav>
</header>
<!-- formulario de ingreso de datos -->
<form action="ver_registro.php" method="POST">
	<div class="col-3 form-group">
		<label  class=>Tipo de llamado</label>
		<select  class="form-select" name="tipo"required>
			<option>Normal</option>
			<option>Emergencia</option>
		</select>
	</div>
	<div>
		<label>Tiempo de respuesta</label>
		<select  class="form-select" name="respuesta"required>
			<option>Si</option>
			<option>No</option>
		</select>
	</div>
	<div class="col-3 form-group">
		<label>Duración</label>
		<input type="text" class="form-control" name="duracion" placeholder="Duración">
	</div>

	<div>
		<label>Fecha</label>
		<input type="date" name="fecha" placeholder="fecha">
	</div>
	<div>
		<label>Hora</label>
		<input type="time" name="hora" placeholder="Hora de la llamada">
	</div>
	<div>
		<button type="submit">Enviar</button>
	</div>
	</form>
	<section id="footer">
        <footer>
                <div class="pie">
                    <p>&copy; Provincia de Tucuman</p>
                </div>
        </footer>
        </section>
    </body>
</html>