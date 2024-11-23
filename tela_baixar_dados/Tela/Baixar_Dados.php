<?php
require('fpdf/fpdf.php'); // Inclua o arquivo da biblioteca FPDF

// Configurações do banco de dados
$host = '127.0.0.1';
$db = 'orleans';
$user = 'root';
$password = '';
$charset = 'utf8mb4';

// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Função para buscar informações do cliente
function buscarInformacoes($pdo, $email) {
    $stmt = $pdo->prepare("SELECT nome, email, data_nascimento FROM pessoas WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Verifique se o email foi enviado
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $dados = buscarInformacoes($pdo, $email);

    if ($dados) {
        // Criando o PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Título
        $pdf->Cell(0, 10, 'Informacoes do Cliente', 0, 1, 'C');
        $pdf->Ln(10);

        // Dados do cliente
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'Nome:', 0, 0);
        $pdf->Cell(0, 10, $dados['nome'], 0, 1);

        $pdf->Cell(50, 10, 'Email:', 0, 0);
        $pdf->Cell(0, 10, $dados['email'], 0, 1);

        $pdf->Cell(50, 10, 'Data de Nascimento:', 0, 0);
        $pdf->Cell(0, 10, $dados['data_nascimento'], 0, 1);

        // Gera o PDF para download
        $pdf->Output('D', 'informacoes_cliente.pdf');
    } else {
        echo "Nenhum cliente encontrado com este email.";
    }
} else {
    echo "Por favor, envie um email válido.";
}
