<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?=APP_ROOT?>css/style.css" rel="stylesheet" type="text/css" /> 
    <title>Sistema 1</title>
</head>
<body>
      
    <?php require APP_PATH . "html_parts/menu.php"; ?>
     
    <div class="elemento3">
            <h1>Bienvenido Usuario <?php echo $USUARIO_NOMBRE ?></h1>
        </div>

    <?php require APP_PATH . "html_parts/final.php"; ?>

</body>
</html>
