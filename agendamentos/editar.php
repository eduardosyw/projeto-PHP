<?php
require_once '../config/sessao.php';
require_once '../config/config.php';

if (!is_logged_in()) {
    header('Location: agendamento.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: agendamento.php');
    exit;
}

$id = $_GET['id'];
$arquivo_json = '../data/agendamentos.json';
$conteudo_json = file_get_contents($arquivo_json);
$agendamentos = json_decode($conteudo_json, true);

$agendamento = null;
foreach ($agendamentos as $a) {
    if ($a['id'] == $id) {
        $agendamento = $a;
        break;
    }
}

if (!$agendamento) {
    header('Location: agendamento.php');
    exit;
}

$base_path = '../';
include_once '../header.php';

?>

<main>
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Editar Agendamento</h1>
                <p>Preencha o formulário abaixo para atualizar o agendamento do seu pet.</p>
            </div>
        </div>
    </section>

    <section class="info">
        <div class="container">
            <form method="POST" action="salvarEdit.php" class="form-agendamento">
                <input type="hidden" name="id" value="<?php echo $agendamento['id']; ?>">
                <div class="form-group">
                    <label for="pet_nome">Nome do Pet:</label>
                    <input type="text" id="pet_nome" name="pet_nome" value="<?php echo $agendamento['pet_nome']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="servico">Serviço:</label>
                    <select id="servico" name="servico" required>
                        <option value="">Selecione um serviço</option>
                        <option value="Banho e Tosa">Banho e Tosa</option>
                        <option value="Consulta Veterinária">Consulta Veterinária</option>
                        <option value="Vacinação">Vacinação</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="data">Data:</label>
                    <input type="date" id="data" name="data" value="<?php echo $agendamento['data']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="horario">Horário:</label>
                    <input type="time" id="horario" name="horario" value="<?php echo $agendamento['horario']; ?>" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="button">Salvar Agendamento</button>
                    <a href="agendamento.php" class="button button-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </section>
</main>

<?php include_once '../footer.php'; ?>