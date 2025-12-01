<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FutureMind - Login</title>

<!-- ÍCONES -->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
/* ===== FUNDO ===== */
body {
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #d9e9d9 0%, #b6d2b6 100%);
    font-family: 'Inter', Arial, sans-serif;
}

.input-group {
    width: 100%;
}

.input-field {
    width: 100%;
    padding: 12px 14px;
    border-radius: 6px;
    border: 1px solid #d9e4d9;
    background: #f1f5f1;
    font-size: 15px;
    box-sizing: border-box;   /* ESSENCIAL PARA NÃO VAZAR */
}


/* ===== CARD DO LOGIN ===== */
.login-card {
    width: 380px;
    background: #ffffff;
    padding: 35px 30px 45px;
    border-radius: 22px;
    text-align: center;
    position: relative;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

/* ===== ÍCONE CIRCULAR ===== */
.user-circle {
    width: 110px;
    height: 110px;
    background: #2e8b57;
    border-radius: 50%;
    position: absolute;
    top: -55px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.user-circle i {
    font-size: 48px;
    color: #fff;
}

/* ===== TÍTULO ===== */
.login-card h2 {
    margin-top: 70px;
    font-size: 22px;
    color: #2e4a34;
    font-weight: 600;
}

/* ===== INPUTS ===== */
.input-group {
    text-align: left;
    margin-top: 18px;
}

.input-box {
    width: 100%;
    background: #f0f4f0;
    border: 1px solid #c8d5c8;
    border-radius: 8px;
    padding: 12px 12px 12px 40px;
    font-size: 14px;
    outline: none;
}

.input-icon {
    position: relative;
}

.input-icon i {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #527a52;
}

/* ===== BOTÃO ===== */
.button {
    width: 100%;
    box-sizing: border-box; /* evita vazamento */
    padding: 12px;
    background: #2e8b57;
    color: #fff;
    border: none;
    border-radius: 8px;
    margin-top: 22px;
    cursor: pointer;
    font-size: 15px;
    letter-spacing: 1px;
    transition: 0.2s;
}

.button:hover {
    background: #267346;
}

/* ===== ERRO ===== */
.error {
    background: #ffe5e5;
    border-left: 4px solid #cc0000;
    padding: 10px;
    margin-top: 10px;
    border-radius: 5px;
    color: #990000;
}

/* ===== LINK ===== */
.create-account {
    margin-top: 18px;
    font-size: 14px;
}

.create-account a {
    text-decoration: none;
    color: #2e8b57;
    font-weight: 600;
}
</style>
</head>

<body>

<div class="login-card">

    <div class="user-circle">
        <i class="fa-solid fa-user"></i>
    </div>

    <h2>Login</h2>

    <?php if(isset($_GET['erro'])): ?>
        <div class="error">E-mail ou senha incorretos.</div>
    <?php endif; ?>

    <form action="login_action.php" method="POST">

        <div class="form-area">
    <div class="input-group">
        <input type="email" class="input-field" name="email" placeholder="E-mail">
    </div>

    <div class="input-group">
        <input type="password" class="input-field" name="senha" placeholder="Senha">
    </div>
</div>


        <button type="submit" class="button">Entrar</button>
    </form>

    <div class="create-account">
        Ainda não tem conta? <a href="cadastro.php">Criar conta</a>
    </div>

</div>

</body>
</html>

