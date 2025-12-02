<?php
session_start();
if(!isset($_SESSION['tipo']) && $_SESSION['tipo'] != 'admin'){
    header('Location: ../');
    exit;
}
$agendamentosLista = file_get_contents('../data/agendamentos.json');
$agendamentos = json_decode($agendamentosLista, true);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos - Painel Administrativo</title>
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
        .status-pendente {
            color: #f57c00;
            font-weight: bold;
        }
        .status-confirmado {
            color: #388e3c;
            font-weight: bold;
        }
        .btn-status {
            display: inline-block;
            padding: 8px 16px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.1s;
        }
        .btn-confirmar {
            background-color: #4CAF50;
        }
        .btn-confirmar:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }
        .btn-pendente {
            background-color: #f57c00;
        }
        .btn-pendente:hover {
            background-color: #e65100;
            transform: translateY(-2px);
        }
        .btn-status:active {
            transform: translateY(0);
        }
        .btn-deletar {
            display: inline-block;
            padding: 8px 16px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.1s;
            margin-left: 5px;
        }
        .btn-deletar:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
        }
        .btn-deletar:active {
            transform: translateY(0);
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
            <a href="./" style="padding: 15px 20px; text-decoration: none; color: #333;">Clientes</a>
            <a href="agendamentos.php" style="font-weight: bold; background-color: #b8b6b6; padding: 15px 20px; text-decoration: none; color: #333;">Agendamentos</a>
            <a href="../" style="padding: 15px 20px; text-decoration: none; color: #d32f2f; font-weight: bold; margin-top: auto; border-top: 2px solid #b8b6b6;">🚪 Sair</a>
        </div>
        
        <div class="content">
            <h1>Lista de Agendamentos</h1>
            <p>Total: <?php echo count($agendamentos); ?> agendamento(s) cadastrado(s)</p>
            
            <?php if (isset($_GET['status_atualizado'])): ?>
                <div style="background: linear-gradient(135deg, #E8F5E9 0%, #C8E6C9 100%); color: #2E7D32; padding: 15px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #4CAF50;">
                    ✓ Status do agendamento atualizado com sucesso!
                </div>
            <?php endif; ?>
            
            <?php if (isset($_GET['deletado'])): ?>
                <div style="background: linear-gradient(135deg, #FFEBEE 0%, #FFCDD2 100%); color: #C62828; padding: 15px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #EF5350;">
                    ✓ Agendamento deletado com sucesso!
                </div>
            <?php endif; ?>
            
            <div class="table-container">
                <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuário ID</th>
                        <th>Pet</th>
                        <th>Serviço</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agendamentos as $agendamento): ?>
                        <tr>
                            <td><?php echo $agendamento['id']; ?></td>
                            <td><?php echo $agendamento['usuario_id']; ?></td>
                            <td><?php echo $agendamento['pet_nome']; ?></td>
                            <td><?php echo $agendamento['servico']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($agendamento['data'])); ?></td>
                            <td><?php echo $agendamento['horario']; ?></td>
                            <td class="status-<?php echo strtolower($agendamento['status']); ?>">
                                <?php echo $agendamento['status']; ?>
                            </td>
                            <td>
                                <a href="mudar-status.php?id=<?php echo $agendamento['id']; ?>" 
                                   class="btn-status <?php echo $agendamento['status'] == 'Pendente' ? 'btn-confirmar' : 'btn-pendente'; ?>"
                                   onclick="return confirm('Deseja alterar o status deste agendamento?');">
                                    <?php echo $agendamento['status'] == 'Pendente' ? '✓ Confirmar' : '↻ Pendente'; ?>
                                </a>
                                <a href="deletar-agendamento.php?id=<?php echo $agendamento['id']; ?>" 
                                   class="btn-deletar"
                                   onclick="return confirm('Tem certeza que deseja DELETAR este agendamento? Esta ação não pode ser desfeita!');">
                                     Deletar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </main>
</body>
</html>
