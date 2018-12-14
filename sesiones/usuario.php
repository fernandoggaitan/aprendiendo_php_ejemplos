<?php
    session_start();
    if(isset($_SESSION['logueado']) and $_SESSION['logueado']){
        $nombre = $_SESSION['nombre'];
    }else{
        //Si el usuario no está logueado redireccionamos al login.
        header('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Página de bienvenida </title>
    </head>
    <body>
        <h1> Bienvenido/a <?php echo $nombre; ?> </h1>
        <p> <a href="cerrar_sesion.php"> Cerrar sesión </a> </p>
    </body>
</html>