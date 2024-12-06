<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GestorCompras_fixed";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejo de inserción
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insertar_proveedor'])) {
    $id = $_POST['prov_id'] ?? null;
    $nombre = $_POST['prov_nombre'] ?? '';
    $web = $_POST['prov_web'] ?? '';
    $dir_id = $_POST['prov_dir_id'] ?? null;
    $tele_id = $_POST['prov_tele_id'] ?? null;
    $tipo_proveedor = $_POST['tipo_proveedor'] ?? null;

    // Validar datos recibidos
    if (empty($id) || empty($nombre) || empty($dir_id) || empty($tele_id) || empty($tipo_proveedor)) {
        echo "<div class='alert error'>Por favor, completa todos los campos requeridos.</div>";
    } else {
        // Preparar consulta SQL
        $stmt = $conn->prepare("INSERT INTO PROVEEDOR (Prov_ID, Prov_Nombre, Prov_Web, Prov_Dir_ID, Prov_Tele_ID, Tipo_proveedor) VALUES (?, ?, ?, ?, ?, ?)");
        
        // Verificar si la consulta se preparó correctamente
        if (!$stmt) {
            die("Error en la consulta SQL: " . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param("isssii", $id, $nombre, $web, $dir_id, $tele_id, $tipo_proveedor);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<div class='alert success'>Proveedor insertado con éxito.</div>";
        } else {
            echo "<div class='alert error'>Error al insertar proveedor: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Proveedor</title>
    <style>
        /* Estilos generales para el body */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Estilo de los encabezados */
        h2 {
            color: #4e73df;
            font-size: 36px;
            text-align: right;
            margin-top: 40px;
        }

        /* Estilo de los enlaces */
        a {
    display: inline-block;
    margin: 20px auto;
    text-align: center;
    font-size: 14px;
    color: #007BFF;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 4px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

        a:hover {
            background-color: #e2e8f0;
        }

        /* Estilo del formulario */
        form {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 700px;
            margin: 30px auto;
            width: 100%;
            transition: transform 0.3s ease;
        }

        /* Estilo de las etiquetas del formulario */
        label {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
            display: block;
        }

        /* Estilo de los campos de entrada */
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        /* Estilo de los campos de entrada en foco */
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #4e73df;
            outline: none;
        }

        /* Estilo del botón de enviar */
        button[type="submit"] {
            width: 100%;
            padding: 14px;
            background-color: #28a745;
            font-size: 16px;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Efecto hover en el botón de enviar */
        button[type="submit"]:hover {
            background-color: #218838;
        }

        /* Estilo de los campos deshabilitados */
        input[disabled] {
            background-color: #f2f2f2;
        }

        /* Efecto de transición al pasar el cursor por el formulario */
        form:hover {
            transform: translateY(-5px);
        }

        /* Espaciado entre formularios */
        form + form {
            margin-top: 40px;
        }

        /* Estilos de la caja de alerta o mensajes de éxito/error */
        .alert {
            font-size: 16px;
            color: #d9534f;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <a href="index.php">Regresar</a>

    <h2>Insertar Proveedor</h2>
    <form action="insertar_proveedor.php" method="post">
        <label>ID:</label>
        <input type="number" name="prov_id" required><br>
        
        <label>Nombre:</label>
        <input type="text" name="prov_nombre" required><br>
        
        <label>Correo:</label>
        <input type="text" name="prov_web"><br>
        
        <label>Dirección:</label>
        <input type="number" name="prov_dir_id"><br>
        
        <label>Teléfono:</label>
        <input type="number" name="prov_tele_id"><br>
        
        <label>Tipo de Proveedor:</label>
        <input type="text" name="tipo_proveedor"><br>
        
        <button type="submit" name="insertar_proveedor">Insertar Proveedor</button>
    </form>
</body>
</html>

