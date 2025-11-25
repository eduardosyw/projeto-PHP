<?php

$id_para_excluir = $_GET['id'];
$arquivo_json = "data/tutores.json";

$json = file_get_contents($arquivo_json);
$tutores = json_decode($json, true);

$novos_tutores = [];

foreach ($tutores as $tutor) {
    if ($tutor['id'] != $id_para_excluir) {
        $novos_tutores[] = $tutor;
    }
}

$novo_tutor = json_encode($novos_tutores, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

file_put_contents($arquivo_json, $novo_tutor);

header("Location: tutores-lista.php");

?>