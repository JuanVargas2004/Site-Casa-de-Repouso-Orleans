<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    function enviar_formulario(){
        if ($_POST['action'] == 'enviar_formulario'){

            $server = "localhost" ;
            $user = "root";
            $pass = "";
            $bd = "orleans";
        
            $conn = mysqli_connect($server, $user, $pass, $bd);
            
            $nome = $_POST['nome'];
            $data = $_POST['data'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $cemail = $_POST['cemail'];
            // $arquivo = $_FILES['curriculo'];


            if ($nome && $data && $tel && $email && $cemail) {

                $sql = "INSERT INTO pedido_estagio (nome, data_nascimento, telefone, email) VALUES ('$nome', '$data', '$tel', '$email')";

                if (mysqli_query($conn, $sql)){
                    return true;
                } else {
                    return "Error: " . mysqli_error($conn);
                }

            }

        }

    }
}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estagio.css">
    <script src="javascript/jquery-3.7.1.min.js"></script>
    <title>Tela de Estágio</title>
</head>
<body>
    
    <div class="menu_container" id="menu_flutuante">

        <label for="fechar"><img src="midia/icone_close.png"></label>

        <nav>
            <ul>
                <li><a href="../tela_quem_somos/quem_somos.html">Quem Somos</a></li>
                <li><a href="../tela_nossa_casa/tela_nossa_casa.html">Nossa Casa</a></li>
                <li><a href="../tela_servicos/tela_servicos.html">Serviços</a></li>
                <li><a href="../tela_contatos/tela_contatos.html">Contato</a></li>
                <li><a href="../tela_login/tela_login.html">Entrar</a></li>
            </ul>
        </nav>

    </div>

    <div id="overlay"></div>


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
                        <li><a href="../tela_login/tela_login.html" class="navitem">Entrar</a></li>
                    </ul>
                </nav>

                <div id="navmobile">
                    <input type="radio" name="hamburguer" id="abrir">
                    <input type="radio" name="hamburguer" id="fechar" checked>
                    <label for="abrir" id="label_hamburguer"><img src="midia/icone-menu.png" id="img_hamburguer"></label>
                </div>

            </div>

        </div>
    </header>

    <main>

        <h1>VENHA FAZER <strong>ESTÁGIO</strong> CONOSCO</h1>

        <form action="" method="post" enctype="multipart/form-data">

            <input type="hidden" name="action" value="enviar_formulario">

            <div id="form">

                <div class="campo">
                    <div><label for="nome">Nome Completo:</label></div> <input type="text" name="nome" id="nome" class="input" required>
                </div>
            


                <div class="campo">
                    <div><label for="data">Data de Nascimento:</label></div> <input type="date" name="data" id="data" class="input" required>
                </div>
            


                <div class="campo">
                    <div><label for="tel">Número de Telefone:</label></div> <input type="text" name="tel" id="tel" class="input" required>
                </div>


            
                <div class="campo">
                    <div><label for="email">Email:</label></div>
                    <input type="email" name="email" id="email" class="input" required>
                </div>


            
                <div class="campo">
                    <div><label for="cemail">Confirmar Email:</label></div>
                    <input type="email" name="cemail" id="cemail" class="input" required>
                </div>

                <div id="confirmar" class="returned_output"></div>


                <div class="campo">
                    <div><label for="curriculo">Anexar Currículo:</label></div>

                    <label for="curriculo">
                        <div class="input" id="tfile">
                            <img src="midia/anexo.png">
                            <span id="desc">Selecione um arquivo PDF...</span>
                        </div>
                    </label>
                    <input type="file" name="curriculo" id="curriculo" class="input" style="display: none;" required>
                </div>

                <div id="file-error"></div>

                <div class="containerM">
                    <div class="containerCheck">
                        <div class="check">
                            <input type="checkbox" name="termos" id="termos" required> Eu li e concordo com os termos de uso.
                        </div>
                        <div class="check">
                            <input type="checkbox" name="receber" id="receber"> Aceito receber noticias via email sobre novidades da Casa de Repouso Orleans.
                        </div>
                    </div>
                </div>


                <input type="submit" value="Concluir" id="button" onclick="return validarFormulario()">

                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        if (enviar_formulario()){
                            echo "<div class='returned_output' id='return_form_true'>Formulário enviado com sucesso!</div>";
                        } else {
                            echo "<div class='returned_output' id='return_form_false'>Formulário não enviado!</div>";
                        }
                    }
                ?>

                
            </div>


        </form>

    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="javascript/menu.js"></script>
    <script src="javascript/main.js"></script>
</body>
</html>