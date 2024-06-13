<?php
include('conn.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $autor = $_POST['autor'];
    $stmt = $pdo->prepare('INSERT INTO tbautor (nomeautor) VALUES (?)');
    $stmt-> execute([$autor]);
    header('Location: add_autor.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adcionar Autor</title>
</head>
<body>
    <h2>Adicionar Autor</h2>
    <form action="" method="post">
        <label for="autor">Nome do Autor: </label>
        <input type="text" name="autor" required><br>
        <input type="submit" value="adicionar">
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar ao Índice</a>
</body>
</html>