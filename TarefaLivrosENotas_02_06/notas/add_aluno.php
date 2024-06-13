<?php
include('conn.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $aluno = $_POST['aluno'];
    $stmt = $pdo->prepare('INSERT INTO tbaluno (nomealuno) VALUES (?)');
    $stmt-> execute([$aluno]);
    header('Location: add_aluno.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adcionar aluno</title>
</head>
<body>
    <h2>Adicionar aluno</h2>
    <form action="" method="post">
        <label for="aluno">Nome do aluno: </label>
        <input type="text" name="aluno" required><br>
        <input type="submit" value="adicionar">
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar ao Índice</a>
</body>
</html>