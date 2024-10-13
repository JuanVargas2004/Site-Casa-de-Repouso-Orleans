<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $cemail = $_POST['cemail'];
    $arquivo = $_FILES['curriculo'];
    
    if (isset($arquivo) && $arquivo['error'] == 0){
        echo "<h2>Arquivo recebido:</h2><p>{$arquivo['name']}</p>";

        $destino = "uploads/" . $arquivo['name'];

        if (move_uploaded_file($arquivo['tmp_name'], $destino)){
            echo "<p>Arquivo salvo com sucesso em: {$destino}</p>";
        } else {
            echo "<p>Erro ao salvar o arquivo.</p>";
        }
    } else {
        echo "<h2>Nenhum arquivo recebido.</h2>";
    }


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
