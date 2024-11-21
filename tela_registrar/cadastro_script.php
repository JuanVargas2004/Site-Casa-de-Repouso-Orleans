<?php
include "../conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password']; // A senha será hashada depois
    $data = htmlspecialchars($_POST['data']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO pessoas (nome, email, senha, data_nascimento) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $nome, $email, $hashed_password, $data);

        if ($stmt->execute()) {
            $cadastro_sucesso = true;
        } else {
            echo "<p style='color: red;'>Erro: $nome NÃO foi cadastrado.</p>";
            $cadastro_sucesso = false;
        }

        $stmt->close();
    } else {
        echo "<p style='color: red;'>Erro ao preparar a consulta.</p>";
        $cadastro_sucesso = false;
    }

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
    <link rel="stylesheet" href="registrar.css">
    <title>Script Cadastro</title>
</head>

<body>

<script>
    var cadastroConcluido = <?php echo json_encode($cadastro_sucesso); ?>;

    if (cadastroConcluido) {
        alert("Cadastro concluído com sucesso!");
        window.location.href = "../tela_login/tela_login.php";
    }
</script>

</body>
</html>
