<?php
session_start();
require "conexao.php";

// Usuário precisa estar logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION["usuario_id"];

// BUSCA CURRÍCULO DO USUÁRIO
$sql = "SELECT * FROM curriculos WHERE usuario_id = :id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([":id" => $usuario_id]);
$curriculo = $stmt->fetch(PDO::FETCH_ASSOC);

// Se existir, carrega os dados — senão deixa vazio
$nome        = $curriculo["nome"]        ?? "";
$nascimento  = $curriculo["nascimento"]  ?? "";
$endereco    = $curriculo["endereco"]    ?? "";
$telefone    = $curriculo["telefone"]    ?? "";
$email       = $curriculo["email"]       ?? "";
$objetivo    = $curriculo["objetivo"]    ?? "";
$experiencia = $curriculo["experiencia"] ?? "";
$formacao    = $curriculo["formacao"]    ?? "";
$idiomas     = $curriculo["idiomas"]     ?? "";
$adicionais  = $curriculo["adicionais"]  ?? "";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FutureMind - Meu Currículo</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

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

/* Inputs */
.input-field {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    background: #f2f2f2;
    border-radius: 6px;
    border: 1px solid #ccc;
}

/* Botão */
.button {
    width: 100%;
    padding: 12px;
    background: #88bfb1;
    color: white;
    border: none;
    border-radius: 6px;
    margin-top: 12px;
    cursor: pointer;
}
.button:hover {
    background: #7da08b;
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

    <!--div class="curriculo-card"-->
        <div class="sim-card" id="simCard">
        <h2 class="title">Meu Currículo</h2>

        <form action="salvar_curriculo.php" method="POST" enctype="multipart/form-data">

            <input type="text" name="nome" class="input-field" placeholder="Nome completo" required
                  value="<?= $curriculo['nome'] ?? '' ?>"></label><br>

            <input type="date" name="data_nascimento" class="input-field" required
                  value="<?= $curriculo['data_nascimento'] ?? '' ?>"></label><br>

            <input type="text" name="endereco" class="input-field" placeholder="Endereço" required
                  value="<?= $curriculo['endereco'] ?? '' ?>"></label><br>

            <input type="tel" name="telefone" class="input-field" placeholder="Telefone" required
                  value="<?= $curriculo['telefone'] ?? '' ?>"></label><br>

            <input type="email" name="email" class="input-field" placeholder="E-mail" required
                  value="<?= $curriculo['email'] ?? '' ?>"></label><br>

            <input type="text" name="objetivo" class="input-field" placeholder="Objetivo profissional" required
                  value="<?= $curriculo['objetivo'] ?? '' ?>"></label><br>

            <input type="text" name="experiencia" class="input-field" placeholder="Experiência" required
                  value="<?= $curriculo['experiencia'] ?? '' ?>"></label><br>

            <input type="text" name="formacao" class="input-field" placeholder="Formação" required
                   value="<?= $curriculo['formacao'] ?? '' ?>"></label><br>

            <input type="text" name="idiomas" class="input-field" placeholder="Idiomas" required
                  value="<?= $curriculo['idiomas'] ?? '' ?>"></label><br>

            <input type="text" name="adicionais" class="input-field" placeholder="Informações adicionais"
                  value="<?= $curriculo['adicionais'] ?? '' ?>"></label><br>

            <label style="font-size:14px; margin-top:10px;">Anexar currículo (PDF, DOC, DOCX)</label>
            <input type="file" name="arquivo" class="form-control" accept=".pdf, .doc, .docx">

            <button type="submit" class="button">Salvar Currículo</button>

        </form>
    </div>
    <script>
function toggleMenu() {
  const sidebar = document.getElementById("sidebar");
  const main = document.getElementById("main");

  sidebar.classList.toggle("open");
  if (main) main.classList.toggle("shift");
}
</script>



</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
