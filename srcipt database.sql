CREATE DATABASE bd_futuremind;
USE bd_futuremind;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE empresas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cnpj VARCHAR(20) UNIQUE,
    email VARCHAR(150),
    telefone VARCHAR(20),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE vagas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descricao TEXT NOT NULL,
    requisitos TEXT,
    salario VARCHAR(50),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (empresa_id) REFERENCES empresas(id)
);

CREATE TABLE candidaturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    vaga_id INT NOT NULL,
    status VARCHAR(50) DEFAULT 'pendente',
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (vaga_id) REFERENCES vagas(id)
);

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    data_agendada DATETIME NOT NULL,
    status VARCHAR(50) DEFAULT 'confirmado',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

SELECT * FROM usuarios;

ALTER TABLE agendamentos ADD COLUMN obs TEXT NULL;

CREATE TABLE notificacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    mensagem TEXT NOT NULL,
    lida TINYINT(1) DEFAULT 0,
    criada_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE candidaturas
ADD COLUMN data_candidatura DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

SHOW CREATE TABLE vagas;
ALTER TABLE vagas DROP FOREIGN KEY vagas_ibfk_1;
ALTER TABLE vagas DROP COLUMN empresa_id;
DELETE FROM candidaturas;
DELETE FROM vagas;

INSERT INTO vagas (titulo, descricao, requisitos, salario)
VALUES
-- 1
('Auxiliar Administrativo',
 'Organização de documentos, atendimento e suporte ao setor administrativo.',
 'Organizar documentos, auxiliar no atendimento, apoiar rotinas administrativas.',
 'R$ 1.800,00 · Santo André - SP'),

-- 2
('Atendente de Loja',
 'Atendimento ao cliente, reposição de produtos e organização da loja.',
 'Atender clientes, repor produtos, manter loja organizada.',
 'R$ 1.650,00 · São Bernardo do Campo - SP'),

-- 3
('Auxiliar de Escritório',
 'Digitação, envio de e-mails, suporte a relatórios e controle interno.',
 'Digitar documentos, enviar e-mails, apoiar relatórios.',
 'R$ 1.750,00 · Mauá - SP'),

-- 4
('Operador de Caixa',
 'Atendimento no caixa, registro de vendas e controle de pagamentos.',
 'Registrar vendas, atender clientes, operar caixa.',
 'R$ 1.700,00 + benefícios · Santo André - SP'),

-- 5
('Auxiliar de Almoxarifado',
 'Recepção de mercadorias, contagem de estoque e organização do almoxarifado.',
 'Receber mercadorias, conferir estoque, organizar almoxarifado.',
 'R$ 1.900,00 · Diadema - SP'),

-- 6
('Recepcionista',
 'Atendimento telefônico e presencial, agendamentos e suporte geral.',
 'Atender chamadas, recepcionar visitantes, realizar agendamentos.',
 'R$ 1.600,00 · São Caetano do Sul - SP'),

-- 7
('Assistente de Atendimento',
 'Suporte ao cliente, abertura de chamados e organização de atendimentos.',
 'Abrir chamados, organizar atendimentos, prestar suporte básico.',
 'R$ 1.680,00 · Santo André - SP'),

-- 8
('Auxiliar de Logística',
 'Separação, conferência e expedição de produtos no setor logístico.',
 'Separar pedidos, conferir produtos, auxiliar na expedição.',
 'R$ 1.850,00 · São Bernardo do Campo - SP'),

-- 9
('Atendente de Telemarketing',
 'Atendimento ativo e receptivo, suporte ao cliente e registro no sistema.',
 'Realizar chamadas, registrar atendimentos, apoiar clientes.',
 'R$ 1.450,00 + bônus · Mauá - SP'),

-- 10
('Auxiliar de Produção',
 'Atividades na linha de produção, organização e controle de materiais.',
 'Auxiliar na produção, organizar materiais, seguir instruções.',
 'R$ 1.800,00 · Diadema - SP'),

-- 11
('Estoquista',
 'Organização, separação de mercadorias e apoio ao controle de estoque.',
 'Separar produtos, manter estoque organizado, apoiar inventário.',
 'R$ 1.750,00 · Santo André - SP'),

-- 12
('Promotor de Vendas',
 'Divulgação de produtos, abordagem ao cliente e suporte nas vendas.',
 'Abordar clientes, divulgar produtos, apoiar vendedores.',
 'R$ 1.600,00 + comissão · São Bernardo do Campo - SP'),

-- 13
('Auxiliar de RH',
 'Apoio em entrevistas, triagem, integrações e processos internos do RH.',
 'Apoiar entrevistas, organizar documentos, auxiliar no onboarding.',
 'R$ 1.850,00 · São Caetano do Sul - SP'),

-- 14
('Jovem Aprendiz Administrativo',
 'Suporte administrativo enquanto realiza curso profissionalizante.',
 'Auxiliar rotina administrativa simples, organizar documentos.',
 'R$ 1.100,00 · Santo André - SP'),

-- 15
('Atendente de Cantina Escolar',
 'Atendimento aos alunos, preparo simples de alimentos e organização.',
 'Atender alunos, organizar cantina, preparar lanches simples.',
 'R$ 1.420,00 · Mauá - SP');


ALTER TABLE vagas MODIFY salario VARCHAR(150);

SELECT * FROM vagas;

CREATE TABLE curriculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    nome VARCHAR(150),
    data_nascimento DATE,
    endereco VARCHAR(255),
    telefone VARCHAR(50),
    email VARCHAR(150),
    objetivo TEXT,
    experiencia TEXT,
    formacao TEXT,
    idiomas TEXT,
    adicionais TEXT,
    arquivo VARCHAR(255),
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);


ALTER TABLE usuarios 
ADD COLUMN foto VARCHAR(255) DEFAULT NULL;


