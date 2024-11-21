<?php 
include "../conexao.php";
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: ../tela_login/tela_login.php");
    exit;
} 


$user_id = $_SESSION['user_id'];  
$sql = "SELECT nome FROM pessoas WHERE cod_pessoa = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);  
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $nome_completo = $user['nome'];  
    $primeiro_nome = explode(" ", $nome_completo)[0];  
    $_SESSION['nome'] = $primeiro_nome; 
} else {
    echo "Erro ao buscar dados do usuário.";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="../logo.ico/favicon-16x16.png" type="image/x-icon">
    
    <link rel="stylesheet" href="logado.css">

    <title>Tela Usuario logado</title>
</head>
<body>

<header id="header">
    <div class="container">
        <div class="flex">
            <a href="../tela_inicial/tela_inicial.html" class="a_home"><img src="midia/logo.png" alt="imagem de arvore da logo" id="logo"></a>
            <nav class="menu_nav">
                <ul>
                    <li><a class="active" href="../tela_nossa_casa/tela_nossa_casa.html">Nossa casa</a></li>
                    <li><a class="active" href="../tela_servicos/tela_servicos.html">Serviços</a></li>
                    <li><a class="active" href="../tela_contatos/tela_contatos.html">Contato</a></li>
                    <li><a href="tela_logado.php"><img src="midia/gerenciamento-de-usuarios-1.png" alt="beaba" class="img-menu"></a></li>
                    <div id="maker"></div>
                </ul>
            </nav>
        </div>

        <div class="btn-abrir_menu" id="btn-menu">
            <i> <img src="midia/icone-menu.png" alt="" /></i>
        </div>

        <div class="menu-mobile" id="menu-mobile">
            <div class="btn-fechar">
                <i> <img src="midia/icone_close.png" alt="" /></i>
            </div>

            <nav id="nav">
                <ul>
                    <li><a href="../tela_nossa_casa/tela_nossa_casa.html">Nossa casa</a></li>
                    <li><a href="../tela_servicos/tela_servicos.html">Serviços</a></li>
                    <li><a href="../tela_contatos/tela_contatos.html">Contato</a></li>
                    <li><a href="tela_logado.php"><img src="midia/gerenciamento-de-usuarios-1.png" alt="beaba" class="img-menu"></a></li>
                </ul>
            </nav>
        </div>
        <div class="overlay-menu" id="overlay-menu"></div>
    </div>
</header>

<!-- INICIO CONTEUDO PRINCIPAL -->
<main>
    <h1 class="title-forms">Seja bem-vindo(a) <br><span><?php echo $_SESSION['nome']; ?></span></h1>

    <div class="container-content">
      <a href="#">
        <img src="midia/icone-do-main.png" alt="icone do conteudo principal">
        <div class="texto">
          <h2>GERENCIE SEUS DADOS</h2>
          <p>Altere seu e-mail, senha ou outras informações pessoais</p>
        </div>
      </a>
    </div>

    <div class="container-content">
      <a href="#">
        <img src="midia/icone-do-main.png" alt="icone do conteudo principal">
        <div class="texto2">
          <h2>GERAR RELATORIO</h2>
          <p>Gere relatórios sobre seu residente </p>
        </div>
      </a>
    </div>


    <div class="logout">
        <p>caso queira sair da sua conta, clique aqui.</p>
        <a href="logout.php">Sair da conta</a>
    </div>
</main>

<footer id="footer">
    <img src="midia/Line 1.png" alt="" />
    <div class="rodape">
        <img src="midia/Vector.png" alt="logo rodape" />
        <p>
            Copyright©2024-2030, orleans Company. Todos os direitos reservados.
        </p>
        <p>política de privacidade</p>
        <p>direito de títulos</p>
    </div>
</footer>

<script src="menu-mobile.js" defer></script>
<script src="voltar-topo.js" defer></script>
</body>
</html>
