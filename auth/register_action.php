<?php
session_start();
require '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        header('Location: ../cadastro.php?error=empty_fields');
        exit;
    }

    // Verificar se email já existe
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    if ($stmt->fetch()) {
        header('Location: ../cadastro.php?error=email_exists');
        exit;
    }

    // Hasheando a senha para segurança
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Inserindo no banco
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    if ($stmt->execute(['name' => $name, 'email' => $email, 'password' => $hash])) {
        header('Location: ../index.php?success=registered');
        exit;
    } else {
        header('Location: ../cadastro.php?error=system_error');
        exit;
    }
} else {
    header('Location: ../cadastro.php');
    exit;
}
