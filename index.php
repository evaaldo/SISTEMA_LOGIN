<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="formulario">
        <h1>Login</h1>
        <form method="post">
            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" placeholder="Usuário">
            <label for="senha">Senha</label>
            <input type="password" name="senha" placeholder="Senha">
            <input class="btn-login" type="submit" value="Entrar" name="login">
        </form>
        <a class="btn-redirecionar" href="cadastro.php">Não possui conta?</a>
    </section>
    

    <?php

    include('conexao.php');

    if(isset($_POST['login'])) {
        if(strlen($_POST['usuario']) == 0) {
            echo "<script>alert('Insira seu usuário');</script>";
        } else if(strlen($_POST['senha']) == 0) {
            echo "<script>alert('Insira sua senha');</script>";
        } else {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            $sql_code = "SELECT * FROM tb_contas WHERE usuario = '$usuario' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or exit($mysqli->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1) {
                $_SESSION['usuario'] = $_POST['usuario'];
                header('Location: home.php');                
            } else{
                echo "<script>alert('Usuario não encontrado');</script>";
            }
        }
    }

    ?>

</body>
</html>