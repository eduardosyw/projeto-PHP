<?php
require_once '../config/sessao.php';
require_once '../config/config.php';

if (!is_logged_in()) {
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
                <h1>Criar Novo Agendamento</h1>
                <p>Preencha o formulário abaixo para agendar um serviço para seu pet.</p>
            </div>
        </div>
    </section>

    <section class="info">
        <div class="container">
            <form method="POST" action="salvar.php" class="form-agendamento">
                <div class="form-group">
                    <label for="pet_nome">Nome do Pet:</label>
                    <input type="text" id="pet_nome" name="pet_nome" required>
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
                    <input type="date" id="data" name="data" required>
                </div>
                <div class="form-group">
                    <label for="horario">Horário:</label>
                    <input type="time" id="horario" name="horario" required>
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