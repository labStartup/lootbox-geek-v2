<!-- Código para sair do sistema e "destruir" a sessão criada -->
<?php
    session_start();
    include_once './config.php';
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['variable']);
    header("Location: ../public/index.html");

    $conn->close();
?>