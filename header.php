<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev. Web - Unipê</title>
    <link rel="stylesheet" href="<?php echo $base_path ?? ''; ?>styles.css">
</head>

<body>
    <header>
        <div class="esquerda">
            <a href="<?php echo $base_path ?? ''; ?>index.php">Pet Club</a>
        </div>
        <div class="direita">
            <nav>
                <ul>
                    <li><a href="<?php echo $base_path ?? ''; ?>agendamentos/agendamento.php">Agendamentos</a></li>
                    <li><a href="<?= $base_path; ?>quemsomos.php">Quem Somos</a></li>
                    <li><a href="<?= $base_path; ?>contato.php">Contato</a></li>
                    <?php if (empty($_SESSION['usuario_id'])) { ?>
                        <li><a href="<?= $base_path; ?>login/">Login</a></li>
                    <?php } else { ?>
                        <li><a href="<?= $base_path; ?>dados.php">Meus Dados</a></li>
                        <li><a href="<?= $base_path; ?>login/logout.php">Sair</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>