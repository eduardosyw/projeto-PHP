<?php

$arquivo_json = "tutores.json";

$nome   = $_POST['nome'];
$cpf    = $_POST['cpf'];
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
    "nome" => $nome,
    "cpf" => $cpf,
    "telefone" => $telefone
    "endereco" => $endereco
];

$tutores[] = $novo_tutor;

$novo_tutor = json_encode($tutores, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

if (file_put_contents($arquivo_json, $novo_tutor)) {
    echo "<p>Tutor '$nome' cadastrado com sucesso.</p>";
    echo "<p><a href='tutores-lista.php'>Listar Tutores</a></p>";
} else {
    echo "<h2>Erro ao enviar o formulário.</h2>";
    echo "<p><a href='tutores-lista.php'>Listar Tutores</a></p>";
}