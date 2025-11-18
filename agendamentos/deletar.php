<?php
require_once '../config/sessao.php';

$id = $_GET['id'];
$arquivo_json = '../data/agendamentos.json';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conteudo_json = file_get_contents($arquivo_json);
    $agendamentos = json_decode($conteudo_json, true);

    $novos_agendamentos = [];
    foreach ($agendamentos as $a) {
        if ($a['id'] != $id) {
            $novos_agendamentos[] = $a;
        }
    }

    $novo_conteudo_json = json_encode($novos_agendamentos, JSON_PRETTY_PRINT);

    if (file_put_contents($arquivo_json, $novo_conteudo_json)) {
        header('Location: agendamento.php?deletado=1');
        exit;
    } else {
        echo "Erro ao deletar agendamento.";
    }
}

$conteudo_json = file_get_contents($arquivo_json);
$agendamentos = json_decode($conteudo_json, true);

$agendamento = null;
foreach ($agendamentos as $a) {
    if ($a['id'] == $id) {
        $agendamento = $a;
        break;
    }
}

$base_path = '../';
include_once '../header.php';
?>

<main>
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Confirmar Exclusão</h1>
                <p>Tem certeza que deseja deletar este agendamento?</p>
            </div>
        </div>
    </section>

    <section class="info">
        <div class="container">
            <div class="delete-confirmation">
                <div class="agendamento-details">
                    <h3>Detalhes do Agendamento</h3>
                    <p><strong>Pet:</strong> <?php echo $agendamento['pet_nome']; ?></p>
                    <p><strong>Serviço:</strong> <?php echo $agendamento['servico']; ?></p>
                    <p><strong>Data:</strong> <?php echo $agendamento['data']; ?></p>
                    <p><strong>Horário:</strong> <?php echo $agendamento['horario']; ?></p>
                    <p><strong>Status:</strong> <?php echo $agendamento['status']; ?></p>
                </div>

                <form method="POST" class="delete-form">
                    <div class="form-actions">
                        <button type="submit" class="button button-danger">Confirmar Exclusão</button>
                        <a href="agendamento.php" class="button button-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include_once '../footer.php'; ?>
