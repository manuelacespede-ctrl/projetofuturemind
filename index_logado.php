<style>
/* pagina de acordo com a nav */
.page-content {
    margin-top: 110px;
}
/* boas vindas */
.recomendadas-title {
    font-family: 'Arial', sans-serif;
    font-size: 26px;
    font-weight: bold;
    color: #2f4f3a; /* Verde elegante escuro */
    margin: 25px 0 15px 5px;
    letter-spacing: 1px;
    text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    border-left: 5px solid #88bfb1; 
    padding-left: 10px;
}

/* vitrine de vagas */
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
  .card{
    z-index: 2;
  }

  .vaga-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    border: 1px solid #c5d5c5;
    transition: transform 0.2s, box-shadow 0.2s;
    height: 100%;
}

.vaga-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.20);
}

.vaga-titulo {
    font-size: 20px;
    color: #2f4f2f;
    font-weight: bold;
    margin-bottom: 8px;
}

.vaga-sub {
    font-size: 14px;
    color: #6a776b;
    margin-bottom: 12px;
}

.vaga-desc {
    font-size: 14px;
    color: #333;
    margin-bottom: 20px;
}

.vaga-btn {
    width: 100%;
    background: #2e8b57;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    cursor: pointer;
    transition: 0.2s;
}

.vaga-btn:hover {
    background: #256f46;
}
</style>
<div class="page-content">
<h2 class="recomendadas-title">
    <p>Vagas recomendadas para você, <?= $_SESSION['usuario_nome']; ?>:</p>
</h2>
 <div class="container my-4">

    <div class="row g-4">

        <!-- ===== VAGA 1 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Auxiliar Administrativo</h5>
        <p class="vaga-sub">R$ 1.800,00 · Santo André - SP</p>
        <p class="vaga-desc">
            Organização de documentos, atendimento e suporte ao setor administrativo.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="1">
           <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Auxiliar Administrativo', 
            'R$ 1.800,00 · Santo André - SP',
            ' A empresa Nova Horizonte Serviços Corporativos está contratando Auxiliar Administrativo para atuar no suporte às rotinas internas, oferecendo organização, atendimento e apoio às áreas administrativas. Entre as atividades estão: organização e arquivamento de documentos, atualização de planilhas e relatórios, atendimento a clientes e fornecedores, auxílio ao financeiro e suporte às demandas internas do escritório. <br><br>  Horário: Segunda a sexta-feira, das 08h00 às 17h00 (1h de intervalo). <br><br>  Endereço: Rua das Acácias, 254 – Bairro Jardim, Santo André – SP.  <br><br>  Contato da Empresa:<br>E-mail: rh@novahorizonte.com.br<br>WhatsApp: (11) 98765-2104',
            1
        )">
    Mais informações
</button>

        </form>
    </div>
</div>

<!-- ===== VAGA 2 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Atendente de Loja</h5>
        <p class="vaga-sub">R$ 1.650,00 · São Bernardo do Campo - SP</p>
        <p class="vaga-desc">
            Atendimento ao cliente, reposição de produtos e organização da loja.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="2">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Atendente de Loja', 
            'R$ 1.650,00 · São Bernardo do Campo - SP',
            ' A empresa Comercial São Lucas está contratando Atendente de Loja para prestar suporte direto aos clientes, auxiliando na escolha de produtos, reposição de mercadorias e organização do ambiente de vendas. Será responsável também por orientar sobre promoções, conferir preços e manter o atendimento ágil e cordial. <br><br> Horário: Segunda a sábado, das 09h00 às 17h30. <br><br> Endereço: Rua Marechal Deodoro, 712 – Centro, São Bernardo do Campo – SP.<br><br> Contato:<br>E-mail: atendimento@comercialsãolucas.com.br<br>WhatsApp: (11) 98221-4405',
            2
        )">
        Mais informações
</button>

        </form>
    </div>
</div>

<!-- ===== VAGA 3 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Auxiliar de Escritório</h5>
        <p class="vaga-sub">R$ 1.750,00 · Mauá - SP</p>
        <p class="vaga-desc">
            Digitação, envio de e-mails, suporte a relatórios e controle interno.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="3">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Auxiliar de Escritório', 
            'R$ 1.750,00 · Mauá - SP',
            ' A empresa Solutti Escritórios Integrados contrata Auxiliar de Escritório para atuar com suporte administrativo, organização de arquivos, atendimento telefônico, atualização de planilhas e auxiliar equipes internas com demandas operacionais.<br><br> Horário: Segunda a sexta-feira, 08h30 às 17h30.<br><br> Endereço: Avenida Barão de Mauá, 950 – Matriz, Mauá – SP. <br><br> Contato:<br>E-mail: rh@solutticorp.com.br<br>WhatsApp: (11) 99544-2019',
            3
        )">
        Mais informações
</button>
    </div>
</div>

<!-- ===== VAGA 4 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Operador de Caixa</h5>
        <p class="vaga-sub">R$ 1.700,00 + benefícios · Santo André - SP</p>
        <p class="vaga-desc">
            Atendimento no caixa, registro de vendas e controle de pagamentos.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="4">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Operador de Caixa', 
            'R$ 1.700,00 + benefícios · Santo André - SP',
            ' A loja Mercadão Popular Santo André contrata Operador de Caixa para atendimento ao cliente, registro de compras, recebimento de pagamentos, abertura e fechamento do caixa e manutenção da organização do setor.<br><br> Horário: Escala 6x1, das 13h00 às 21h20.<br><br> Endereço: Rua Coronel Oliveira Lima, 389 – Centro, Santo André – SP.<br><br> Contato:<br>E-mail: financeiro@mercadaopopularsa.com.br<br>WhatsApp: (11) 98412-6077',
        4
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

<!-- ===== VAGA 5 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Auxiliar de Almoxarifado</h5>
        <p class="vaga-sub">R$ 1.900,00 · Diadema - SP</p>
        <p class="vaga-desc">
            Recepção de mercadorias, contagem de estoque e organização do almoxarifado.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="5">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Auxiliar de Almoxarifado', 
            'R$ 1.900,00 · Diadema - SP'
            ' A empresa TecnoSteel Industrial está contratando Auxiliar de Almoxarifado para atuar com recebimento e conferência de materiais, controle de estoque, separação de itens e suporte na organização do setor.<br><br> Horário: Segunda a sexta, 07h30 às 16h30.<br><br> Endereço: Avenida Casa Grande, 1280 – Eldorado, Diadema – SP.<br><br> Contato:<br>E-mail: logistica@tecnosteel.com<br>WhatsApp: (11) 98701-5534',
        5
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

<!-- ===== VAGA 6 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Recepcionista</h5>
        <p class="vaga-sub">R$ 1.600,00 · São Caetano do Sul - SP</p>
        <p class="vaga-desc">
            Atendimento telefônico e presencial, agendamentos e suporte geral.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="6">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Recepcionista', 
            'R$ 1.600,00 · São Caetano do Sul - SP',
            ' A clínica Vitta Saúde e Bem-Estar busca Recepcionista para atendimento presencial, agendamento de consultas, organização da recepção e suporte administrativo.<br><br> Horário: Segunda a sexta, 08h00 às 17h00.<br><br> Endereço: Rua Alegre, 210 – Centro, São Caetano do Sul – SP.<br><br> Contato:<br>E-mail: contato@vittasaude.com<br>WhatsApp: (11) 97212-0833',       
                6
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

<!-- ===== VAGA 7 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Auxiliar de Logística</h5>
        <p class="vaga-sub">R$ 1.850,00 · São Bernardo do Campo - SP</p>
        <p class="vaga-desc">
            Separação, conferência e expedição de produtos no setor logístico.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="7">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Auxiliar de Logística', 
            'R$ 1.850,00 · São Bernardo do Campo - SP',
            ' A empresa TransLog Express contrata Auxiliar de Logística para separação de pedidos, conferência, organização de estoque, carga e descarga e apoio às rotinas do setor.<br><br> Horário: Segunda a sábado, 06h00 às 14h20.<br><br> Endereço: Estrada dos Casa, 4200 – Cooperativa, São Bernardo do Campo – SP.<br><br> Contato:<br>E-mail: rh@translogexpress.com<br>WhatsApp: (11) 98577-3410',
                7
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

<!-- ===== VAGA 8 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Auxiliar de Logística</h5>
        <p class="vaga-sub">R$ 1.850,00 · São Bernardo do Campo - SP</p>
        <p class="vaga-desc">
            Separação, conferência e expedição de produtos no setor logístico.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="8">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Auxiliar de Logística', 
            'R$ 1.850,00 · São Bernardo do Campo - SP',
            ' A empresa TransLog Express contrata Auxiliar de Logística para separação de pedidos, conferência, organização de estoque, carga e descarga e apoio às rotinas do setor.<br><br> Horário: Segunda a sábado, 06h00 às 14h20.<br><br> Endereço: Estrada dos Casa, 4200 – Cooperativa, São Bernardo do Campo – SP.<br><br> Contato:<br>E-mail: rh@translogexpress.com<br>WhatsApp: (11) 98577-3410',
                8
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

<!-- ===== VAGA 9 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Atendente de Telemarketing</h5>
        <p class="vaga-sub">R$ 1.450,00 + bônus · Mauá - SP</p>
        <p class="vaga-desc">
            Atendimento ativo e receptivo, suporte ao cliente e registro no sistema.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="9">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Atendente de Telemarketing', 
            'R$ 1.450,00 + bônus · Mauá - SP',
            ' A CallCenter Max procura Atendente de Telemarketing para atendimento receptivo e ativo, registro de chamadas, suporte ao cliente e oferta de serviços.<br><br> Horário: Segunda a sábado, 08h40 às 15h00.<br><br> Endereço: Rua São João, 502 – Centro, Mauá – SP.<br><br> Contato:<br>E-mail: contato@callcentermax.com<br>WhatsApp: (11) 98740-9123',
                9
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

<!-- ===== VAGA 10 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Auxiliar de Produção</h5>
        <p class="vaga-sub">R$ 1.800,00 · Diadema - SP</p>
        <p class="vaga-desc">
            Atividades na linha de produção, organização e controle de materiais.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="10">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Auxiliar de Produção', 
            'R$ 1.800,00 · Diadema - SP',
            ' A empresa Metalúrgica Alves está contratando Auxiliar de Produção para montagem, inspeção, organização da linha de produção e apoio às tarefas operacionais.<br><br> Horário: Segunda a sexta, 07h00 às 16h00.<br><br> Endereço: Avenida Piraporinha, 1801 – Centro, Diadema – SP.<br><br> Contato:<br>E-mail: producao@metalurgicaalves.com<br>WhatsApp: (11) 97122-8840',
                10
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

<!-- ===== VAGA 11 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Estoquista</h5>
        <p class="vaga-sub">R$ 1.750,00 · Santo André - SP</p>
        <p class="vaga-desc">
            Organização, separação de mercadorias e apoio ao controle de estoque.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="11">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Estoquista', 
            'R$ 1.750,00 · Santo André - SP',
            ' A loja MegaStore Santo André contrata Estoquista para controle de estoque, reposição, conferência de produtos e organização do setor de armazenagem.<br><br> Horário: Segunda a sábado, 08h00 às 16h20.<br><br> Endereço: Rua Oratório, 1950 – Parque das Nações, Santo André – SP.<br><br> Contato:<br>E-mail: estoque@megastoresa.com<br>WhatsApp: (11) 98155-2099',
                11
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

<!-- ===== VAGA 12 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Promotor de Vendas</h5>
        <p class="vaga-sub">R$ 1.600,00 + comissão · SBC - SP</p>
        <p class="vaga-desc">
            Divulgação de produtos, abordagem ao cliente e suporte nas vendas.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="12">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Promotor de Vendas', 
            'R$ 1.600,00 + comissão · SBC - SP',
            ' A empresa ProMarket Soluções busca Promotor de Vendas para reposição, demonstração de produtos e suporte ao ponto de venda.<br><br> Horário: Segunda a sábado, 08h30 às 17h00.<br><br> Endereço: Avenida Senador Vergueiro, 3100 – Rudge Ramos, São Bernardo do Campo – SP.<br><br> Contato:<br>E-mail: vendas@promarket.com<br>WhatsApp: (11) 98603-2181',
                12
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

<!-- ===== VAGA 13 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Auxiliar de RH</h5>
        <p class="vaga-sub">R$ 1.850,00 · São Caetano do Sul - SP</p>
        <p class="vaga-desc">
            Apoio em entrevistas, triagem, integrações e processos internos do RH.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="13">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Auxiliar de RH', 
            'R$ 1.850,00 · São Caetano do Sul - SP'
            ' A empresa RH Brasil Consultoria está contratando Auxiliar de RH para apoio em processos de recrutamento e seleção, triagem de currículos, agendamentos e rotinas de departamento pessoal.<br><br> Horário: Segunda a sexta, 08h00 às 17h00.<br><br> Endereço: Rua Amazonas, 502 – Oswaldo Cruz, São Caetano do Sul – SP.<br><br> Contato:<br>E-mail: rh@rhbrasilconsult.com<br>WhatsApp: (11) 98011-9088',
                13
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

<!-- ===== VAGA 14 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Jovem Aprendiz Administrativo</h5>
        <p class="vaga-sub">R$ 1.100,00 · Santo André - SP</p>
        <p class="vaga-desc">
            Suporte administrativo enquanto realiza curso profissionalizante.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="14">
           <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Jovem Aprendiz Administrativo', 
            'R$ 1.100,00 · Santo André - SP',
            ' A empresa OfficeOne Gestão Empresarial contrata Jovem Aprendiz para suporte administrativo, organização de documentos, atendimento básico, auxílio em planilhas e rotinas internas.<br><br> Horário: Segunda a sexta, 09h00 às 15h00.<br><br>📍 Endereço: Rua Catequese, 401 – Jardim, Santo André – SP.<br><br> Contato:<br>E-mail: aprendiz@officeone.com<br>WhatsApp: (11) 97044-5122',
                14
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

<!-- ===== VAGA 15 ===== -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="vaga-card">
        <h5 class="vaga-titulo">Atendente de Cantina Escolar</h5>
        <p class="vaga-sub">R$ 1.420,00 · Mauá - SP</p>
        <p class="vaga-desc">
            Atendimento aos alunos, preparo simples de alimentos e organização.
        </p>
        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" name="vaga_id" value="15">
            <button type="button" class="vaga-btn" 
        onclick="abrirModalVaga(
            'Atendente de Cantina Escolar', 
            'R$ 1.420,00 · Mauá - SP',
            ' A Cantina Mundo Kids está contratando Atendente de Cantina para preparo simples de lanches, atendimento aos alunos, organização do ambiente e controle básico de estoque.<br><br> Horário: Segunda a sexta, 07h00 às 15h00.<br><br> Endereço: Rua Presidente Castelo Branco, 220 – Vila Magini, Mauá – SP.<br><br>📞 Contato:<br>E-mail: contato@mundokidscantina.com<br>WhatsApp: (11) 97245-1280',
                15
        )">
        Mais informações
</button>
        </form>
    </div>
</div>

    </div>
</div>

      <style>
/* Container geral */
.modal-clean {
    border-radius: 16px;
    border: none;
    box-shadow: 0 6px 28px rgba(0,0,0,0.12);
}

/* Header */
.clean-header {
    background: #e7f3e7;
    border-bottom: none;
    padding: 20px 28px;
}

.clean-header h4 {
    font-size: 22px;
    margin: 0;
    color: #1f4e33;
    font-weight: 700;
}

/* Corpo */
.clean-body {
    padding: 25px 28px 10px;
}

.vaga-info {
    margin-bottom: 15px;
    font-size: 16px;
    color: #2d5a3b;
}

.vaga-descricao {
    color: #444;
    margin-bottom: 18px;
    line-height: 1.5;
}

/* Lista */
.modal-lista {
    list-style: none;
    padding-left: 0;
}

.modal-lista li {
    margin-bottom: 10px;
    color: #333;
    font-size: 15px;
    display: flex;
    gap: 8px;
    align-items: center;
}

.modal-lista i {
    color: #2e8b57;
    font-size: 16px;
}

/* Footer */
.clean-footer {
    border-top: none;
    padding: 15px 28px 25px;
    display: flex;
    justify-content: space-between;
}

.clean-cancel {
    background: #f1f1f1;
    border-radius: 8px;
    padding: 10px 18px;
}

.clean-send {
    background: #2e8b57;
    padding: 10px 25px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
}

</style>

<!-- MODAL DE INFORMAÇÕES DA VAGA -->
<div class="modal fade" id="modalVaga" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa-solid fa-briefcase"></i> 
          <span id="vagaTitulo"></span>
        </h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body" style="padding: 20px 24px;">
        <p id="vagaSub"></p>
        <p id="vagaDesc"></p>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

        <form action="confirmar_candidatura.php" method="POST">
            <input type="hidden" id="vaga_id_modal" name="vaga_id">
            <button type="submit" class="btn btn-success">Enviar currículo</button>
        </form>
      </div>
      
    </div>
  </div>
</div>

    </div>
  </div>
</div>
<script>
function abrirModalVaga(titulo, subtitulo, descricao, vaga_id) {
    document.getElementById("vagaTitulo").textContent = titulo;
    document.getElementById("vagaSub").textContent = subtitulo;
    document.getElementById("vagaDesc").innerHTML = descricao;
    document.getElementById("vaga_id_modal").value = vaga_id;

    const modal = new bootstrap.Modal(document.getElementById("modalVaga"));
    modal.show();
}
</script>

    </div>
  </div>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>