<?php
include('conn.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $editora = $_POST['editora'];
    $stmt = $pdo->prepare('INSERT INTO tbeditora (nomeeditora) VALUES (?)');
    $stmt-> execute([$editora]);
    header('Location: add_editora.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adcionar Editora</title>
</head>
<body>
    <h2>Adicionar Editora</h2>
    <form action="" method="post">
        <label for="editora">Nome da Editora: </label>
        <input type="text" name="editora" required><br>
        <input type="submit" value="adicionar">
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar ao Índice</a>
</body>
</html>