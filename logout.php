<?php
session_start();

// Apaga todas as variáveis da sessão
session_unset();

// Destroi a sessão
session_destroy();

// Redireciona para a página inicial SEM login
header("Location: index.php");
exit;
?>
