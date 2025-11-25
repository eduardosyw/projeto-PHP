<?php

$arquivo = "tutores.json";
echo "<h2>Cadastro de Tutores (Donos)</h2>";
?>

<form method="post" action="tutores-cadastro.php">
    <label>Nome</label>
    <input type="text" name="nome"><br>
    <label>Cpf</label>
    <input type="text" name="cpf"><br>
    <label>Telefone</label>
    <input type="text" name="telefone"><br>
    <label>Endereço Completo</label>
    <input type="text" name="endereco"><br>

    <input type="submit" value="Cadastrar Tutor">
</form>