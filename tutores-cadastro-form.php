<?php

$arquivo = "data/tutores.json";
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login/?pg=form-login');
    exit;
}
$base_path = '';
include_once 'header.php';
?>

<main>
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Cadastro de Tutor</h1>
                <p>Preencha seus dados para continuar.</p>
            </div>
        </div>
    </section>

    <section class="info">
        <div class="container">
            <form method="post" action="tutores-cadastro.php" class="form-agendamento">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="nome" required>
                </div>

                <div class="form-group">
                    <label>CPF</label>
                    <input type="text" name="cpf" required>
                </div>

                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" required>
                </div>

                <div class="form-group">
                    <label>Endereço Completo</label>
                    <input type="text" name="endereco" required>
                </div>

                <div class="form-actions">
                    <input type="submit" value="Cadastrar Tutor" class="button">
                </div>
            </form>
        </div>
    </section>
</main>

<?php include_once 'footer.php'; ?>