<?php include 'includes/header.php'; ?>

<div class="auth-form">
    <h2>Nova Senha</h2>
    <p class="subtitle">Crie uma nova senha para sua conta</p>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert error">
            <?php
            if ($_GET['error'] == 'invalid_token') echo 'Token inválido ou expirado.';
            if ($_GET['error'] == 'system_error') echo 'Erro ao redefinir a senha.';
            ?>
        </div>
    <?php endif; ?>

    <form action="auth/reset_password_action.php" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
        <div class="form-group">
            <label for="password">Nova Senha</label>
            <input type="password" id="password" name="password" required autofocus placeholder="••••••••">
        </div>
        <button type="submit" class="btn">Redefinir Senha</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>