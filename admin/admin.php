<?php
session_start();
if(!isset($_SESSION['tipo']) && $_SESSION['tipo'] != 'admin'){
    header('Location: ../');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="adminStyle.css">
</head>
<body>
    <header>
        <div class="left">
            <h1>Painel Administrativo</h1>
        </div>
    </header>
    <main>
        <div class="left-menu">
            <a href="index.php" style="padding: 15px 20px; text-decoration: none; color: #333;">Clientes</a>
            <a href="agendamentos.php" style="padding: 15px 20px; text-decoration: none; color: #333;">Agendamentos</a>
            <a href="../login/logout.php" style="padding: 15px 20px; text-decoration: none; color: #d32f2f; font-weight: bold; margin-top: auto; border-top: 2px solid #b8b6b6;">🚪 Sair</a>
        </div>
        <div class="content">
            <h1>Bem-vindo ao Painel Administrativo</h1>
            <p>Use o menu à esquerda para navegar.</p>
        </div>
    </main>
</body>
</html>