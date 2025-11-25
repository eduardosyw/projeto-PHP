<?php

$arquivo_json = "data/tutores.json";

$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];

$json = file_get_contents($arquivo_json);
$tutores = json_decode($json, true);

foreach ($tutores as &$tutor) {
    if ($tutor['id'] == $id) {
        $tutor['nome'] = $nome;
        $tutor['cpf'] = $cpf;
        $tutor['telefone'] = $telefone;
        $tutor['endereco'] = $endereco;
        break;
    }
}

$json_salvar = json_encode($tutores, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
file_put_contents($arquivo_json, $json_salvar);

header("Location: dados.php");

?>