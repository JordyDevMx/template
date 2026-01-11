<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>

        <link rel="stylesheet" href="/build/css/main.css">

    </head>
    <body>

        <div>
            <?php include __DIR__ .'/templates/header.php'; ?>

            <div>
                <?php echo $contenido; ?>
            </div>

            <?php include __DIR__ .'/templates/footer.php'; ?>
        </div>

    </body>
</html>