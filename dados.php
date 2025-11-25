<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login/?pg=form-login');
    exit;
}

$arquivo_json = "data/tutores.json";
$meu_tutor = null;

if (file_exists($arquivo_json)) {
    $tutores = json_decode(file_get_contents($arquivo_json), true);
    if (is_array($tutores)) {
        foreach ($tutores as $tutor) {
            if (isset($tutor['usuario_id']) && $tutor['usuario_id'] == $_SESSION['usuario_id']) {
                $meu_tutor = $tutor;
                break;
            }
        }
    }
}

$base_path = '';
include_once 'header.php';
?>

<main>
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Meus Dados</h1>
                <p>Gerencie suas informações de cadastro.</p>
            </div>
        </div>
    </section>

    <section class="info">
        <div class="container">
            <?php if ($meu_tutor): ?>
                <div class="agendamento-details" style="max-width: 600px; margin: 0 auto;">
                    <h3>Informações do Tutor</h3>
                    <div class="card-body">
                        <p><strong>Nome:</strong> <?= htmlspecialchars($meu_tutor['nome']) ?></p>
                        <p><strong>CPF:</strong> <?= htmlspecialchars($meu_tutor['cpf']) ?></p>
                        <p><strong>Telefone:</strong> <?= htmlspecialchars($meu_tutor['telefone']) ?></p>
                        <p><strong>Endereço:</strong> <?= htmlspecialchars($meu_tutor['endereco']) ?></p>
                    </div>
                    <div class="card-footer" style="justify-content: center; margin-top: 20px;">
                        <button onclick="window.location.href='tutores-editar-form.php?id=<?= $meu_tutor['id'] ?>'"
                            class="button">Editar Meus Dados</button>
                    </div>
                </div>
            <?php else: ?>
                <div class="empty-message">
                    <p>Você ainda não completou seu cadastro de tutor.</p>
                    <a href="tutores-cadastro-form.php" class="button"
                        style="margin-top: 15px; display: inline-block;">Completar Cadastro</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include_once 'footer.php'; ?>