<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Fake Blogger</title>
</head>
<body>
    <h1>Entradas Públicas</h1>
    
    <div class="login">
        <a href=""><button>Login</button></a>
    </div>
    <main>
    <?php
        include './controller/controlador.php';
        $controlador = new Controlador();
        $controlador->mostrarEntradasPublicas();
    ?>
    </main>
</body>
</html>
