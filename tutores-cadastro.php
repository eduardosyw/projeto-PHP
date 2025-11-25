<?php

$arquivo_json = "data/tutores.json";
session_start();
if (!isset($_SESSION['usuario_id'])) {
    die("Erro: Usuário não logado.");
}

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];


if (file_exists($arquivo_json)) {
    $json = file_get_contents($arquivo_json);
    $tutores = json_decode($json, true);
    if ($tutores == null || !is_array($tutores)) {
        $tutores = [];
    }
} else {
    $tutores = [];
}

$novo_id = count($tutores) + 1;
$novo_tutor = [
    "id" => $novo_id,
    "usuario_id" => $_SESSION['usuario_id'],
    "nome" => $nome,
    "cpf" => $cpf,
    "telefone" => $telefone,
    "endereco" => $endereco
];

$tutores[] = $novo_tutor;

$novo_tutor_json = json_encode($tutores, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

if (file_put_contents($arquivo_json, $novo_tutor_json)) {
    header('Location: dados.php');
} else {
    header('Location: dados.php?msg=erro');
}
?>