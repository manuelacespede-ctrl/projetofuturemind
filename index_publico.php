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
    padding-top: 10px !important;
    font-family: "Inter", Arial, sans-serif;
     margin: 0;
    padding: 0;
    background: #d9ead9; /* verde clarinho */
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

/* CONTEÚDO PRINCIPAL */
.main-wrapper {
    padding-top: 70px; 
}

/* ===========================
   CARD PRINCIPAL — SIMULAÇÃO
   =========================== */
.simulacao-box {
    max-width: 10500px;
    background: linear-gradient(135deg, #ffffff, #f4fff6);
    border-radius: 20px;
    padding: 60px 50px;
    margin: 40px auto 60px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    border-left: 12px solid #2b7a4b;
    border-right: 12px solid #2b7a4b;
    transition: 0.25s;
}

.simulacao-box:hover {
    transform: scale(1.01);
    box-shadow: 0 12px 30px rgba(0,0,0,0.18);
}

/* TÍTULO PRINCIPAL */
.simulacao-box h1 {
    font-size: 42px;
    font-weight: 700;
    color: #1f4e33;
    margin-bottom: 20px;
}

/* TEXTO */
.simulacao-box p {
    font-size: 18px;
    color: #3f3f3f;
    max-width: 750px;
    margin: 0 auto 30px;
    line-height: 1.5;
}

/* BOTÃO CHAMATIVO */
.simulacao-btn {
    background: #2e8b57;
    color: white;
    padding: 18px 36px;
    font-size: 20px;
    font-weight: bold;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 0 #1c5d38;
    transition: 0.2s;
}

.simulacao-btn:hover {
    background: #257648;
    transform: translateY(-3px);
}
/* SEÇÕES ABAIXO DA PRINCIPAL */
/* ===================== CARDS DE APOIO ===================== */
.card-img {
    width: 100%;
    height: 140px;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 10px;
}

.card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cards-secao {
    max-width: 1200px;
    margin: 0 auto;
}

.cards-linha {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 24px;
}

/* CARD INDIVIDUAL */
.card-apoio {
    background: white;
    width: 32%;
    min-height: 230px;
    border-radius: 14px;
    box-shadow: 0px 4px 12px rgba(0,0,0,0.08);
    padding: 18px;
    border-left: 4px solid #88bfb1;
    text-align: center;
}

.card-img {
    width: 100%;
    height: 180px;
    background: #dce6d9;
    border-radius: 10px;
    margin-bottom: 14px;
}

.card-apoio h3 {
    margin: 0 0 8px 0;
    font-size: 20px;
    color: #2e5338;
}

.card-apoio p {
    font-size: 14px;
    color: #4a4a4a;
}

/* Responsivo */
@media(max-width: 900px) {
    .card-apoio { width: 48%; }
}
@media(max-width: 600px) {
    .card-apoio { width: 100%; }
}
</style>
<script>
    function abrirModalVaga() {
        const modal = new bootstrap.Modal(document.getElementById('modalVaga'));
        modal.show();
    }
</script>
<?php include "menu.php"; ?>
 <div class="main-wrapper">
<img src="capa.png"
           alt="Imagem destaque" loading="lazy" style="
        display:block;
        width:100%;
        height:90vh;
        object-fit:cover;
        object-position:center;
        margin:0;
        padding:0;
        border:0;
        border-radius: 3%;
     " >
    <!-- ===========================
         DESTAQUE PRINCIPAL — SIMULAÇÃO
         =========================== -->
    <div class="simulacao-box">
        <h1 class="sim-title">
    <i class="fa-solid fa-comments animated-icon"></i>
    Simulação de Entrevista
</h1>
        <p>
            Treine com atendentes reais, receba feedback personalizado e aumente 
            suas chances de conquistar o primeiro emprego.
        </p>

        <form action="login.php">
            <button class="simulacao-btn">Quero fazer a simulação</button>
        </form>
    </div>


    
    <section class="cards-secao">

        <div class="cards-linha">

            <!-- CARD 1 -->
            <div class="card-apoio">
                <div class="card-img">
                    <img src="aprenda.jpg" alt="Montar currículo">
                </div> <!-- FOTO AQUI -->
                <h3>Montar Currículo</h3>
                <p>Aprenda a criar um currículo simples e profissional, ideal para o primeiro emprego.</p>
            </div>

            <!-- CARD 2 -->
            <div class="card-apoio">
                 <div class="card-img">
                    <img src="entrevista.jpg" alt="Montar currículo">
                </div>
                <h3>Dicas de Entrevista</h3>
                <p>Conheça perguntas comuns, como responder e como se posicionar com confiança.</p>
            </div>

            <!-- CARD 3 -->
            <div class="card-apoio">
                 <div class="card-img">
                    <img src="iniciante.jpg" alt="Montar currículo">
                </div>
                <h3>Vagas para Iniciantes</h3>
                <p>Veja vagas de emprego pensadas especialmente para jovens sem experiência.</p>
            </div>

        </div>

    </section>

</div>
<br>
<!-- FOOTER -->
  <footer class="site-footer">
    <style>  /*footer*/
    footer.site-footer {
      background: #6A776B;
      color: #fff;
      padding: 18px 0;
      text-align: center;
      font-size: 0.9rem;
      font-family: Arial, Helvetica, sans-serif;
    }</style>
    <div>&copy; 2025 <span id="year"></span> Eduarda Neri, Manuela Cespede, Thalia Ferreira — Todos os direitos reservados</div>
  </footer>

<script>
function abrirModalVaga() {
    const modal = new bootstrap.Modal(document.getElementById('modalVaga'));
    modal.show();
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>