<?php include 'includes/header.php'; ?>

<div class="auth-form">
    <h2>Recuperar Senha</h2>
    <p class="subtitle">Informe seu e-mail para receber o link de redefinição</p>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert success">
            <?php if ($_GET['msg'] == 'sent') echo 'Se o e-mail existir, você receberá um link de recuperação (simulado).'; ?>
        </div>
    <?php endif; ?>

    <form action="auth/forgot_password_action.php" method="POST">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required autofocus placeholder="seu@email.com">
        </div>
        <button type="submit" class="btn">Enviar link de recuperação</button>

        <div class="form-link">
            <a href="index.php">Voltar ao login</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>