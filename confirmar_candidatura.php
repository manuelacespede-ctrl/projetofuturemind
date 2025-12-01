<?php
session_start();
require "conexao.php";

// Só pode enviar se estiver logado
if (!isset($_SESSION['usuario_id'])) {
    echo "<script>alert('Você precisa estar logado para se candidatar.'); window.location='login.php';</script>";
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$vaga_id = $_POST['vaga_id'] ?? 0;

// Verifica se o currículo está preenchido
$sql = $pdo->prepare("SELECT * FROM curriculos WHERE usuario_id = :uid LIMIT 1");
$sql->execute([':uid' => $usuario_id]);
$curriculo = $sql->fetch(PDO::FETCH_ASSOC);

if (!$curriculo) {
    echo "<script>
            alert('Você precisa preencher seu currículo antes de enviar!');
            window.location='curriculo.php';
          </script>";
    exit;
}

// Faz a candidatura
$stmt = $pdo->prepare("INSERT INTO candidaturas (usuario_id, vaga_id) VALUES (:uid, :vid)");
$stmt->execute([
    ':uid' => $usuario_id,
    ':vid' => $vaga_id
]);

// ==========================
// 1) BUSCAR NOME DA VAGA
// ==========================
$stmtVaga = $pdo->prepare("SELECT titulo FROM vagas WHERE id = :id");
$stmtVaga->execute([':id' => $vaga_id]);
$dadosVaga = $stmtVaga->fetch(PDO::FETCH_ASSOC);

$nomeVaga = $dadosVaga ? $dadosVaga['titulo'] : "vaga desconhecida";

// ==========================
// 2) CRIAR NOTIFICAÇÃO
// ==========================
$mensagem = "Seu currículo foi enviado para a vaga: <strong>$nomeVaga</strong>";

$stmtNotif = $pdo->prepare("
    INSERT INTO notificacoes (usuario_id, mensagem, criada_em, lida)
    VALUES (:uid, :msg, NOW(), 0)
");

$stmtNotif->execute([
    ':uid' => $usuario_id,
    ':msg' => $mensagem
]);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Candidatura Enviada</title>

<!-- ESTILO DO ALERT BONITO -->
<style>
body {
    background: #e8f5e9;
    font-family: 'Arial';
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    margin:0;
}

.alert-box {
    background:white;
    padding:30px 40px;
    border-radius:12px;
    border-left:6px solid #2e8b57;
    box-shadow:0 6px 15px rgba(0,0,0,0.15);
    text-align:center;
    max-width:380px;
}

.alert-box h2 {
    margin-bottom:10px;
    color:#2e8b57;
}

.alert-box p {
    color:#444;
    font-size:15px;
}

.button {
    margin-top:18px;
    background:#2e8b57;
    color:white;
    border:none;
    padding:10px 20px;
    border-radius:8px;
    cursor:pointer;
    font-size:15px;
}
</style>

</head>
<body>

<div class="alert-box">
    <h2>Currículo Enviado! ✔</h2>
    <p>Sua candidatura foi registrada com sucesso.</p>
    <p><strong>Próximo passo:</strong> agende sua simulação de entrevista!</p>

    <div style="display:flex; gap:10px; justify-content:center; margin-top:15px;">
        <button class="button" onclick="window.location='agendamento.php'">
            Agendar Simulação
        </button>

        <button class="button" style="background:#ccc; color:#333;" onclick="window.location='index.php'">
            Cancelar
        </button>
    </div>
</div>

<!-- Redirecionamento automático após 4s -->
<script>
setTimeout(function(){
    window.location = 'agendamento.php';
}, 4000);
</script>


</body>
</html>
