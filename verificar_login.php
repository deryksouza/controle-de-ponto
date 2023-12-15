<?php
session_start();
ob_start();
ini_set('display_errors', 1);

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Informações do banco de dados
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registros";

    try {
        $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $username, $password);
        echo "Conexão com banco de dados realizada com sucesso!";
    } catch (PDOException $err) {
        die("Erro: Conexão com banco de dados não realizada com sucesso. Erro gerado " . $err->getMessage());
    }

    // Consulta SQL para verificar as credenciais do usuário
    $sql = "SELECT * FROM cadastro WHERE nome='$nome' AND senha='$senha'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Erro SQL: " . $conn->error);
    }

    if ($result->rowCount() > 0) {
        // Login bem-sucedido
        $_SESSION['nome'] = $nome;
        header("Location: index.php"); // Substitua 'index.php' pelo nome da sua página após o login
        exit();
    } else {
        // Login falhou
        $_SESSION['msg'] = "<p style='color: red;'>Nome de usuário ou senha incorretos.</p>";
        header("Location: telalogin.php"); // Redireciona para a página de login
        exit();
    }

    // Não se esqueça de fechar a conexão no final do script
    $conn = null;
}
?>