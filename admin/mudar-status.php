<?php
session_start();
if(!isset($_SESSION['tipo']) && $_SESSION['tipo'] != 'admin'){
    header('Location: ../');
    exit;
}
if (!isset($_GET['id'])) {
    header('Location: agendamentos.php');
    exit;
}

$id = $_GET['id'];
$arquivo_json = '../data/agendamentos.json';
$conteudo_json = file_get_contents($arquivo_json);
$agendamentos = json_decode($conteudo_json, true);

foreach ($agendamentos as $key => $agendamento) {
    if ($agendamento['id'] == $id) {
        // Alterna entre Pendente e Confirmado
        if ($agendamento['status'] == 'Pendente') {
            $agendamentos[$key]['status'] = 'Confirmado';
        } else {
            $agendamentos[$key]['status'] = 'Pendente';
        }
        break;
    }
}

// Salvar de volta no arquivo JSON
file_put_contents($arquivo_json, json_encode($agendamentos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

header('Location: agendamentos.php?status_atualizado=1');
exit;
?>
