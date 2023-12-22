<?php
session_start();
session_destroy();
header("Location: login/login.html"); // Redirige a la página de inicio de sesión
?>
