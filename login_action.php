<?php
session_start();
require "conexao.php";

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

// Consulta usuário
$sql = "SELECT * FROM usuarios WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => $email]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && $usuario['senha'] === $senha) {

    // cria sessão
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nome'] = $usuario['nome'];

    header("Location: index.php");
    exit;

} else {
    // login incorreto
    header("Location: login.php?erro=1");
    exit;
}
?>
