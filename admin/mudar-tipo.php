<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $arquivo = '../data/usuarios.json';
    $usuarios = json_decode(file_get_contents($arquivo), true);

    foreach ($usuarios as $i => $usuario) {
        if ($usuario['id'] == $id) {
            $usuarios[$i]['tipo'] = $usuario['tipo'] == 'cliente' ? 'admin' : 'cliente';
        }
    }

    file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

header("Location: ./");
