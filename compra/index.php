<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor Compras</title>
    <link rel="stylesheet" href="style.css"> <!-- Aquí puedes agregar un CSS -->
</head>
<body>
    <h1>Gestor de Compras</h1>
    <p>Seleccione una opción para ingresar datos:</p>

    <div class="button-container">
        <!-- Botón para ingresar datos de PROVEEDOR -->
        <form action="insertar_proveedor.php" method="get">
            <button type="submit">Insertar Proveedor</button>
        </form>

        <!-- Botón para ingresar datos de COMPRA -->
        <form action="insertar_compra.php" method="get">
            <button type="submit">Insertar Compra</button>
        </form>

        <!-- Botón para ingresar datos de DETALLE -->
        <form action="insertar_detalle.php" method="get">
            <button type="submit">Insertar Detalle</button>
        </form>
    </div>
</body>
</html>

