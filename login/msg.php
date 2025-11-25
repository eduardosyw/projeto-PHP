<?php
    if(isset($_GET['msg'])) {
        $style = 'background: linear-gradient(135deg, #FFEBEE 0%, #FFCDD2 100%); color: #C62828; border-color: #EF5350;';
        if($_GET['msg'] == 'userExist') {
            $msg = 'Este usúario já está cadastrado.';
        }
        if($_GET['msg'] == 'userCreat') {
            $msg = 'Usúario Criado com sucesso!';
            $style = '';
        }
        if($_GET['msg'] == 'erro') {
            $msg = 'Erro ao criar novo usúario';
        }
        if($_GET['msg'] == 'erroLogar') {
            $msg = 'Usúario ou senha inválido';
        }

?>
<div class="sucesso-message" style="<?=$style;?>">
    <p><?=$msg;?></p>
</div>

<?php } ?>