<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="shortcut icon" href="../logo.ico/favicon-16x16.png" type="image/x-icon">

  <link rel="stylesheet" href="registrar.css">
  <title>registrar</title>

</head>

<body>

  <header id="header">
    <div class="container">
      <div class="flex">
        <a href="../tela_inicial/tela_inicial.html" class="a_home"><img src="midia/logo.png" alt="imagem de arvore da logo" id="logo" /></a>

        <nav class="menu_nav">
          <ul>
            </li>
            <li>
              <a class="active" href="../tela_nossa_casa/tela_nossa_casa.html">Nossa casa</a>
            </li>
            <li><a class="active" href="#">Serviços</a></li>
            <li><a class="active" href="../tela_contatos/tela_contatos.html">Contato</a></li>
            <li><a class="active" href="../tela_login/tela_login.php">Login</a></li>
            <div id="maker"></div>
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
          <li><a href="../tela_login/tela_login.html">Login</a></li>
        </ul>
      </nav>
    </div>
    <div class="overlay-menu" id="overlay-menu"></div>
  </header>





  <div class="formulario">
    <h1 class="tittle-forms"><span>CRIAR</span> UMA CONTA</h1>

    <form action="cadastro_script.php" method="POST">

      <div class="campo">
        <label for="name">Nome Completo:</label>
        <input type="text" id="name" name="nome">
      </div>

      <div class="campo">
        <label for="date">Data de nascimento:</label>
        <input type="date" id="data" name="data">
      </div>

      <div class="campo">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email">
      </div>

      <div class="campo">
        <label for="email-confirm">Confirme seu e-mail:</label>
        <input type="email" id="email_confirm" name="email_confirm" pattern="[a-z0-9._%+-]+@example.com" required>
      </div>

      <div id="email-confirm-message"></div>

      <div class="campo">
        <label for="password">Crie uma senha:</label>
        <input type="password" id="password" name="password">
      </div>

      <div class="campo">
        <label for="password-confirm">Confirme a senha:</label>
        <input type="password" id="password_confirm" name="password_confirm">
      </div>

      <div id="password-confirm-message"></div>

      <div class="checkbox-container">
        <input type="checkbox" id="checkbox" required>
        <label for="checkbox"> Eu li e concordo com os <a href="https://vidafullstack.com.br/termos-de-uso/" target=”_blank”>termos de uso.</a></label>
        <br>
        <input type="checkbox" id="checkbox" required>
        <label for="checkbox"> Aceito receber noticias via email sobre novidades da Casa de Repouso Orleans. </label>
      </div>
      <input type="submit" id="submit" value="CONCLUIR">
    </form>
  </div>






  <footer id="footer">
    <img src="midia/Line 1.png" alt="" />
    <div class="rodape">
      <img src="midia/Vector.png" alt="logo rodape" />
      <p>
        Copyright©2024-2030, orleans Company. Todos os direitos reservados.
      </p>
      <p>política de privacidade</p>
      <p>direito de titulos</p>
    </div>
  </footer>
</body>

<script src="registrar.js"></script>
<script src="js/validar-email.js"></script>
<script src="menu-mobile.js"></script>
</html>