<?php
// editar_perfil_action.php

// Mostrar erros apenas em desenvolvimento (remova/alimente conforme produção)
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require 'conexao.php'; // <-- ajuste o caminho se necessário

// checar autenticação
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Receber e limpar dados (evitar notices se campos não vierem)
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$sobrenome = isset($_POST['sobrenome']) ? trim($_POST['sobrenome']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
$senha_raw = isset($_POST['senha']) ? trim($_POST['senha']) : '';

// Parâmetros de upload
$allowed_ext = ['jpg','jpeg','png','gif','webp'];
$max_bytes = 5 * 1024 * 1024; // 5 MB
$uploadDirAbs = __DIR__ . '/uploads/'; // caminho absoluto
$uploadDirWeb = 'uploads/';             // caminho web relativo (para <img>)

// garante pasta uploads
if (!is_dir($uploadDirAbs)) {
    mkdir($uploadDirAbs, 0755, true);
}

// pega nome da foto antiga (antes de qualquer alteração)
$stmt = $pdo->prepare("SELECT foto FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $usuario_id]);
$usuario_atual = $stmt->fetch(PDO::FETCH_ASSOC);
$foto_antiga = $usuario_atual['foto'] ?? null;

// variáveis de controle
$novo_nome_foto = null;

try {
    // --- PROCESSAR UPLOAD (se enviado) ---
    if (!empty($_FILES['foto']['name'])) {
        $file = $_FILES['foto'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            // mapear erro simples
            throw new Exception('Erro no upload (código ' . $file['error'] . ').');
        }

        if ($file['size'] > $max_bytes) {
            throw new Exception('Arquivo maior que 5MB.');
        }

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed_ext)) {
            throw new Exception('Formato inválido. Permitido: ' . implode(', ', $allowed_ext));
        }

        // gerar nome único e seguro: id_timestamp_nomelimpo.ext
        $base_name = pathinfo($file['name'], PATHINFO_FILENAME);
        $base_name = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $base_name);
        $novo_nome_foto = $usuario_id . '_' . time() . '_' . $base_name . '.' . $ext;
        $destinoAbs = $uploadDirAbs . $novo_nome_foto;

        if (!move_uploaded_file($file['tmp_name'], $destinoAbs)) {
            throw new Exception('Falha ao mover o arquivo. Verifique permissões da pasta uploads.');
        }
    }

    // --- MONTAR SQL DINÂMICO ---
    $fields = [];
    $params = [':id' => $usuario_id];

    // campos sempre atualizados
    $fields[] = 'nome = :nome';
    $params[':nome'] = $nome;

    $fields[] = 'sobrenome = :sobrenome';
    $params[':sobrenome'] = $sobrenome;

    $fields[] = 'email = :email';
    $params[':email'] = $email;

    $fields[] = 'telefone = :telefone';
    $params[':telefone'] = $telefone;

    // senha: somente se preenchida (hash)
    if ($senha_raw !== '') {
        $senha_hash = password_hash($senha_raw, PASSWORD_DEFAULT);
        $fields[] = 'senha = :senha';
        $params[':senha'] = $senha_hash;
    }

    // foto: somente se houve upload
    if ($novo_nome_foto !== null) {
        $fields[] = 'foto = :foto';
        $params[':foto'] = $novo_nome_foto;
    }

    if (empty($fields)) {
        // nada pra atualizar (caso improvável)
        header('Location: editar_perfil.php?ok=1');
        exit;
    }

    $sql = 'UPDATE usuarios SET ' . implode(', ', $fields) . ' WHERE id = :id';

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    // se atualizou foto, apaga a antiga (somente se existir e não for padrão)
    if ($novo_nome_foto !== null && $foto_antiga && $foto_antiga !== 'default.png') {
        $caminho_antigo = $uploadDirAbs . $foto_antiga;
        if (file_exists($caminho_antigo)) @unlink($caminho_antigo);
    }

    // atualizar sessão (nome e foto se aplicável)
    $_SESSION['usuario_nome'] = $nome;
    if ($novo_nome_foto !== null) {
        $_SESSION['usuario_foto'] = $novo_nome_foto;
    }

    header('Location: editar_perfil.php?ok=1');
    exit;

} catch (Exception $e) {
    // se um upload criou um arquivo mas deu erro depois, tenta remover
    if (!empty($novo_nome_foto) && file_exists($uploadDirAbs . $novo_nome_foto)) {
        @unlink($uploadDirAbs . $novo_nome_foto);
    }

    // redireciona informando erro (url-encode)
    $msg = urlencode($e->getMessage());
    header("Location: editar_perfil.php?error={$msg}");
    exit;
}
