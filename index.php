<?php

include('conexao.php');

if(isset($_POST['email']) or isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha o seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha a sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM tab_usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorreto(s).";
        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="POST">
        <p>
            <label for="email">E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label for="senha">Senha</label>
            <input type="password" name="senha">
        </p>
        <button type="Submit">Entrar</button>
    </form>
</body>
</html>