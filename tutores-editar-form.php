<?php

$id = $_GET['id'];

$tutores = json_decode(file_get_contents("data/tutores.json"), true);

$tutor_atual = null;
foreach ($tutores as $t) {
    if ($t['id'] == $id) {
        $tutor_atual = $t;
        break;
    }
}

$base_path = '';
include_once 'header.php';
?>

<main>
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Editar Tutor</h1>
                <p>Atualize os dados do tutor.</p>
            </div>
        </div>
    </section>

    <section class="info">
        <div class="container">
            <form method="post" action="tutores-editar.php" class="form-agendamento">
                <input type="hidden" name="id" value="<?= $tutor_atual['id'] ?>">

                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?= $tutor_atual['nome'] ?? '' ?>" required>
                </div>

                <div class="form-group">
                    <label>CPF</label>
                    <input type="text" name="cpf" value="<?= $tutor_atual['cpf'] ?? '' ?>" required>
                </div>

                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="<?= $tutor_atual['telefone'] ?? '' ?>" required>
                </div>

                <div class="form-group">
                    <label>Endereço Completo</label>
                    <input type="text" name="endereco" value="<?= $tutor_atual['endereco'] ?? '' ?>" required>
                </div>

                <div class="form-actions">
                    <input type="submit" value="Salvar Alterações" class="button">
                    <a href="dados.php" class="button-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </section>
</main>

<?php include_once 'footer.php'; ?>