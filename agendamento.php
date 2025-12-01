<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

require 'conexao.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FutureMind - Simulação</title>

<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* ============================
   NAVBAR FIXA (mesmo padrão do index)
=============================== */
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


/* SIMULAÇÃO */
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

.sim-card h3 {
    text-align: center;
    margin-bottom: 18px;
    color: #2e4f34;
}

/* texto */
.sim-explain {
    color: #444;
    font-size: 15px;
    line-height: 1.5;
    margin-bottom: 18px;
}

/* horários */
.slot-row {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 16px;
}

.slot-btn {
    background:#188e52;
    color:#fff;
    border:none;
    padding:10px 14px;
    border-radius:8px;
    cursor:pointer;
    min-width:72px;
    text-align:center;
    font-weight:600;
    transition: 0.2s;
}
.slot-btn:hover { background:#0f6b3d; }

.slot-btn:disabled {
    background:#cfe6d9;
    color:#6d8a78;
}

/* nota */
.small-note {
    font-size: 13px;
    color: #666;
    text-align: center;
    margin-top: 12px;
}

/* MODAL */
/* ===== MODAL BONITO — estilo FutureMind ===== */

/* Fundo escuro atrás do modal */
.modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 2000;
}

/* Caixa do modal */
.modal {
    background: #ffffff;
    width: 420px;
    max-width: 90%;
    padding: 28px 26px;
    border-radius: 18px;
    box-shadow: 0 12px 35px rgba(0,0,0,0.25);
    animation: modalShow 0.3s ease;
    border-left: 6px solid #2e8b57;
    font-family: "Inter", Arial, sans-serif;
}

/* animação */
@keyframes modalShow {
    from { opacity: 0; transform: translateY(-20px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* Título */
.modal h4 {
    margin: 0 0 10px 0;
    font-size: 22px;
    font-weight: 700;
    color: #1f4e33;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Ícone animado */
.modal h4::before {
    content: "🗂️";
    font-size: 24px;
    animation: bounce 1s infinite ease-in-out;
}
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50%      { transform: translateY(-4px); }
}

/* Texto de detalhes */
#modalDetails {
    color: #444;
    margin-bottom: 15px;
    line-height: 1.4;
}

/* Inputs */
.form-row label {
    font-size: 14px;
    color: #2d4a35;
    margin-bottom: 6px;
}

textarea {
    width: 100%;
    border-radius: 10px;
    border: 1px solid #cfd8cf;
    padding: 10px;
    font-size: 14px;
    resize: vertical;
    background: #f6faf6;
}

/* Botões */
.btn-row {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 15px;
}

.btn-ghost {
    background: transparent;
    color: #333;
    border: 1px solid #ccc;
    padding: 8px 14px;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.2s;
}
.btn-ghost:hover {
    background: #efefef;
}

.btn-primary {
    background: #2e8b57;
    color: white;
    border: none;
    padding: 10px 16px;
    border-radius: 10px;
    cursor: pointer;
    box-shadow: 0 3px 0 #1f613c;
    transition: 0.2s;
}
.btn-primary:hover {
    background: #257448;
    transform: translateY(-2px);
}

/* Alertas */
.alert {
    margin-top: 15px;
    padding: 12px;
    border-radius: 10px;
    font-size: 14px;
    animation: fadeAlert 0.3s ease;
}

@keyframes fadeAlert {
    from { opacity: 0; }
    to   { opacity: 1; }
}

.alert-success {
    background: #e6f7ee;
    color: #1d6b43;
    border-left: 4px solid #2e8b57;
}

.alert-error {
    background: #fde8e8;
    color: #9d2525;
    border-left: 4px solid #d83535;
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

<!--Logo/menu toggle 
 <div class="navbar-fixed">
     Logo e menu
    <img src="logo.png" class="nav-logo" onclick="toggleMenu()">

     Título central 
    <div class="nav-title">F u t u r e M i n d</div>
</div>
</div>
</nav> 

<script>
function toggleMenu() {
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("main");

    sidebar.classList.toggle("open");
    if (main) main.classList.toggle("shift");
}
</script>

<div id="main" class="page-wrapper">

 ============================
     SIMULAÇÃO DE ENTREVISTA
=============================== -->
<div class="page-content">
<div class="sim-card" id="simCard">
    <h2 class="title">Simulação de Entrevista</h2>

    <p class="sim-explain">
        A simulação ajuda você a treinar sua primeira entrevista com perguntas reais e feedback. 
        Duração média de <strong>15 a 20 minutos</strong>, por telefone ou vídeo.
    </p>

    <!-- horários -->
    <div style="text-align:center; font-weight:600; margin-bottom:8px;">Seg • 02/12</div>
    <div class="slot-row">
        <button class="slot-btn" data-slot="2025-12-02 12:00">12:00</button>
        <button class="slot-btn" data-slot="2025-12-02 13:00">13:00</button>
        <button class="slot-btn" data-slot="2025-12-02 14:00">14:00</button>
        <button class="slot-btn" data-slot="2025-12-02 15:00">15:00</button>
    </div>

    <div style="text-align:center; font-weight:600; margin-bottom:8px;">Ter • 03/12</div>
    <div class="slot-row">
        <button class="slot-btn" data-slot="2025-12-03 10:30">10:30</button>
        <button class="slot-btn" data-slot="2025-12-03 11:30">11:30</button>
        <button class="slot-btn" data-slot="2025-12-03 12:30">12:30</button>
        <button class="slot-btn" data-slot="2025-12-03 14:00">14:00</button>
        <button class="slot-btn" data-slot="2025-12-03 15:30">15:30</button>
    </div>

    <div style="text-align:center; font-weight:600; margin-bottom:8px;">Qua • 04/12</div>
    <div class="slot-row">
        <button class="slot-btn" data-slot="2025-12-04 08:30">08:30</button>
        <button class="slot-btn" data-slot="2025-12-04 10:30">10:30</button>
        <button class="slot-btn" data-slot="2025-12-04 11:30">11:30</button>
        <button class="slot-btn" data-slot="2025-12-04 12:00">12:00</button>
    </div>

    <p class="small-note">Clique em um horário para confirmar sua simulação.</p>
</div>


<!-- ===== Modal ===== -->
<div class="modal-backdrop" id="modalBackdrop">
    <div class="modal">
        <h4>Confirmar simulação</h4>
        <div id="modalDetails"></div>

        <form id="simForm">
            <input type="hidden" id="slotInput" name="slot">

            <div class="form-row">
                <label>Observações (opcional)</label>
                <textarea name="obs"></textarea>
            </div>

            <div class="btn-row">
                <button type="button" class="btn-ghost" id="cancelBtn">Cancelar</button>
                <button type="submit" class="btn-primary" id="confirmBtn">Confirmar</button>
            </div>

            <div class="alert" id="formAlert" style="display:none"></div>
        </form>
    </div>
</div>

</div> <!-- /main -->
</div>

<script>
/* ABRIR MODAL */
document.querySelectorAll(".slot-btn").forEach(btn => {
    btn.addEventListener("click", () => {
        const slot = btn.dataset.slot;
        document.getElementById("slotInput").value = slot;
        document.getElementById("modalDetails").textContent = 
            "Horário escolhido: " + slot;

        document.getElementById("modalBackdrop").style.display = "flex";
    });
});

/* FECHAR MODAL */
document.getElementById("cancelBtn").addEventListener("click", () => {
    document.getElementById("modalBackdrop").style.display = "none";
});

/* SUBMIT */
document.getElementById("simForm").addEventListener("submit", async e => {
    e.preventDefault();
    const alertBox = document.getElementById("formAlert");
    alertBox.style.display = "none";

    const res = await fetch("agendamento_action.php", {
        method: "POST",
        body: new FormData(e.target)
    });

    const json = await res.json();

    if (json.success) {
        alertBox.className = "alert alert-success";
        alertBox.textContent = "Agendamento confirmado!";
    } else {
        alertBox.className = "alert alert-error";
        alertBox.textContent = json.error;
    }

    alertBox.style.display = "block";
});
</script>

</body>
</html>
