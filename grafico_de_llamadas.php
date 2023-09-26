<?php
// Incluir el archivo de conexión a la base de datos
include('conex.php');

// Consulta SQL para recuperar los datos de fecha y tipo de llamada
$sql = "SELECT fecha, tipo FROM llamados";
$resultado = $conex->query($sql);

// Arreglos para almacenar los datos
$fechas = [];
$tipos = [];

if ($resultado->num_rows > 0) {
    // Recorre los resultados y almacena los datos en los arreglos
    while ($fila = $resultado->fetch_assoc()) {
        $fechas[] = $fila['fecha'];
        $tipos[] = $fila['tipo'];
    }
}

// Cerrar la conexión a la base de datos
$conex->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style7.css">
    <title>Gráfico de Llamadas</title>
    
    <!-- Incluir la biblioteca Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<header>
        <h1>Hospital de Tucuman</h1>
        <nav>
            <ul>
			    <li><a href="principal.php">Inicio</a></li>

            </ul>
        </nav>
</header>
    <!-- Agregar un elemento canvas para el gráfico de barras -->
    <canvas id="graficoLlamadas" width="400" height="200"></canvas>

    <script>
        // Datos recuperados de la base de datos
        var fechas = <?php echo json_encode($fechas); ?>;
        var tipos = <?php echo json_encode($tipos); ?>;

        // Cuenta la cantidad de llamadas por tipo
        var contadorTipos = {};
        for (var i = 0; i < tipos.length; i++) {
            var tipo = tipos[i];
            contadorTipos[tipo] = (contadorTipos[tipo] || 0) + 1;
        }

        var tiposUnicos = Object.keys(contadorTipos);
        var cantidadLlamadasPorTipo = tiposUnicos.map(function (tipo) {
            return contadorTipos[tipo];
        });

        // Configuración del gráfico
        var ctx = document.getElementById("graficoLlamadas").getContext("2d");
        var myBarChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: tiposUnicos,
                datasets: [
                    {
                        label: "Cantidad de Llamadas",
                        backgroundColor: "rgba(75, 192, 192, 0.2)",
                        borderColor: "rgba(75, 192, 192, 1)",
                        borderWidth: 1,
                        data: cantidadLlamadasPorTipo,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Cantidad de Llamadas",
                        },
                    },
                    x: {
                        title: {
                            display: true,
                            text: "Tipo de Llamada",
                        },
                    },
                },
            },
        });
    </script>
</body>
</html>
