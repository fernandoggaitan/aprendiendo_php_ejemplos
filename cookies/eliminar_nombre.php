<?php
    if(isset($_COOKIE['nombre'])){
        setcookie('nombre', '', time() - 86400, '/');
        header('Location: index.php');
        exit;
    }
?>