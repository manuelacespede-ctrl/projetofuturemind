<html lang="pt-br">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    
  .search-container {
  display: flex;
  justify-content: center;
  padding: 20px;
  background-color: #d1e3d1; /* tom de verde suave */
}

.search-box {
  display: flex;
  align-items: center;
  background-color: #d1e3d1;
  border-radius: 30px;
  box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2);
  padding: 8px 12px;
  gap: 8px;
}

.search-box input {
  border: none;
  background: transparent;
  outline: none;
  font-size: 14px;
  color: #333;
  width: 180px;
}

.icon {
  font-size: 16px;
  color: #666;
}

.divider {
  height: 24px;
  width: 1px;
  background-color: #aaa;
  margin: 0 8px;
}
/* Logo */
    .logo {
      position: fixed;
      top: 20px;
      left: 80px;
      width: 80px;
      height: 80px;
      cursor: pointer;
      transition: transform 0.2s;
    }
    .logo:hover {
      transform: scale(1.1);
    }

/* Menu lateral */
    .sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #111;
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

    /* Conteúdo do site */
    .main {
      padding: 20px;
      transition: margin-left 0.3s;
    }

    .sidebar.open {
      width: 250px;
    }

    .main.shift {
      margin-left: 250px;
    }

    .search-container {
  display: flex;
  justify-content: center;
  padding: 20px;
  background-color: #d1e3d1; /* tom de verde suave */
}

.search-box {
  display: flex;
  align-items: center;
  background-color: #d1e3d1;
  border-radius: 30px;
  box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2);
  padding: 8px 12px;
  gap: 8px;
}

.search-box input {
  border: none;
  background: transparent;
  outline: none;
  font-size: 14px;
  color: #333;
  width: 180px;
}

.icon {
  font-size: 16px;
  color: #666;
}

.divider {
  height: 24px;
  width: 1px;
  background-color: #aaa;
  margin: 0 8px;
}

.dropbtn {
    background-color: #d4e1d4;
    color: #fff;
    padding: 6px 14px;
    font-size: 13px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    z-index: 1;
  }
  .dropdown {
    position: relative;
    display: inline-block;
  }
  .dropdown-content {
    display: none;
    position: absolute;
    background: #fff;
    min-width: 140px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  }
  .dropdown-content a {
    display: block;
    padding: 8px 12px;
    color: #333;
    text-decoration: none;
  }
  .dropdown-content a:hover {
    background: #f1f1f1;
  }
  .dropdown:hover .dropdown-content {
    display: block;
  }
  .card{
    z-index: 2;
  }

  .contato-empresa {
    background: #f0f4ff;
    padding: 15px;
    border-radius: 8px;
    margin-top: 20px;
    border-left: 4px solid #376bff;
}

.contato-empresa h3 {
    margin: 0 0 10px 0;
}

.contato-empresa a {
    color: #1a4cff;
    text-decoration: none;
    font-weight: bold;
}

.contato-empresa a:hover {
    text-decoration: underline;
}

</style>
             <body>
              <?php include 'menu.php'; ?>
<div id="sidebar" class="sidebar">
    <span class="closebtn" onclick="toggleMenu()">&times;</span>
    <a href="#">Início</a>
    <a href="#">Sobre</a>
    <a href="#">Serviços</a>
    <a href="#">Contato</a>
  </div>
  <script>
    function toggleMenu() {
      const sidebar = document.getElementById("sidebar");
      const main = document.getElementById("main");

      sidebar.classList.toggle("open");
      main.classList.toggle("shift");
    }
  </script>
</html>
            
            
<!--começo da nav-->
<nav class="navbar navbar-light" style="background-color: #d1e3d1;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">FutureMind</a>
        <form class="d-flex">
            <div class="search-container">
  <div class="search-box" style="width: 90rem;">
    <img src="../icons/lupa.png"></img> <!-- Ícone de lupa -->
    <input type="text" placeholder="Palavra-chave">
    <div class="divider"></div>
    <img src="../icons/loc.png"></img> <!-- Ícone de localização -->
    <input type="text" placeholder="Cidade, estado ou região">
  </div>
</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="../icons/calendario.png">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    </div>
</nav> 
<!--Fim da nav-->
<p></p>
</div>
<p></p>
<div>
    <div class="card-body">
        <h5 class="card-title">Vaga Administrativa</h5>
        <h6 class="card-subtitle mb-2 text-muted">De R$ 3.001,00 a R$ 4.000,00. 1 vaga: Mauá - SP.</h6>
        <h6 class="card-subtitle mb-2 text-muted">1 vaga | CLT (Efetivo) | Publicada ontem</h6><br><br>
        <button type="button" class="btn btn-success">Sobre a vaga</button>
        <p class="card-text">Responsabilidades: 
Organização, digitalização e arquivamento de documentos físicos e eletrônicos;
Preenchimento de planilhas e relatórios de controle; 
Lançamento de notas fiscais de entrada e saída; 
Cadastro e manutenção de produtos no sistema; 
Alteração de preços de produtos conforme orientação; 
Apoios nas rotinas administrativas gerais.  <br>

Requisitos: 
Ensino Médio completo; 
Ensino superior em andamento administração; 
Experiência em rotinas fiscais; 
Conhecimento em Excel; 
Organização, agilidade e atenção aos detalhes
Necessário experiência anterior na função de Auxiliar Administrativo. 
Conhecimento em notas fiscais. 
Residir em Mauá e/ou proximidades.</p>
        <p></p>
        <button type="button" class="btn btn-success">Benefícios</button>
        <p></p>
        <p class="card-text">Assistência Médica / Medicina em grupo, Seguro de Vida em Grupo, Cesta Básica, Vale Transporte
    </div>
    <button type="button" class="btn btn-success">Enviar Currículo</button>
    </div>
    </div>
    <p></p>
    <h6 class="card-text">Requisitos:</h6>
    <h6 class="">Ensino Médio completo;</h6>
    <h6 class="card-subtitle mb-2 text-muted">Ensino superior em andamento administração;</h6>
    <h6 class="card-subtitle mb-2 text-muted">Experiência em rotinas fiscais;</h6>
    <h6 class="card-subtitle mb-2 text-muted">Conhecimento em Excel;</h6>
    <h6 class="card-subtitle mb-2 text-muted">Organização, agilidade e atenção aos detalhes;</h6>
    <h6 class="card-subtitle mb-2 text-muted">Necessário experiência anterior na função de Auxiliar Administrativo;</h6>
    <h6 class="card-subtitle mb-2 text-muted">Conhecimento em notas fiscais;</h6>
    <h6 class="card-subtitle mb-2 text-muted">Residir em Mauá e/ou aproximidades.</h6>
<p></p>
</div>


<!--CONTATO COM A EMPRESA-->
<div class="contato-empresa">
    <h3>Contato da Empresa</h3>

    <p><strong>E-mail:</strong> empresa@exemplo.com</p>

    <p><strong>WhatsApp:</strong> 
        <a href="https://wa.me/5511999999999" target="_blank">
            (11) 99999-9999
        </a>
    </p>

    <p><strong>LinkedIn:</strong> 
        <a href="https://www.linkedin.com/company/exemplo" target="_blank">
            linkedin.com/company/exemplo
        </a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>