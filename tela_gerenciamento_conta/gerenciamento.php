<?php
session_start();
include "../conexao.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../tela_login/tela_login.php");
    exit;
}
?>



<?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        function form_pessoal_desktop(){

            if ($_POST['action'] == 'enviar_form_pessoal'){

                $user_id = $_SESSION['user_id'];
                $nome = $_POST['nome'];
                $email = $_POST['personal_email'];
                $nascimento = $_POST['nascimento'];
                $password = $_POST['password'];

                global $conn;

                try{
                    if (!empty($nome)){
                        $sql = "UPDATE pessoas SET nome = ? WHERE cod_pessoa = ?";
                        $smt = $conn->prepare($sql);
                        $smt->bind_param("si", $nome, $user_id);
                        $smt->execute();
                    }

                    if (!empty($nascimento)){
                        $sql = "UPDATE pessoas SET data_nascimento = ? WHERE cod_pessoa = ?";
                        $smt = $conn->prepare($sql);
                        $smt->bind_param("si", $nascimento, $user_id);
                        $smt->execute();
                    }

                    if (!empty($password)){
                        $senha_hash = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "UPDATE pessoas SET senha = ? WHERE cod_pessoa = ?";
                        $smt = $conn->prepare($sql);
                        $smt->bind_param("si", $senha_hash, $user_id);
                        $smt->execute();
                    }

                    if (!empty($email)){

                        $sql = "SELECT cod_pessoa FROM pessoas WHERE email = ?";
                        $smt = $conn->prepare($sql);
                        $smt->bind_param("s", $email);
                        $smt->execute();
                        $result = $smt->get_result();

                        if ($result->num_rows > 0){
                            return "Este email já está em uso";
                        }


                        $sql = "UPDATE pessoas SET email = ? WHERE cod_pessoa = ?";
                        $smt = $conn->prepare($sql);
                        $smt->bind_param("si", $email, $user_id);
                        if ($smt->execute()) {
                            $_SESSION['email'] = $email;
                        }
                    }

                    $smt->close();
                    $conn->close();
                    return true;

                } catch (Exception $e){
                    return "Erro ao atualizar dados pessoais: ";
                }

            }
        }

        function form_pessoal_mobile(){
            if ($_POST['action'] == 'enviar_form_pessoal_mobile'){

                $user_id = $_SESSION['user_id'];
                $nome = $_POST['nome_mobile'];
                $email = $_POST['personal_email_mobile'];
                $nascimento = $_POST['nascimento_mobile'];
                $password = $_POST['password_mobile'];

                global $conn;

                try{
                    if (!empty($nome)){
                        $sql = "UPDATE pessoas SET nome = ? WHERE cod_pessoa = ?";
                        $smt = $conn->prepare($sql);
                        $smt->bind_param("si", $nome, $user_id);
                        $smt->execute();
                    }

                    if (!empty($nascimento)){
                        $sql = "UPDATE pessoas SET data_nascimento = ? WHERE cod_pessoa = ?";
                        $smt = $conn->prepare($sql);
                        $smt->bind_param("si", $nascimento, $user_id);
                        $smt->execute();
                    }

                    if (!empty($password)){
                        $senha_hash = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "UPDATE pessoas SET senha = ? WHERE cod_pessoa = ?";
                        $smt = $conn->prepare($sql);
                        $smt->bind_param("si", $senha_hash, $user_id);
                        $smt->execute();
                    }

                    if (!empty($email)){


                        $sql = "SELECT cod_pessoa FROM pessoas WHERE email = ?";
                        $smt = $conn->prepare($sql);
                        $smt->bind_param("s", $email);
                        $smt->execute();
                        $result = $smt->get_result();

                        if ($result->num_rows > 0){
                            return "Este email já está em uso";
                        }

                        $sql = "UPDATE pessoas SET email = ? WHERE cod_pessoa = ?";
                        $smt = $conn->prepare($sql);
                        $smt->bind_param("si", $email, $user_id);
                        if ($smt->execute()) {
                            $_SESSION['email'] = $email;
                        }
                    }

                    $smt->close();
                    $conn->close();
                    return true;

                } catch (Exception $e){
                    return "Erro ao atualizar dados pessoais: ";
                }

            }
        }
    
        function form_delete(){

            if ($_POST['action'] == 'enviar_form_delete'){
                
                $user_id = $_SESSION['user_id'];
                $email = $_POST['delete_email'];
                $password = $_POST['password'];

                global $conn;

                if (!empty($email) && !empty($password)){

                    $sql = "SELECT email, senha FROM pessoas WHERE cod_pessoa = ?";
                    $smt = $conn->prepare($sql);
                    $smt->bind_param("i", $user_id);
                    $smt->execute();
                    $result = $smt->get_result();

                    if ($result->num_rows > 0){

                        $row = $result->fetch_assoc(); // Gera uma linha única que é o usuário

                        if ($row['email'] == $email && password_verify($password, $row['senha'])){


                            $sql = "DELETE FROM pessoas WHERE cod_pessoa = ?";
                            $smt = $conn->prepare($sql);
                            $smt->bind_param("i", $user_id);
                            $smt->execute();
                            return true;

                        } else {

                            return "Credenciais inválidas";

                        }


                    } else {
                        return "Credenciais inválidas";
                    }

                } else {
                    return "Preencha todos os campos";
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
    <link rel="stylesheet" href="gerenciamento.css">
    <title>Gerenciamento</title>
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
                <li><a href="../tela_login/tela_login.php">Entrar</a></li>
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
                        <li><a href="../tela_login/tela_login.php" class="navitem"><img src="midia/manager.png" id="manager"></a></li>
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
        <div class="container" id="title">
            <img src="midia/seta-voltar.png" alt="Seta para voltar" id="seta_voltar" onclick="window.history.back()">
            <div>
                <h1>Gerenciamento de Conta</h1>
                <p>Lembre-se: Mantenha os seus dados atualizados e permita que toda a comunicação que se faz necessária chegue até você.</p>
            </div>
        </div>

<!-- FORM PESSOAL PARA DESKTOP -->
        <form action="" method="post" id="pessoal_desktop">
            <input type="hidden" name="action" value="enviar_form_pessoal">

            <h2 class="title_form">Alterar Dados Pessoais:</h2>

            
            <div class="form-container">
                <input class="input_form" type="text" name="nome" id="nome" placeholder="NOME">

                <input class="input_form" type="email" name="personal_email" id="personal_email" placeholder="E-MAIL">

                <input class="input_form" type="text" name="nascimento" id="nascimento" placeholder="DATA DE NASCIMENTO" onfocus="(this.type='date')" onblur="if (!this.value) this.type='text'">
                
            </div>

            <div class="form-container">
                <input class="input_form" type="password" name="password" id="password" placeholder="SENHA">
            </div>

            <input type="submit" value="ENVIAR ALTERAÇÕES" class="submit_form">

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){

                    $returned_message = form_pessoal_desktop();

                    if ($returned_message === true){
                        echo "<div class='returned_output return_personal_true'>Dados atualizados com sucesso!</div>";
                    } else {
                        echo "<div class='returned_output return_personal_false'>$returned_message</div>";
                    }
                }
            ?>

        </form>




<!-- FORM PESSOAL PARA MOBILE -->
        <form action="" method="post" id="pessoal_mobile">
            <input type="hidden" name="action" value="enviar_form_pessoal_mobile">

            <h2 class="title_form">Alterar Dados Pessoais:</h2>

            
            <div class="form-container">
                <input class="input_form" type="text" name="nome_mobile" id="nome_mobile" placeholder="NOME">

                <input class="input_form" type="email" name="personal_email_mobile" id="personal_email_mobile" placeholder="E-MAIL">
            </div>
            
            <div class="form-container">
                <input class="input_form" type="text" name="nascimento_mobile" id="nascimento_mobile" placeholder="DATA DE NASCIMENTO" onfocus="(this.type='date')" onblur="if (!this.value) this.type='text'">
                
                <input class="input_form" type="password" name="password_mobile" id="password_mobile" placeholder="SENHA">

            </div>
            

            <input type="submit" value="ENVIAR ALTERAÇÕES" class="submit_form">


            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){

                    $returned_message = form_pessoal_mobile();

                    if ($returned_message === true){
                        echo "<div class='returned_output return_personal_true'>Dados atualizados com sucesso!</div>";
                    } else {
                        echo "<div class='returned_output return_personal_false'>$returned_message</div>";
                    }
                }
            ?>

        </form>


<!-- FORM LOGIN -->


<!-- FORM DELETE -->
        <label for="open_overdelete" class="label_delete">
            <div class="submit_form">EXCLUIR CONTA</div>
        </label>
        
        <div id="delete_confirm">
            <input type="radio" name="delete_account" id="close_overdelete" checked>
            <input type="radio" name="delete_account" id="open_overdelete">
        </div>

        <div id="overdelete">

            <section>
                
                <h2>Você tem certeza?!</h2>
                <h3>Para continuar o processo de exclusão da conta, preencha corretamente os campos abaixo:</h3>

                <form action="" method="post">
                    <input type="hidden" name="action" value="enviar_form_delete">

                    <class class="flex-column">
                        <input class="input_form" type="email" name="delete_email" id="delete_email" placeholder="E-MAIL">
                        <input class="input_form" type="password" name="password" id="password" placeholder="SENHA">
                    </class>

                    
                    <div id="over_buttons">
                        <label for="close_overdelete" id="fechar_overdelete">
                            <div>CANCELAR</div>
                        </label>
                        
                        <input type="submit" value="ENVIAR ALTERAÇÕES">

                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                $returned_message = form_delete();

                                if ($_POST['action'] == 'enviar_form_delete') {  // Adiciona verificação da ação
                                    if ($returned_message === true){
                                        session_destroy();
                                        echo "<script>alert('Conta apagada com sucesso!');</script>";
                                        echo "<script>window.location.href='../tela_login/tela_login.php';</script>";
                                    } else {
                                        echo "<script>alert('$returned_message');</script>";
                                    }
                                }
                            }
                        ?>

                    </div>
                    
                </form>

            </section>

        </div>

    </main>

    
    <script src="javascript/confirm.js"></script>
    <script src="javascript/menu.js"></script>
    <script src="javascript/main.js"></script>
    <script src="javascript/input_file.js"></script>
    <script src="javascript/form_switch.js"></script>
</body>
</html>