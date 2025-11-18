<?php
require_once '../config/sessao.php';
require_once '../config/config.php';

if (!is_logged_in()) {
    header('Location: agendamento.php');
    exit;
}

$arquivo_json= '../data/agendamentos.json';
$conteudo_json = file_get_contents($arquivo_json);
$agendamentos = json_decode($conteudo_json, true);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $pet_nome = $_POST['pet_nome'];
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    $agendamentos = json_decode($conteudo_json, true);

    foreach ($agendamentos as $key => $a){
        if ($a['id'] == $id){
            $agendamentos[$key]['pet_nome'] = $pet_nome;
            $agendamentos[$key]['servico'] = $servico;
            $agendamentos[$key]['data'] = $data;
            $agendamentos[$key]['horario'] = $horario;
            break;
        }
    }

    $novo_conteudo_json = json_encode($agendamentos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    if (file_put_contents($arquivo_json, $novo_conteudo_json)) {
        header('Location: agendamento.php?edit=1');
        exit;
    } else{
        echo "Erro ao salvar agendamento.";
    }
} else{
    echo "Método inválido.";
}


?>