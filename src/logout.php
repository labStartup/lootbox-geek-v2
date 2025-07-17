<!-- Código para sair do sistema e "destruir" a sessão criada -->
<?php
session_start();
include_once './config.php';
unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['variable']);
unset($_SESSION['username']);
unset($_SESSION['image_user']);
header("Location: ../public/index.php");

$conn->close();
?>