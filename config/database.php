<?php
// config/database.php
$host = 'localhost';
$dbname = 'meu_sistema';
$user = 'root';
$pass = '';

try {
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Dispara exceções em erros
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Retorna dados num array associativo
        PDO::ATTR_EMULATE_PREPARES   => false,                  // Conexão segura: desabilita prepares emulados
    ];

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Salva o erro real em um log no servidor (evita exposição de dados sensíveis na tela)
    error_log("Connection failed: " . $e->getMessage());

    // Retorna mensagem amigável e encerra o fluxo
    die("Ocorreu um erro de comunicação com o sistema. Por favor, tente novamente mais tarde.");
}
