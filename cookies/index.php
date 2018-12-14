<?php
    $nombre = (isset($_COOKIE['nombre'])) ? $_COOKIE['nombre'] : null;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Página de bienvenida </title>
    </head>
    <body>
        <?php if ($nombre): ?>
            <h1> Bienvenido/a <?php echo $nombre ?> </h1>
            <p> ¿Qué querés hacer? <a href="guardar_nombre.php"> Cambiar mi nombre </a> | <a href="eliminar_nombre.php"> Eliminar mi nombre </a> </p>
        <?php else: ?>
            <h1> Bienvenido/a usuario desconocido </h1>
            <p> <a href="guardar_nombre.php"> Seleccionar un nombre para identificarme </a> </p>
        <?php endif; ?>
    </body>
</html>