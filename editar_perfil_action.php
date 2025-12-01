<?php
session_start();
require "conexao.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

$nome = trim($_POST["nome"]);
$sobrenome = trim($_POST["sobrenome"]);
$email = trim($_POST["email"]);
$telefone = trim($_POST["telefone"]);
$senha = trim($_POST["senha"]);


//TESTE PARA FTO
<?php

if (isset($_POST['enviar'])) {

    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    if (!is_dir(__DIR__ . "/uploads")) {
        mkdir(__DIR__ . "/uploads", 0777, true);
    }

    $tmp = $_FILES['foto']['tmp_name'];
    $nome = time() . "_" . $_FILES['foto']['name'];
    $destino = __DIR__ . "/uploads/" . $nome;

    echo "TEMP: $tmp<br>";
    echo "DESTINO: $destino<br>";

    if (move_uploaded_file($tmp, $destino)) {
        echo "<b>UPLOAD OK!</b>";
    } else {
        echo "<b>FALHOU</b><br>";
        echo "ERROR CODE: " . $_FILES['foto']['error'] . "<br>";

        if (!is_writable(__DIR__ . "/uploads")) {
            echo "A PASTA uploads NÃO TEM PERMISSÃO!";
        }
    }
}

//FIM DE TESTE PARA FTO

// Atualiza os dados
if ($senha === "") {
    // Atualiza tudo EXCETO senha
    $sql = "UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, email = :email, telefone = :telefone 
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':sobrenome' => $sobrenome,
        ':email' => $email,
        ':telefone' => $telefone,
        ':id' => $usuario_id
    ]);
} else {
    // Atualiza incluindo a senha
    $sql = "UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, email = :email, telefone = :telefone, senha = :senha
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':sobrenome' => $sobrenome,
        ':email' => $email,
        ':telefone' => $telefone,
        ':senha' => $senha,
        ':id' => $usuario_id
    ]);
}

// Atualiza sessão
$_SESSION['usuario_nome'] = $nome;

// Redireciona com mensagem de sucesso
header("Location: editar_perfil.php?ok=1");
exit;

session_start();
require 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];

// pega dados comuns
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = trim($_POST['senha']);

// PROCESSAR FOTO
if (!empty($_FILES['foto']['name'])) {
    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $novo_nome = "foto_usuario_" . $usuario_id . "." . $ext;

    $caminho = "uploads/" . $novo_nome;

   if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
    echo "ARQUIVO MOVIDO COM SUCESSO!";
} else {
    echo "ERRO AO MOVER ARQUIVO<br>";

    echo "tmp_name: " . $_FILES['foto']['tmp_name'] . "<br>";
    echo "destino: " . $caminho . "<br>";
    echo "error code: " . $_FILES['foto']['error'] . "<br>";

    if (!is_writable("uploads")) {
        echo "PASTA uploads NÃO TEM PERMISSÃO DE ESCRITA";
    }
}

        // Atualiza no banco
        $sql_foto = "UPDATE usuarios SET foto = :foto WHERE id = :id";
        $stmt_foto = $pdo->prepare($sql_foto);
        $stmt_foto->execute([
            ':foto' => $novo_nome,
            ':id'   => $usuario_id
        ]);
    } else {
        echo "ERRO AO MOVER O ARQUIVO!";
    }
    // remove foto antiga se existir
    $sql = "SELECT foto FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $usuario_id]);
    $antiga = $stmt->fetchColumn();

    if ($antiga && file_exists("uploads/".$antiga)) {
        unlink("uploads/".$antiga);
    }
}

// atualizar dados
if ($senha == "") {
    // sem alterar senha
    $sql = "UPDATE usuarios 
            SET nome = :n, sobrenome = :s, email = :e, telefone = :t 
            ".($foto_nome ? ", foto = :f" : "")."
            WHERE id = :id";
    
    $stmt = $pdo->prepare($sql);
    $params = [
        ':n' => $nome,
        ':s' => $sobrenome,
        ':e' => $email,
        ':t' => $telefone,
        ':id' => $usuario_id
    ];

    if ($foto_nome) $params[':f'] = $foto_nome;

} else {
    // com senha
    $sql = "UPDATE usuarios 
            SET nome = :n, sobrenome = :s, email = :e, telefone = :t, senha = :senha
            ".($foto_nome ? ", foto = :f" : "")."
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $params = [
        ':n' => $nome,
        ':s' => $sobrenome,
        ':e' => $email,
        ':t' => $telefone,
        ':senha' => $senha,
        ':id' => $usuario_id
    ];

    if ($foto_nome) $params[':f'] = $foto_nome;
}

$stmt->execute($params);

header("Location: editar_perfil.php?ok=1");
exit;

?>
