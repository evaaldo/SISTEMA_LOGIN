<?php

session_start();

if(!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="home">
        <h1>Bem-vindo, usuário!</h1>
        <br>
        <a href='logout.php'>Sair</a>
    </section>
</body>
</html>

