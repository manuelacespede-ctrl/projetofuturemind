<?php
session_start();
require "conexao.php";

// Se não estiver logado, redireciona
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Carregar dados
$sql = "SELECT nome, sobrenome, email, telefone, foto FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $usuario_id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Perfil</title>

<style>
/* ===== NAV SUPERIOR FIXA ===== */
/* Sidebar aberta */
.sidebar.open {
    width: 250px;
}

/* Conteúdo deslocado quando sidebar abre */
#main.shift {
    margin-left: 250px;
}

/* Sem isso, o conteúdo fica atrás da navbar fixa */
body {
    padding-top: 120px !important;
    font-family: "Inter", Arial, sans-serif;
}





.navbar-fixed {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #d2e2d2; /* verde pastel */
    height: 75px;
    display: flex;
    align-items: center;
    padding: 0 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.15);
    z-index: 999;
    font-family: 'Inter', sans-serif;
}

/* Logo */
.nav-logo {
    width: 48px;
    height: 48px;
    cursor: pointer;
    transition: .2s;
}

.nav-logo:hover {
    transform: scale(1.05);
}

/* Título central */
.nav-title {
    flex: 0.96;
    text-align: center;
    font-size: 28px;
    font-weight: 600;
    color: #2f4f2f; /* verde escuro da paleta */
    letter-spacing: 1px;
    font-family: 'DM Serif Text', serif;
}
/* Responsivo */
@media(max-width: 700px) {
    .nav-title {
        font-size: 20px;
    }
    .nav-filters {
        gap: 6px;
    }
    .nav-select {
        padding: 6px 10px;
        font-size: 12px;
    }
}

@media(max-width: 500px) {
    .nav-title {
        display: none;
    }
    /*imagem capa*/
    .hero {
      border-radius: 0;
      overflow: hidden;
      position: relative;
    }
}

/*menu*/
.sidebar {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 3;
    top: 0;
    left: 0;
    background-color: white;
    overflow-x: hidden;
    transition: 0.3s;
    padding-top: 70px;
}
.sidebar.open {
    width: 250px;
}

#main.shift {
    margin-left: 250px;
}

/* ===== TÍTULO ===== */
.title {
    font-size: 26px;
    color: #2e5d45;
    font-weight: bold;
    margin-bottom: 22px;
    border-bottom: 3px solid #cfe3cf;
    padding-bottom: 10px;
}

/* ===== WRAPPER ===== */
.profile-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 40px;
}

.sim-card {
    max-width: 720px;
    margin: 32px auto;
    background: #fff;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    border-left: 4px solid #2e8b57;
    font-family: "Inter", Arial, sans-serif;
}

@keyframes fade {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== TÍTULO ===== */
.title {
    font-size: 26px;
    color: #2e5d45;
    font-weight: bold;
    margin-bottom: 22px;
    border-bottom: 3px solid #cfe3cf;
    padding-bottom: 10px;
}

/* ===== FOTO ===== */
.photo-section {
    float: left;
    width: 28%;
    text-align: center;
}

.profile-photo {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #d4e6d5;
}

.change-photo-btn {
    margin-top: 12px;
    padding: 8px 14px;
    background: #88bfb1;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
}
.change-photo-btn:hover {
    background: #75a99c;
}

/* ===== FORM ===== */
.tab-content {
    margin-left: 34%;
    margin-top: 10px;
}

label {
    font-size: 14px;
    color: #2f4f2f;
    font-weight: bold;
}

.input-field {
    width: 90%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    margin-bottom: 14px;
    font-size: 15px;
}

.input-field:focus {
    border-color: #88bfb1;
    outline: none;
}

/* ===== BOTÕES ===== */
.btn-row {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 20px;
}

.cancel-btn,
.save-btn {
    padding: 10px 18px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 15px;
}

.cancel-btn {
    background: #ccc;
}
.cancel-btn:hover {
    background: #b6b6b6;
}

.save-btn {
    background: #88bfb1;
    color: white;
    font-weight: 600;
}
.save-btn:hover {
    background: #75a99c;
}
</style>
</head>
<!-- Começo do Menu -->

<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once 'conexao.php';

$noti_qtd = 0;

if (isset($_SESSION['usuario_id'])) {
    $sql = "SELECT COUNT(*) FROM notificacoes WHERE usuario_id = :uid AND lida = 0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':uid' => $_SESSION['usuario_id']]);
    $noti_qtd = $stmt->fetchColumn();
}

$logado = isset($_SESSION['usuario_id']);
$nome = $logado ? htmlspecialchars($_SESSION['usuario_nome']) : '';
?>

<style>
/* usa o mesmo estilo do menu antigo */
.sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #6A776B;
      overflow-x: hidden;
      transition: 0.3s;
      padding-top: 60px;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.4);
      z-index: 1000;
}

.sidebar a {
      padding: 12px 24px;
      text-decoration: none;
      font-size: 18px;
      color: #f1f1f1;
      display: block;
      transition: 0.2s;
}

.sidebar a:hover {
      background-color: #575757;
}

.closebtn {
      position: absolute;
      top: 15px;
      right: 25px;
      font-size: 30px;
      color: #f1f1f1;
      cursor: pointer;
}

.menu-header {
    padding-left: 24px;
    padding-bottom: 10px;
    color: white;
    font-size: 20px;
}

/*iniciais*/
.profile-container {
    display: flex;
    align-items: flex-start; /* alinha pelo topo */
    gap: 5px; /* espaço entre círculo e formulário */
}

.avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background-color: #cfe8d6;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 48px;
    font-weight: bold;
    color: #2a6d3a;
    flex-shrink: 0; /* impede o círculo de deformar */
}

.profile-form {
    width: 100%;
    max-width: 450px;
}


</style>

<div id="sidebar" class="sidebar">

    <span class="closebtn" onclick="toggleMenu()">&times;</span>

    <div class="menu-header">
        <?php if ($logado): ?>
            Olá, <?= $nome ?> <img src="hello.png" style="width: 20px; height: 20px;">
        <?php else: ?>
            FutureMind
        <?php endif; ?>
    </div>

    <a href="index.php"><img src="inicio.png" style="width: 20px; height: 20px;"> Início</a>
    <!--a href="infovagas.php"><img src="vagas.png" style="width: 20px; height: 20px;"> Vagas</a-->

    <?php if ($logado): ?>
        <a href="curriculo.php"><img src="curriculo.png" style="width: 20px; height: 20px;">Meu Currículo</a>
        <a href="agendamento.php"><img src="calendario.png" style="width: 20px; height: 20px;"> Simulação</a>
        <a href="editar_perfil.php"><img src="perfil.png" style="width: 20px; height: 20px;"> Meu Perfil</a>
        <a href="notificacoes.php">
  <img src="sino.png" style="width: 20px; height: 20px;"> Notificações 
  <?php if ($noti_qtd > 0): ?>
     <strong style="color:yellow;">(<?= $noti_qtd ?>)</strong>
  <?php endif; ?>
</a>


        <a href="logout.php"><img src="saida.png" style="width: 20px; height: 20px;"> Sair</a>
    <?php else: ?>
        <a href="cadastro.php"><img src="cadastro.png" style="width: 20px; height: 20px;"> Criar conta</a>
        <a href="login.php"><img src="login.png" style="width: 20px; height: 20px;"> Login</a>
    <?php endif; ?>
</div>

<script>
function toggleMenu() {
      const sidebar = document.getElementById("sidebar");
      const main = document.getElementById("main");

      sidebar.classList.toggle("open");
      if(main) main.classList.toggle("shift");
}
</script>

<!-- Final do Menu -->

<div id="main">

<!--começo da nav-->
<!-- === NAVBAR === -->
<div class="navbar-fixed">
    <!-- Logo e menu -->
    <img src="logo.png" class="nav-logo" onclick="toggleMenu()">

    <!-- Título central -->
    <div class="nav-title">F u t u r e M i n d</div>
</div>
</div>
</nav> 

<!-- ===================================================== -->

<body>

<div class="page-content">
<div id="main">

<div class="profile-wrapper">
    <div class="sim-card">

        <h2 class="title">Editar Perfil</h2>

        <?php
$nome_completo = $usuario['nome'] . " " . $usuario['sobrenome'];

function gerarIniciais($nome) {
    $partes = explode(" ", trim($nome));
    $iniciais = "";

    foreach ($partes as $p) {
        if (strlen($p) > 0) {
            $iniciais .= strtoupper($p[0]);
        }
    }

    return substr($iniciais, 0, 2); // pega no máximo 2 letras
}

$iniciais = gerarIniciais($nome_completo);
?>
<div class="profile-container">
    
    <div class="avatar"><?= $iniciais ?></div>

    <div class="profile-form">


        <!-- FORM -->
        <div class="tab-content active">
                <label>Nome:</label>
                <input type="text" name="nome" class="input-field" value="<?= $usuario['nome']; ?>" required>

                <label>Sobrenome:</label>
                <input type="text" name="sobrenome" class="input-field" value="<?= $usuario['sobrenome']; ?>" required>

                <label><p>E-mail:</label>
                <input type="email" name="email" class="input-field" value="<?= $usuario['email']; ?>" required>

                <label>Telefone:</label>
                <input type="text" name="telefone" class="input-field" value="<?= $usuario['telefone']; ?>" required>

                <label>Senha (opcional):</label>
                <input type="password" name="senha" class="input-field" placeholder="Deixe em branco para manter">

                <div class="btn-row">
                    <button type="button" class="cancel-btn" onclick="window.location.href='index.php'">Cancelar</button>
                    <button type="submit" class="save-btn">Salvar alterações</button>
                </div>

            </form>
        </div>

    </div>
</div>

</div>

<script>
function toggleMenu() {
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("main");
    sidebar.classList.toggle("open");
    if (main) main.classList.toggle("shift");
}
</script>

</body>
</html>

