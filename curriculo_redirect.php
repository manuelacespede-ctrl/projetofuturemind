<?php
session_start();

// Se NÃO estiver logado → manda para login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php?erro=precisa_logar");
    exit();
}

// Se estiver logado → manda para curriculo.php
header("Location: curriculo.php");
exit();
?>
