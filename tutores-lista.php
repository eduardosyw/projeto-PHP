<?php

$arquivo_json = "data/tutores.json";

$tutores = json_decode(file_get_contents($arquivo_json), true);

$base_path = '';
include_once 'header.php';
?>

<main>
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Lista de Tutores</h1>
                <p>Gerencie os tutores cadastrados.</p>
            </div>
        </div>
    </section>

    <section class="info">
        <div class="container">
            <div class="agendamentos-lista">
                <?php foreach ($tutores as $tutor): ?>
                    <div class="agendamento-card">
                        <div class="card-header">
                            <h3><?= $tutor['nome'] ?></h3>
                        </div>
                        <div class="card-body">
                            <p><strong>CPF:</strong> <?= $tutor['cpf'] ?></p>
                            <p><strong>Telefone:</strong> <?= $tutor['telefone'] ?></p>
                            <p><strong>Endereço:</strong> <?= $tutor['endereco'] ?></p>
                        </div>
                        <div class="card-footer">
                            <button onclick="window.location.href='tutores-editar-form.php?id=<?= $tutor['id'] ?>'"
                                class="btn-editar">Editar</button>
                            <button
                                onclick="if(confirm('Tem certeza que deseja excluir?')) window.location.href='tutores-excluir.php?id=<?= $tutor['id'] ?>'"
                                class="btn-excluir">Excluir</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include_once 'footer.php'; ?>