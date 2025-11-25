<?php
require_once '../config/sessao.php';
require_once '../config/config.php';

if (!is_logged_in()) {
    header('Location: agendamento.php');
    exit;
}

$arquivo_json= '../data/agendamentos.json';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $pet_nome = $_POST['pet_nome'];
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $usuario_id = $_SESSION['usuario_id'];

    if (file_exists($arquivo_json) && filesize($arquivo_json) > 0){
        $conteudo_json = file_get_contents($arquivo_json);
        $agendamentos = json_decode($conteudo_json, true);

        if ($agendamentos === null || !is_array($agendamentos)){
            $agendamentos = [];
        }
    } else {
        $agendamentos = [];
    }

    if (empty($agendamentos)) {
        $novo_id = 1;
    } else {
        $maior_id = 0;
        foreach ($agendamentos as $a) {
            if ($a['id'] > $maior_id) {
                $maior_id = $a['id'];
            }
        }
    }
    $novo_id = $maior_id + 1;

    
    $novo_agendamento = [
        'id' => $novo_id,
        'usuario_id' => $usuario_id,
        'pet_nome' => $pet_nome,
        'servico' => $servico,
        'data' => $data,
        'horario' => $horario,
        'status' => 'Pendente',
    ];

    $agendamentos[] = $novo_agendamento;

    $novo_conteudo_json = json_encode($agendamentos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    if (file_put_contents($arquivo_json, $novo_conteudo_json)) {
        header('Location: agendamento.php?sucesso=1');
        exit;
    } else{
        echo "Erro ao salvar" . error_get_last()['message'];
    }
} else {
    echo "Metodo inválido";
}
?>
