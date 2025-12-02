<?php
    if(isset($_GET['msg'])) {
        $style = 'background: linear-gradient(135deg, #FFEBEE 0%, #FFCDD2 100%); color: #C62828; border-color: #EF5350;';
        if($_GET['msg'] == 'userExist') {
            $msg = 'Este usuário já está cadastrado.';
        }
        if($_GET['msg'] == 'userCreat') {
            $msg = 'Usuário criado com sucesso!';
            $style = '';
        }
        if($_GET['msg'] == 'erro') {
            $msg = 'Erro ao criar novo usuário.';
        }
        if($_GET['msg'] == 'erroLogar') {
            $msg = 'Usuário ou senha inválidos.';
        }
        if($_GET['msg'] == 'senhaInvalida'){
            $msg = 'Senha inválida! Tente novamente.';
        }

?>
<div class="sucesso-message" style="<?=$style;?>">
    <p><?=$msg;?></p>
</div>

<?php } ?>