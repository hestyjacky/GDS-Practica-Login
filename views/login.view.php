<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?=APP_ROOT?>css/estilos.css" rel="stylesheet" type="text/css" /> 
    <title>Sistema 1</title>
    <script src="<?=APP_ROOT?>js\config.js"></script>
</head>
<body>

    <?php require APP_PATH . "html_parts/menu.php"; ?>

    <div class="container">
        <div class="elemento1">         
            <h1>Inicio de Sesión</h1>
        </div>


        <div class="elemento2">
            <form action="<?=APP_ROOT?>controllers\do_login.php" method="post">
                <input type="text" name="username" placeholder="Correo" required>
                <br><br>
                <input type="password" name="password" placeholder="Contraseña" required>
                <br><br>
                <input type="submit" value="Iniciar Sesión">
                <br>
                <h5>¿No tienes cuenta? <a class="registrarse" href="<?=APP_ROOT?>registro.php">Regístrate aquí</a>.</h5>
            </form>

        </div>
            
    </div>

    <?php require APP_PATH . "html_parts/final.php"; ?>

</body>
</html>
