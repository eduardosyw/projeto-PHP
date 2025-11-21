<?php 
    if(isset($_POST['criar'])){
        $arquivo = "../data/usuarios.json";
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $tipo = "cliente";

        if(file_exists($arquivo)) {
            $conteudo = file_get_contents($arquivo);
            $usuarios = json_decode($conteudo,true);

            if($usuarios == null || !is_array($usuarios)) {
                $usuarios = array();
            }
        } else {
            $usuarios = array();
        }

        foreach($usuarios as $usuario) {
            if($usuario["email"] == $email) {
                header('Location: form-login.php');
                exit;
            }
        }

        $ids = array_column($usuarios, 'id');
        $id = empty($ids) ? 1 : max($ids) + 1;
        

        $usuarios[] = [
            'id' => $id,
            'email'=> $email,
            'senha'=> $senha,
            'tipo'=> $tipo
        ];

        $novoConteudo = json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        if(file_put_contents($arquivo, $novoConteudo)) {
            header('location: form-login.php');
        } else {
            echo "Erro ao cadastrar usuario";
        }
    }
    if(isset($_POST['logar'])) {
        $arquivo = "../data/usuarios.json";
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        if(file_exists($arquivo)) {
            $usuarios = json_decode(file_get_contents($arquivo),true);
            $acesso = false;
            foreach($usuarios as $usuario) {
                if($usuario["email"] == $email && $usuario['senha'] == $senha) {
                    $acesso = true;
                    session_start();
                    $_SESSION['usuario_id'] = $usuario['id'];
                    break;
                }
            }
            if(!$acesso) {
                header('location: form-login.php');
            } else {
                header('Location: ../');
            }
        } else {
            header("Location: form-cadastro.php");
        }
    }