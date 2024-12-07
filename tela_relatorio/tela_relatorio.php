<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../logo.ico/favicon-16x16.png" type="image/x-icon">
    <title>Relatórios</title>
</head>
<body>
    
    <!-- Menu Flutuante -->
    <div class="menu_container" id="menu_flutuante">
        <label for="fechar"><img src="midia/icone_close.png" alt="Fechar Menu"></label>
        <nav>
            <ul>
                <li><a href="#">Quem Somos</a></li>
                <li><a href="../tela_nossa_casa/tela_nossa_casa.html">Nossa Casa</a></li>
                <li><a href="../tela_servicos/tela_servicos.html">Serviços</a></li>
                <li><a href="../tela_contatos/tela_contatos.html">Contato</a></li>
            </ul>
        </nav>
    </div>

    <div id="overlay"></div>

    <!-- Cabeçalho -->
    <header id="header">
        <div class="container">
            <div class="flex">
                <a href="../tela_inicial/tela_inicial.html"><img src="midia/logo.png" alt="Logo" id="logo"></a>
                <nav id="navdesktop">
                    <ul id="navbar">
                        <li><a href="#" class="navitem">Quem Somos</a></li>
                        <li><a href="../tela_nossa_casa/tela_nossa_casa.html" class="navitem">Nossa Casa</a></li>
                        <li><a href="../tela_servicos/tela_servicos.html" class="navitem">Serviços</a></li>
                        <li><a href="../tela_contatos/tela_contatos.html" class="navitem">Contato</a></li>
                    </ul>
                </nav>
                <div id="navmobile">
                    <input type="radio" name="hamburguer" id="abrir">
                    <input type="radio" name="hamburguer" id="fechar" checked>
                    <label for="abrir" id="label_hamburguer"><img src="midia/icone-menu.png" id="img_hamburguer" alt="Menu"></label>
                </div>
            </div>
        </div>
    </header>

    <!-- Seção de Relatórios -->
    <main>
        <section class="report-section">
            <div class="report-item">
    <h3>Plano de alimentação:</h3>
    <button class="data-btn">Dados em formato de PDF</button>
    <a href="pdfs/Alimentação.pdf" download="plano-de-alimentacao.pdf">
        <button class="download-btn">Baixar arquivo</button>
    </a>
</div>

<div class="report-item">
    <h3>Horário de lazer do residente:</h3>
    <button class="data-btn">Dados em formato de PDF</button>
    <a href="pdfs/Lazer.pdf" download="horario-de-lazer.pdf">
        <button class="download-btn">Baixar arquivo</button>
    </a>
</div>

<div class="report-item">
    <h3>Horário de alimentações:</h3>
    <button class="data-btn">Dados em formato de PDF</button>
    <a href="pdfs/horario de comer.pdf" download="horario-de-alimentacoes.pdf">
        <button class="download-btn">Baixar arquivo</button>
    </a>
</div>

<div class="report-item">
    <h3>Ocorrências:</h3>
    <button class="data-btn">Dados em formato de PDF</button>
    <a href="pdfs/Ocorrencia.pdf" download="ocorrencias.pdf">
        <button class="download-btn">Baixar arquivo</button>
    </a>
</div>
        </section>
    </main>

    <!-- Botão para voltar ao topo -->
    <div id="botao">
        <a href="#header"><img src="midia/seta2.png" alt="seta"></a>
    </div>

    <script src="javascript/menu.js"></script>
    <script src="javascript/main.js"></script>
</body>
</html>