<?php
session_start();
require "conexao.php";

// Usuário precisa estar logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// RECEBENDO CAMPOS DO FORMULÁRIO
$nome = $_POST['nome'] ?? '';
$data_nascimento = $_POST['data_nascimento'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$email = $_POST['email'] ?? '';
$objetivo = $_POST['objetivo'] ?? '';
$experiencia = $_POST['experiencia'] ?? '';
$formacao = $_POST['formacao'] ?? '';
$idiomas = $_POST['idiomas'] ?? '';
$adicionais = $_POST['adicionais'] ?? '';
$arquivo = null;

// UPLOAD DO ARQUIVO (PDF, DOC, DOCX)
if (!empty($_FILES['arquivo']['name'])) {

    $pasta = "curriculos_uploads/";

    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    $nomeArquivo = uniqid() . "_" . $_FILES['arquivo']['name'];
    $caminho = $pasta . $nomeArquivo;

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho)) {
        $arquivo = $nomeArquivo;
    }
}

// VERIFICA SE O CURRÍCULO JÁ EXISTE PARA ESTE USUÁRIO
$sql = "SELECT id FROM curriculos WHERE usuario_id = :usuario";
$stmt = $pdo->prepare($sql);
$stmt->execute([':usuario' => $usuario_id]);
$jaExiste = $stmt->fetch(PDO::FETCH_ASSOC);

// SE EXISTE → UPDATE
if ($jaExiste) {

    $sql = "UPDATE curriculos SET 
        nome = :nome,
        data_nascimento = :data_nascimento,
        endereco = :endereco,
        telefone = :telefone,
        email = :email,
        objetivo = :objetivo,
        experiencia = :experiencia,
        formacao = :formacao,
        idiomas = :idiomas,
        adicionais = :adicionais" . 
        ($arquivo ? ", arquivo = :arquivo" : "") . 
        " WHERE usuario_id = :usuario";

    $stmt = $pdo->prepare($sql);

    // BIND DINÂMICO
    $params = [
        ':nome' => $nome,
        ':data_nascimento' => $data_nascimento,
        ':endereco' => $endereco,
        ':telefone' => $telefone,
        ':email' => $email,
        ':objetivo' => $objetivo,
        ':experiencia' => $experiencia,
        ':formacao' => $formacao,
        ':idiomas' => $idiomas,
        ':adicionais' => $adicionais,
        ':usuario' => $usuario_id
    ];

    if ($arquivo) {
        $params[':arquivo'] = $arquivo;
    }

    $stmt->execute($params);

} else {

    // SE NÃO EXISTE → INSERT
    $sql = "INSERT INTO curriculos 
        (usuario_id, nome, data_nascimento, endereco, telefone, email, objetivo, experiencia, formacao, idiomas, adicionais, arquivo)
        VALUES
        (:usuario, :nome, :data_nascimento, :endereco, :telefone, :email, :objetivo, :experiencia, :formacao, :idiomas, :adicionais, :arquivo)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':usuario' => $usuario_id,
        ':nome' => $nome,
        ':data_nascimento' => $data_nascimento,
        ':endereco' => $endereco,
        ':telefone' => $telefone,
        ':email' => $email,
        ':objetivo' => $objetivo,
        ':experiencia' => $experiencia,
        ':formacao' => $formacao,
        ':idiomas' => $idiomas,
        ':adicionais' => $adicionais,
        ':arquivo' => $arquivo
    ]);
}

header("Location: curriculo.php?sucesso=1");
exit;
?>

