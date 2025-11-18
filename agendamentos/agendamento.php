<?php 
require_once '../config/sessao.php';
require_once '../config/config.php';

$base_path = '../';
$meus_agendamentos = is_logged_in() ? get_user_agendamentos($_SESSION['usuario_id']) : [];

include_once '../header.php';
?>

<main>
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Gerenciar Agendamentos</h1>
                <p>Agende consultas, banhos e tosas para os pets</p>
                <a href="criar.php" class="button">Novo Agendamento</a>

                <?php if(isset($_GET['sucesso'])): ?>
                    <div class="sucesso-message">
                        Agendamento Criado com Sucesso!
                    </div>
                <?php endif;?>


                <?php include 'includes/demo_login.php'; ?>
            </div>
        </div>
    </section>

    <section class="info">
        <div class="container">
            <h2>Lista de Agendamentos</h2>
            
            <?php if (empty($meus_agendamentos)): ?>
                <p class="empty-message">
                    <?php echo is_logged_in() ? 'Você não tem agendamentos.' : 'Faça login para ver seus agendamentos.'; ?>
                </p>
            <?php else: ?>
                <div class="agendamentos-lista">
                    <?php foreach ($meus_agendamentos as $agendamento): ?>
                        <?php include 'includes/agendamento_card.php'; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<script>
function editarAgendamento(id) {
    window.location.href = 'editar.php?id=' + id;
}

function excluirAgendamento(id) {
    if (confirm('Tem certeza que deseja excluir este agendamento?')) {
        window.location.href = 'deletar.php?id=' + id;
    }
}
</script>

<?php include_once '../footer.php'; ?>
