<?php
include "../conexao.php"; 

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT cod_pessoa, senha, sit FROM pessoas WHERE email = ?";
    $stmt = $conn->prepare(query: $sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify(password: $senha, hash: $user['senha'])) {
            
            $update_sql = "UPDATE pessoas SET sit = 1 WHERE cod_pessoa = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("i", $user['cod_pessoa']);
            if ($update_stmt->execute()) {
                session_start();
                $_SESSION['user_id'] = $user['cod_pessoa'];
                $_SESSION['email'] = $email;

                header("Location: ../tela_usuario-logado/tela_logado.php");
                exit;
            } else {
                $error_message = "Erro ao atualizar o status do usuário.";
            }
        } else {
            $error_message = "Senha incorreta.";
        }
    } else {
        $error_message = "E-mail não encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="../logo.ico/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
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
                        <li><a class="active" href="tela_login.php">Entrar</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="btn-abrir_menu" id="btn-menu">
            <i> <img src="midia/icone-menu.png" alt="" /></i>
        </div>

        <div class="menu-mobile" id="menu-mobile">
            <div class="btn-fechar">
                <i> <img src="midia/icone_close.png" alt="" /></i>
            </div>

            <nav>
                <ul>
                    <li><a href="../tela_nossa_casa/tela_nossa_casa.html">Nossa casa</a></li>
                    <li><a href="../tela_servicos/tela_servicos.html">Serviços</a></li>
                    <li><a href="../tela_contatos/tela_contatos.html">Contato</a></li>
                    <li><a href="tela_login.php">Entrar</a></li>
                </ul>
            </nav>
        </div>
        <div class="overlay-menu" id="overlay-menu"></div>
    </header>

<main>
    <div class="formulario" >
        <h1 class="title-forms">ENTRE NA SUA <span>CONTA</span></h1>
        <form action="" method="post" class="form">    
            <input type="email" id="email" name="email" placeholder="E-mail" required />
            <input type="password" id="senha" name="senha" placeholder="Senha" required />
            <a href="#">Esqueci minha senha</a>
            <input type="submit" id="submit" value="ENTRAR">
        </form>

        <?php if ($error_message): ?>
            <script>
                alert("<?php echo $error_message; ?>");
            </script>
        <?php endif; ?>
    </div>
          

    <div class="container-content">

    </div>


    <div class="container-link">
        <p>CLIQUE ABAIXO E Venha fazer estágio conosco</p>
        <a href="../tela_estagio/estagio.php"> aplicação de estágio </a>
    </div>
      
    <div class="container-link">
        <p>caso você ainda não tenha uma conta clique abaixo para criar </p>
        <a href="../tela_registrar/registrar.php">Criar conta</a>
    </div>
</main>

<footer id="footer">
    <img src="midia/Line 1.png" alt="" />
    <div class="rodape">
        <img src="midia/Vector.png" alt="logo rodape" />
        <p>Copyright©2024-2030, orleans Company. Todos os direitos reservados.</p>
        <p>política de privacidade</p>
        <p>direito de títulos</p>
    </div>
</footer>

<script src="menu-mobile.js" defer></script>
<script src="voltar-topo.js" defer></script>
</body>
</html>
