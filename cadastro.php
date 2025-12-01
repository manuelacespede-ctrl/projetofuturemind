<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FutureMind - Cadastro</title>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background: #d6e8d6;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Card principal */
    .card {
        background: white;
        width: 420px;
        padding: 40px 35px;
        border-radius: 22px;
        box-shadow: 0 8px 22px rgba(0,0,0,0.12);
        text-align: center;
        position: relative;
    }

    /* Avatar */
    .avatar {
        width: 110px;
        height: 110px;
        background: #2e8b57;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: -55px;
        left: 50%;
        transform: translateX(-50%);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .avatar i {
        font-size: 48px;
        color: white;
    }

    h2 {
        margin-top: 60px;
        margin-bottom: 20px;
        color: #2e8b57;
    }

    /* Campos */
    .input-wrapper {
        display: flex;
        align-items: center;
        background: #f1f7f1;
        padding: 12px 14px;
        border-radius: 8px;
        box-shadow: inset 0 0 2px rgba(0,0,0,0.08);
        margin-bottom: 14px;
    }

    .input-wrapper i {
        color: #2e8b57;
        margin-right: 10px;
        font-size: 16px;
    }

    .input-field {
        width: 100%;
        border: none;
        background: transparent;
        outline: none;
        font-size: 15px;
        color: #333;
    }

    /* Botão */
    .button {
        width: 100%;
        background: #2e8b57;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-size: 17px;
        cursor: pointer;
        margin-top: 10px;
    }

    .button:hover {
        background: #227646;
    }

    /* Link login */
    .login-link {
        margin-top: 16px;
        font-size: 14px;
    }

    .login-link a {
        color: #2e8b57;
        text-decoration: none;
        font-weight: bold;
    }

</style>

<!-- ícones -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>

<?php include 'menu.php'; ?>

<div class="card">

    <!-- Avatar -->
    <div class="avatar">
        <i class="fa-solid fa-user"></i>
    </div>

    <h2>Criar conta</h2>

    <form action="cadastro.php" method="POST">

        <div class="input-wrapper">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="nome" class="input-field" placeholder="Nome" required>
        </div>

        <div class="input-wrapper">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="sobrenome" class="input-field" placeholder="Sobrenome" required>
        </div>

        <div class="input-wrapper">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" class="input-field" placeholder="E-mail" required>
        </div>

        <div class="input-wrapper">
            <i class="fa-solid fa-phone"></i>
            <input type="tel" name="telefone" class="input-field" placeholder="Telefone" required>
        </div>

        <div class="input-wrapper">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="senha" class="input-field" placeholder="Senha" required>
        </div>

        <button type="submit" class="button">Cadastrar</button>
    </form>

    <div class="login-link">
        Já possui conta? <a href="login.php">Entrar</a>
    </div>

</div>

</body>
</html>
