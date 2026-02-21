<?php
session_start();
require '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header('Location: ../index.php?error=empty_fields');
        exit;
    }

    $stmt = $pdo->prepare("SELECT id, name, password FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Sucesso no login
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('Location: ../dashboard.php');
        exit;
    } else {
        // Falha no login
        header('Location: ../index.php?error=invalid_credentials');
        exit;
    }
} else {
    header('Location: ../index.php');
    exit;
}
