<?php
session_start();
require '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // Verifica se usuário existe
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $stmt = $pdo->prepare("UPDATE users SET reset_token = :token, reset_token_expiry = :expiry WHERE id = :id");
        $stmt->execute(['token' => $token, 'expiry' => $expiry, 'id' => $user['id']]);

        // Na prática, você enviaria um e-mail com mail() ou PHPMailer.
        // Simularemos o envio imprimindo num arquivo de log ou demonstrando o link
        file_put_contents('../reset_link_debug.txt', "Acesse: http://{$_SERVER['HTTP_HOST']}/redefinir_senha.php?token={$token}");
    }

    // Por segurança sempre mostrar a mesma mensagem
    header('Location: ../esqueci_senha.php?msg=sent');
    exit;
}
