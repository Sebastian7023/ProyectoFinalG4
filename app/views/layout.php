<!-- app/views/layout.php-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'PrettyGirl Salon - Panel' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="app/assets/css/layout.css" rel="stylesheet">    
    <link href="app/assets/css/home.css" rel="stylesheet">    
    <link href="app/assets/css/login.css" rel="stylesheet">   
    <link href="app/assets/images/*" rel="stylesheet">   
</head>

<body class="admin-theme">
    <div class="container-fluid mt-4 users-container"> <!-- Cambiado a container-fluid -->
        <?php
        if (isset($vista) && file_exists($vista)) {
            include $vista;
        } else {
            echo "<div class='alert alert-danger'>Vista no encontrada</div>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>