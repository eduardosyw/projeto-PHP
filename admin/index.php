<?php
$tutoresLista = file_get_contents('../data/tutores.json');
$tutores = json_decode($tutoresLista, true);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Painel Administrativo</title>
    <link rel="stylesheet" href="adminStyle.css">
    <style>
        .content {
            padding: 40px;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }
        .content h1 {
            margin-bottom: 10px;
            color: #333;
        }
        .content p {
            margin-bottom: 30px;
            color: #666;
        }
        .table-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        th {
            background-color: #807f7f;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }
        tr:hover {
            background-color: #f8f8f8;
        }
        tbody tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <header>
        <div class="left">
            <h1>Painel Administrativo</h1>
        </div>
    </header>
    
    <main>
        <div class="left-menu">
            <a href="index.php" style="font-weight: bold; background-color: #b8b6b6; padding: 15px 20px; text-decoration: none; color: #333;">Clientes</a>
            <a href="agendamentos.php" style="padding: 15px 20px; text-decoration: none; color: #333;">Agendamentos</a>
            <a href="../config/logout.php" style="padding: 15px 20px; text-decoration: none; color: #d32f2f; font-weight: bold; margin-top: auto; border-top: 2px solid #b8b6b6;">🚪 Sair</a>
        </div>
        
        <div class="content">
            <h1>Lista de Clientes</h1>
            <p>Total: <?php echo count($tutores); ?> cliente(s) cadastrado(s)</p>
            
            <div class="table-container">
                <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tutores as $tutor): ?>
                        <tr>
                            <td><?php echo $tutor['id']; ?></td>
                            <td><?php echo $tutor['nome']; ?></td>
                            <td><?php echo $tutor['cpf']; ?></td>
                            <td><?php echo $tutor['telefone']; ?></td>
                            <td><?php echo $tutor['endereco']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </main>
</body>
</html>