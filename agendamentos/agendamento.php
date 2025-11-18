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
                        Agendamento criado com sucesso!
                    </div>
                <?php endif; ?>

                <?php if(isset($_GET['deletado'])): ?>
                    <div class="sucesso-message" style="background: linear-gradient(135deg, #FFEBEE 0%, #FFCDD2 100%); color: #C62828; border-color: #EF5350;">
                        Agendamento deletado com sucesso!
                    </div>
                <?php endif; ?>

                <?php if(isset($_GET['edit'])): ?>
                    <div class="sucesso-message" style="background: linear-gradient(135deg, #00d9ffff 0%, #0059ffff 100%); color: #ffffffff; border-color: #f39e00ff;">
                        Agendamento editado com sucesso!
                    </div>
                <?php endif; ?>

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
    window.location.href = 'deletar.php?id=' + id;
}
</script>

<?php include_once '../footer.php'; ?>
