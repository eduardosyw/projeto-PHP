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

// Filtrar o array removendo o agendamento com o ID especificado
$agendamentos = array_filter($agendamentos, function($agendamento) use ($id) {
    return $agendamento['id'] != $id;
});

// Reindexar o array
$agendamentos = array_values($agendamentos);

// Tentar salvar com tratamento de erro
if (file_put_contents($arquivo_json, json_encode($agendamentos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) === false) {
    die("Erro: Não foi possível salvar o arquivo. Verifique as permissões da pasta 'data'.");
}

header('Location: agendamentos.php?deletado=1');
exit;
?>
