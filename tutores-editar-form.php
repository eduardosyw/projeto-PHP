<?php

$id = $_GET['id'];

$tutores = json_decode(file_get_contents("tutores.json"), true);

$tutor_atual = null;
foreach ($tutores as $t) {
    if ($t['id'] == $id) {
        $tutor_atual = $t;
        break;
    }
}
?>

<h2>Editar Tutor</h2>

<form method="post" action="tutores-editar.php">

<input type="hidden" name="id" value="<?= $tutor_atual['id'] ?>">
    
    <label>Nome</label>
    <input type="text" name="nome"><br>
    <label>Cpf</label>
    <input type="text" name="cpf"><br>
    <label>Telefone</label>
    <input type="text" name="telefone"><br>
    <label>Endereço Completo</label>
    <input type="text" name="endereco"><br>
    <input type="submit" value="Salvar Alterações">

    </form>
