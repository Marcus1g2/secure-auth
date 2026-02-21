<?php
require 'includes/check_auth.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            align-items: flex-start;
            padding-top: 50px;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
            <a href="auth/logout_action.php" class="btn-danger">Sair</a>
        </div>
        <div class="dashboard-content">
            <p>Este é o seu painel de controle restrito.</p>
            <p>Você pode adicionar mais funcionalidades aqui no futuro.</p>
        </div>
    </div>
</body>

</html>