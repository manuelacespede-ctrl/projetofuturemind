<?php
function criarNotificacao($pdo, $usuario_id, $mensagem) {
    $sql = "INSERT INTO notificacoes (usuario_id, mensagem) 
            VALUES (:uid, :msg)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':uid' => $usuario_id,
        ':msg' => $mensagem
    ]);
}
?>
