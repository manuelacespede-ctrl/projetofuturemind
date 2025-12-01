<?php 
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

require 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT * FROM notificacoes 
        WHERE usuario_id = :usuario_id 
        ORDER BY criada_em DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute([':usuario_id' => $usuario_id]);
$notificacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// marca todas como lidas
$pdo->prepare("UPDATE notificacoes SET lida = 1 WHERE usuario_id = :uid")
    ->execute([':uid' => $usuario_id]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Notificações</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

/*final menu*/


/* ===== TÍTULO ===== */
.title {
    font-size: 26px;
    color: #2e5d45;
    font-weight: bold;
    margin-bottom: 22px;
    border-bottom: 3px solid #cfe3cf;
    padding-bottom: 10px;
}

/* ==================== LAYOUT GERAL ==================== */
body {
    margin: 0;
    padding-top: 120px; /* empurra para baixo por causa do navbar */
    background: #f4f7f4;
    font-family: "Inter", Arial, sans-serif;
}

/* ==================== CARD PRINCIPAL ==================== */
.notif-wrapper {
    max-width: 700px;
    margin: 0 auto;
    padding: 20px;
}

/* ==================== CARD DE NOTIFICAÇÃO ==================== */
.notif-box {
    background: #fff;
    padding: 18px 20px;
    margin-bottom: 16px;
    border-radius: 12px;
    border-left: 4px solid #2e8b57;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    animation: fadeIn .3s ease-in-out;
}

/* animação suave */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(6px); }
    to   { opacity: 1; transform: translateY(0); }
}

.notif-date {
    font-size: 12px;
    color: #777;
    margin-bottom: 6px;
}

/* Ícone do lado esquerdo */
.notif-content {
    display: flex;
    gap: 12px;
    align-items: flex-start;
}

.notif-icon {
    font-size: 20px;
    color: #2e8b57;
    margin-top: 3px;
}

.notif-text {
    font-size: 15px;
    color: #333;
    line-height: 1.4;
}

.empty-box {
    text-align: center;
    padding: 25px;
    color: #555;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

</style>
</head>
<body>

<?php include 'menu.php'; ?>
<!--div class="page-content"-->
<!-- Logo/menu toggle -->
 <div class="navbar-fixed">
    <!-- Logo e menu -->
    <img src="logo.png" class="nav-logo" onclick="toggleMenu()">

    <!-- Título central -->
    <div class="nav-title">F u t u r e M i n d</div>
</div>
</div>
</nav> 

<div class="notif-wrapper">

    <h2 class="title">Notificações</h2>

    <?php if (empty($notificacoes)): ?>
        <div class="empty-box">
            <i class="fa-regular fa-bell-slash" style="font-size: 32px; margin-bottom:8px;"></i>
            <p>Você não possui notificações no momento.</p>
        </div>
    <?php endif; ?>

    <?php foreach ($notificacoes as $n): ?>
        <div class="notif-box">
            <div class="notif-date">
                <?= date("d/m/Y H:i", strtotime($n['criada_em'])) ?>
            </div>

            <div class="notif-content">
                <i class="fa-solid fa-bell notif-icon"></i>
                <div class="notif-text"><?= $n['mensagem'] ?></div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<script>
function toggleMenu() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("open");
}
</script>

</body>
</html>
