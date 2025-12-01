<?php
session_start();
require "conexao.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$slot = $_GET['slot'] ?? "";

if ($slot === "") {
    die("Horário inválido.");
}

// apagar agendamento
$sql = "DELETE FROM agendamentos WHERE usuario_id = :uid AND data_agendada = :slot";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ":uid" => $usuario_id,
    ":slot" => $slot
]);

// cria nova notificação avisando que cancelou
$msg = "Você cancelou a simulação marcada para <strong>$slot</strong>.";

$sql2 = "INSERT INTO notificacoes (usuario_id, mensagem) VALUES (:uid, :msg)";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute([
    ':uid' => $usuario_id,
    ':msg' => $msg
]);

// redireciona de volta às notificações
header("Location: notificacoes.php?cancelado=1");
exit;
?>
