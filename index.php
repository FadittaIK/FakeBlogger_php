<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Fake Blogger</title>
</head>
<body>
  
    <?php
        include './controller/controlador.php';
        $controlador = new Controlador();
        $accion = isset($_GET["accion"]) ? $_GET["accion"] : 'inicio';
        $controlador->controlarPaginas($accion);
    ?>
</body>
</html>
