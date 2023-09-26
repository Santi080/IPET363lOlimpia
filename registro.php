<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar y procesar los datos aquí
    // Por ejemplo, puedes realizar validaciones y guardar la información en la base de datos

    // En este ejemplo, simplemente mostraremos los datos ingresados
    echo "<h2>Registro exitoso</h2>";
    echo "<p>Nombre: " . htmlspecialchars($nombre) . "</p>";
    echo "<p>Email: " . htmlspecialchars($email) . "</p>";

    // Almacenar la contraseña de manera segura en una base de datos es importante, pero no lo haremos en este ejemplo básico
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registro</title>
</head>
<body>
    <h2>Registrarse</h2>
    <form action="user_data.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
