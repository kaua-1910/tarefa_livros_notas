<?php
include('conn.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $genero = $_POST['genero'];
    $stmt = $pdo->prepare('INSERT INTO tbgenero (genero) VALUES (?)');
    $stmt-> execute([$genero]);
    header('Location: add_genero.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adcionar Gênero</title>
</head>
<body>
    <h2>Adicionar Genero</h2>
    <form action="" method="post">
        <label for="genero">Nome do Gênero: </label>
        <input type="text" name="genero" required><br>
        <input type="submit" value="adicionar">
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar ao Índice</a>
</body>
</html>