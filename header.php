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
            <a href="<?php echo $base_path ?? ''; ?>index.php">Pet Shop</a>
        </div>
        <div class="direita">
            <nav>
                <ul>
                    <li><a href="<?php echo $base_path ?? ''; ?>agendamentos/agendamento.php">Agendamentos</a></li>
                    <li><a href="quemsomos.php">Quem Somos</a></li>
                    <li><a href="#">Contato</a></li>
                    <li>
                        <?php if (empty($_SESSION['usuario_id'])) { ?>
                            <a href="<?= $base_path; ?>login/">Login</a>
                        <?php } else { ?>
                            <a href="<?= $base_path; ?>dados.php">Meus Dados</a>
                            <a href="<?= $base_path; ?>login/logout.php">Sair</a>
                        <?php } ?>

                    </li>
                </ul>
            </nav>
        </div>
    </header>