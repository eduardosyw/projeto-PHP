<?php

$arquivo_json = "tutores.json";

$tutores = json_decode(file_get_contents($arquivo_json), true);

echo "<h1>Lista de Tutores</h1>";
echo "<a href='tutores-cadastro-form.php'> Novo Tutor </a>";
?>
<h2>Tutores Cadastrados</h2>
<ul>
    <?php foreach ($tutores as $tutor): ?>
    <li>
        Nome: <?= $post['nome'] ?> <br>
        Cpf: <?= $post['cpf'] ?> <br>
        Telefone: <?= $post['telefone'] ?> <br>
        Endereco: <?= $post['endereco'] ?> <br>
        
        <a href="tutores-editar-form.php?id=<?= $tutor['id'] ?>">Editar</a>
        <a href="tutores-excluir.php?id=<?= $tutor['id'] ?>" style="color: red;">Excluir</a>
        <a href="tutores-excluir.php?id=<?=$tutor['id'] ?>"
            onclick="return confirm('Tem certeza que deseja excluir esse cadastro?');"
            style="color: red;"></a>
    </li>
    <?php endforeach; ?>

</ul>

