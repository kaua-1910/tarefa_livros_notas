<?php
include('conn.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $disciplina = $_POST['disciplina'];
    $stmt = $pdo->prepare('INSERT INTO tbdisciplina (disciplina) VALUES (?)');#aqui tava nome
    $stmt-> execute([$disciplina]);
    header('Location: add_disciplina.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adcionar disciplina</title>
</head>
<body>
    <h2>Adicionar disciplina</h2>
    <form action="" method="post">
        <label for="disciplina">Nome do disciplina: </label>
        <input type="text" name="disciplina" required><br>
        <input type="submit" value="adicionar">
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar ao Índice</a>
</body>
</html>