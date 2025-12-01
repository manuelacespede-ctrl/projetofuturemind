<?php
header('Content-Type: application/json; charset=utf-8');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['success' => false, 'error' => 'Usuário não logado.']);
    exit;
}

require 'conexao.php';

// pega dados
$usuario_id = $_SESSION['usuario_id'];
$slot = trim($_POST['slot'] ?? '');
$obs  = trim($_POST['obs'] ?? '');

// validações
if ($slot === '') {
    echo json_encode(['success' => false, 'error' => 'Horário inválido.']);
    exit;
}

// verifica se o horário já foi reservado
$sql = "SELECT COUNT(*) FROM agendamentos WHERE data_agendada = :slot";
$stmt = $pdo->prepare($sql);
$stmt->execute([':slot' => $slot]);

if ($stmt->fetchColumn() > 0) {
    echo json_encode(['success' => false, 'error' => 'Este horário já está reservado.']);
    exit;
}

// insere o agendamento
$sql = "INSERT INTO agendamentos (usuario_id, data_agendada, status, criado_em)
        VALUES (:usuario_id, :slot, 'confirmado', NOW())";

$stmt = $pdo->prepare($sql);
$ok = $stmt->execute([
    ':usuario_id' => $usuario_id,
    ':slot' => $slot
]);

if ($ok) {

    // mensagem da notificação
    $msg = <<<HTML
Sua simulação foi agendada para <strong>$slot</strong>.
<br><br>
<a href="cancelar_agendamento.php?slot=$slot"
   style="padding:8px 12px; background:#cc0000; color:white; 
          border-radius:6px; text-decoration:none;">
   Cancelar agendamento
</a>
HTML;

    require 'criar_notificacao.php';
    criarNotificacao($pdo, $usuario_id, $msg);

    echo json_encode(['success' => true]);
    exit;
}

// se cair aqui, deu erro no insert
echo json_encode(['success' => false, 'error' => 'Erro no banco de dados']);
exit;
?>