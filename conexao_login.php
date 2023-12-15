<?php
session_start();

// Informações do banco de dados
$host = "localhost";
$username = "root";
$password = "";
$dbname = "registros";
$port = 3306;

// Conectar ao banco de dados
$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Processar o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome']; 
    $senha = $_POST['senha'];

    // Consulta SQL para verificar as credenciais do usuário
    $sql = "SELECT * FROM cadastro WHERE Nome='$nome'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Erro SQL: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['Senha'] == $senha) { // Se a senha não estiver hashada no banco
            // Login bem-sucedido
            $_SESSION['nome'] = $nome;
            header("Location: index.php");
            exit();
        }
    }

    // Login falhou
    $_SESSION['msg'] = "Nome de usuário ou senha incorretos.";
    header("Location: tela_login.php"); // Redirecione para a tela de login
    exit();
}

$conn->close()