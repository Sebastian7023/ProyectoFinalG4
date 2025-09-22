<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Cliente</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            font-family: 'Montserrat', sans-serif;
        }
        h1 {
            font-size: 48px;
            color: #d87a8a; /* Color rosa oscuro de tu CSS */
        }
    </style>
</head>
<body>
    <h1>Dashboard de cliente</h1>
    <span class="navbar-text">
        Bienvenido, <?= $_SESSION['cliente']['fullName'] ?? 'Cliente' ?>
    </span>
</body>
</html>
