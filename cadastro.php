<?php include 'includes/header.php'; ?>

<div class="auth-form">
    <h2>Criar Conta</h2>
    <p class="subtitle">Cadastre-se para acessar o sistema</p>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert error">
            <?php
            if ($_GET['error'] == 'email_exists') echo 'Este e-mail já está em uso.';
            if ($_GET['error'] == 'system_error') echo 'Erro ao cadastrar. Tente novamente.';
            if ($_GET['error'] == 'empty_fields') echo 'Preencha todos os campos.';
            ?>
        </div>
    <?php endif; ?>

    <form action="auth/register_action.php" method="POST">
        <div class="form-group">
            <label for="name">Nome completo</label>
            <input type="text" id="name" name="name" required autofocus placeholder="Seu Nome">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required placeholder="seu@email.com">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required placeholder="••••••••">
        </div>
        <button type="submit" class="btn">Cadastrar</button>

        <div class="form-link">
            <span>Já tem uma conta?</span>
            <a href="index.php">Faça login</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>