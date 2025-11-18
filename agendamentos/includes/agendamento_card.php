<div class="agendamento-card">
    <div class="card-header">
        <h3><?php echo sanitize_output($agendamento['pet_nome']); ?></h3>
        <span class="status status-<?php echo strtolower($agendamento['status']); ?>">
            <?php echo sanitize_output($agendamento['status']); ?>
        </span>
    </div>
    <div class="card-body">
        <p><strong>Serviço:</strong> <?php echo sanitize_output($agendamento['servico']); ?></p>
        <p><strong>Data:</strong> <?php echo format_date($agendamento['data']); ?></p>
        <p><strong>Horário:</strong> <?php echo sanitize_output($agendamento['horario']); ?></p>
    </div>
    <div class="card-footer">
        <button class="btn-editar" onclick="editarAgendamento(<?php echo $agendamento['id']; ?>)">
            Editar
        </button>
        <button class="btn-excluir" onclick="excluirAgendamento(<?php echo $agendamento['id']; ?>)">
            Excluir
        </button>
    </div>
</div>
