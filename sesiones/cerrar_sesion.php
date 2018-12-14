<?php
    session_start();
    if (isset($_SESSION['logueado']) and $_SESSION['logueado']) {
        $_SESSION['logueado'] = false;
        unset($_SESSION['nombre']);
    }
    header('Location: index.php');
    exit;
?>