<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ingresar paciente</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="formulario.css">

</head>

<body>

    <!-- Header de la pagina -->
    <section id="cabecera">
    <header>
        <h1>Hospital de Tucuman</h1>
        <nav>
            <ul>
                <li><a href="principal.php">Inicio</a></li>


            </ul>
        </nav>
    </header>
    </section>
    <h1 class="titulo">Ingresa un paciente</h1>
    <section id="fondito">
        <div class="container">
            <div class="contacto">
                <div class="formulario">

                    <!-- Notificacion mostrada cuando los datos fueron ingresados-->

                    <!-- Formulario de ingreso de datos -->
                    <form action="pacientes_admin.php" method="POST" class="row g-8">
                        <div class="datos">
                            <div class="col-3 form-group">
                                <label>Nombre</label>
                                <input type="Text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="col-3 form-group">
                                <label>Apellido</label>
                                <input type="Text" class="form-control" name="apellido" placeholder="Apellido">
                            </div>
                            <div class="col-3 form-group">
                                <label>Edad</label>
                                <input type="Text" class="form-control" name="edad" placeholder="Edad del paciente">
                            </div>
                            <div class="col-3 form-group">
                                <label>Fecha</label>
                                <input type="Date" class="form-control" name="fecha" placeholder="Fecha de ingreso">
                            </div>
                            <div class="col-3 form-group">
                                <label>Sintomas</label>
                                <input type="Text" class="form-control" name="sintomas" placeholder="Sintomas del paciente">
                            </div>
                            <div class="col-3 form-group">
                                <label>Enfermero</label>
                                <input type="Text" class="form-control" name="enfermero" placeholder="Enfermero asignado">
                            </div>
                            <div class="col-3 form-group">
                                <label>Ubicacion</label>
                                <input type="text" class="form-control" name="ubicacion" placeholder="Sala asignada">
                            </div>
                        </div>
                        <div class="envio">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="footer">
        <footer>
                <div class="pie">
                    <p>&copy; Provincia de Tucuman</p>
                </div>
        </footer>
        </section>
    </body>
</html>