<?php
if (isset($_POST['criar'])) {
    $arquivo = "../data/usuarios.json";
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipo = "cliente";

    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
        $usuarios = json_decode($conteudo, true);

        if ($usuarios == null || !is_array($usuarios)) {
            $usuarios = array();
        }
    } else {
        $usuarios = array();
    }

    foreach ($usuarios as $usuario) {
        if ($usuario["email"] == $email) {
            // usuario ja cadastrado
            header('Location: ./?pg=form-login&msg=userExist');
            exit;
        }
    }

    $ids = array_column($usuarios, 'id');
    $id = empty($ids) ? 1 : max($ids) + 1;


    $usuarios[] = [
        'id' => $id,
        'email' => $email,
        'senha' => $senha,
        'tipo' => $tipo
    ];

    $novoConteudo = json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    if (file_put_contents($arquivo, $novoConteudo)) {
        // usuario cadastrado com sucesso
        session_start();
        $_SESSION['usuario_id'] = $id;
        header('location: ../tutores-cadastro-form.php');
        exit;
    } else {
        header('Location: ./?pg=form-cadastro&msg=erro');
        exit;
    }
}
if (isset($_POST['logar'])) {
    $arquivo = "../data/usuarios.json";
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if (file_exists($arquivo)) {
        $usuarios = json_decode(file_get_contents($arquivo), true);
        $acesso = false;
        foreach ($usuarios as $usuario) {
            if ($usuario["email"] == $email && $usuario['senha'] == $senha) {
                $acesso = true;
                session_start();
                $_SESSION['usuario_id'] = $usuario['id'];
                if($usuario["tipo"] == "admin") {
                    $_SESSION['tipo'] = $usuario['tipo'];
                }
                break;
            }
        }
        if (!$acesso) {
            header('location: ./?pg=form-login&msg=erroLogar');
            exit;
        } else {
            header('Location: ../');
            exit;
        }
    } else {
        header("Location: ./?pg=form-login&msg=erroLogar");
        exit;
    }
}
if (isset($_POST['alterarSenha'])){
    session_start();
    if(isset($_SESSION['usuario_id'])){
        if($_POST['senhaNova'] == $_POST['senhaNovaConfirm']) {
            $alterar = false;
            $arquivo = '../data/usuarios.json';
            $usuarios = json_decode(file_get_contents($arquivo), true);
            foreach($usuarios as $key => $usuario) {
                if($usuario['id'] == $_SESSION['usuario_id'] && $usuario['senha'] == $_POST['senhaAtual']) {
                    $usuarios[$key]['senha'] = $_POST['senhaNova'];
                    $alterar = true;
                    break;
                }
            }
            if(!$alterar) {
                header('Location: ./?pg=form-alterarSenha&msg=senhaInvalida');
            } else {
                if(file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
                    header('Location: ../dados.php');
                    exit;
                } else {
                    header('Location: ./?pg=form-alterarSenha&msg=erro');
                    exit;
                }
            }

        } else {
            header('Location: ./?pg=form-alterarSenha&msg=senhaInvalida');
            exit;
        }
    } else {
        header('Location: ../');
        exit;
    }
}