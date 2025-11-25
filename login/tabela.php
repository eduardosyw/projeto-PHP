<?php
    $arquivo = 'usuarios.json';
    if(file_exists($arquivo)) {
        $usuarios = json_decode(file_get_contents($arquivo), true);
        if($usuarios == null) {
            echo "Não existe usuarios cadastrados";
            exit;
        } else {

        }
?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($usuarios as $usuario){ ?>
        <tr>
            <td><?=$usuario['id'];?></td>
            <td><?=$usuario['nome'];?></td>
            <td><?=$usuario['email'];?></td>
            <td><?=$usuario['tipo'];?></td>
            <td>
                <a href="#">Editar</a>
                <a href="#">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } else { ?>
    <h2>Arquivo não encontrado</h2>
<?php } ?>