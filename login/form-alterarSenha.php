<?php
    if(empty($_SESSION["usuario_id"])) {
        header("Location: ../");
    }
?>

<main class="main-login">
    <section class="info">
        <div class="container">
            <h2>Alterar Senha</h2>
            <?php include_once 'msg.php'; ?>
            <form action="acoes-usuarios.php" method="POST"  class="form-agendamento">
                <div class="form-group">
                    <label for="senhaAtual">Senha Atual</label>
                    <input type="password" name="senhaAtual" required>
                </div>
                <div class="form-group">
                    <label for="senhaNova">Nova senha</label>
                    <input type="password" name="senhaNova" required>
                </div>
                <div class="form-group">
                    <label for="senhaNovaConfirm">Confirmar nova Senha</label>
                    <input type="password" name="senhaNovaConfirm" required>
                </div>
                <div class="form-actions">
                    <button type="submit" name="alterarSenha"  class="button">Alterar</button>
                </div>
            </form>
        </div>
    </section>
</main>