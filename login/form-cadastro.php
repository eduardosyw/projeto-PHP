<main class="main-login">
    <section class="info">
        <div class="container">
            <h2>Cadastrar-se</h2>
            <?php include_once 'msg.php'; ?>
            <form action="acoes-usuarios.php" method="POST"  class="form-agendamento">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" required>
                </div>
                <div class="form-actions">
                    <button type="submit" name="criar"  class="button">Cadastrar</button>
                </div>
                <div class="form-actions">
                    <a href="./" class="link-login">Login</a>
                </div>
            </form>
        </div>
    </section>
</main>