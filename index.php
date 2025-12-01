<?php
session_start();
$logado = isset($_SESSION['usuario_id']);
?>
<html lang="pt-br">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    
/* ===== NAV SUPERIOR FIXA ===== */
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
</style>

<body>
  <?php include 'menu.php'; ?>

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

<?php 
if ($logado) {
    include "index_logado.php";   // Conteúdo do usuário logado
} else {
    include "index_publico.php";  // Conteúdo público
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>