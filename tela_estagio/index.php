<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'] ?? '';
    $data = $_POST['data'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $email = $_POST['email'] ?? '';
    $cemail = $_POST['cemail'] ?? '';
    

    if ($nome && $data && $tel && $email && $cemail) {
        echo "<h2>Dados recebidos:</h2>";
        echo "Nome: $nome<br>";
        echo "Data de Nascimento: $data<br>";
        echo "Telefone: $tel<br>";
        echo "Email: $email<br>";
        echo "Confirmar Email: $cemail<br>";
    } else {
        echo "<h2>Por favor, preencha todos os campos.</h2>";
    }
} else {
    echo "<h2>Requisição inválida.</h2>";
}
?>
