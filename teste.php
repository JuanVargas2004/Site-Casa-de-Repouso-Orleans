<?php
// Função que retorna a URL de destino
function printarNome() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        echo "Nome enviado: " . $nome;  // Imprime o nome recebido
        return;
    }
}

// Processa o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    printarNome();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Dinâmico</title>
</head>
<body>
    <h1>Formulário com Action Dinâmica</h1>

    <form action="<?= printarNome(); ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>