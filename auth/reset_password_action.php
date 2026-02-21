<?php
session_start();
require '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $password = $_POST['password'];

    if (empty($token) || empty($password)) {
        header('Location: ../redefinir_senha.php?error=invalid_token');
        exit;
    }

    $stmt = $pdo->prepare("SELECT id FROM users WHERE reset_token = :token AND reset_token_expiry > NOW()");
    $stmt->execute(['token' => $token]);
    $user = $stmt->fetch();

    if ($user) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = :password, reset_token = NULL, reset_token_expiry = NULL WHERE id = :id");

        if ($stmt->execute(['password' => $hash, 'id' => $user['id']])) {
            header('Location: ../index.php?success=password_reset');
            exit;
        } else {
            header('Location: ../redefinir_senha.php?token=' . urlencode($token) . '&error=system_error');
            exit;
        }
    } else {
        header('Location: ../redefinir_senha.php?error=invalid_token');
        exit;
    }
}
