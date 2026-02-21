<?php include 'includes/header.php'; ?>

<div class="auth-form">
    <h2>Bem-vindo de volta</h2>
    <p class="subtitle">Faça login na sua conta</p>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert error">
            <?php
            if ($_GET['error'] == 'invalid_credentials') echo 'E-mail ou senha incorretos.';
            if ($_GET['error'] == 'auth_required') echo 'Você precisa fazer login primeiro.';
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['success'])): ?>
        <div class="alert success">
            <?php
            if ($_GET['success'] == 'registered') echo 'Cadastro realizado com sucesso! Faça login.';
            if ($_GET['success'] == 'password_reset') echo 'Senha redefinida com sucesso.';
            if ($_GET['success'] == 'logout') echo 'Você saiu do sistema.';
            ?>
        </div>
    <?php endif; ?>

    <form action="auth/login_action.php" method="POST">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required autofocus placeholder="seu@email.com">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required placeholder="••••••••">
        </div>
        <button type="submit" class="btn">Entrar</button>

        <div class="form-link">
            <a href="cadastro.php">Criar conta</a>
            <a href="esqueci_senha.php">Esqueceu a senha?</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>