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

