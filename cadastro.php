<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="formulario">
        <h1>Cadastro</h1>
        <form method="post">
            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" placeholder="Usuário">
            <label for="senha">Senha</label>
            <input type="password" name="senha" placeholder="Senha">
            <input class="btn-login" type="submit" value="Criar" name="cadastro">
        </form>
        <a class="btn-redirecionar" href="index.php">Voltar</a>
    </section>
    <?php

    include('conexao.php');

    if(isset($_POST['cadastro'])) {
        if(strlen($_POST['usuario']) == 0) {
            echo "<script>alert('Insira seu usuário');</script>";
        } else if(strlen($_POST['senha']) == 0) {
            echo "<script>alert('Insira sua senha');</script>";
        } else {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            $sql_code = "INSERT INTO tb_contas (usuario, senha) VALUES ('$usuario', '$senha')";
            $sql_query = $mysqli->query($sql_code) or exit($mysqli->error); 
        
            $consulta_linhas = "SELECT * FROM tb_contas WHERE usuario = '$usuario' AND senha = '$senha'";
            $consulta_linhas_query = $mysqli->query($consulta_linhas) or exit($mysqli->error);

            $quantidade = $consulta_linhas_query->num_rows or exit($mysqli->error);

            if($quantidade == 1) {
                echo "<script>alert('Conta criada com sucesso!');</script>";
            } 
        }
    }

    ?>

</body>
</html>