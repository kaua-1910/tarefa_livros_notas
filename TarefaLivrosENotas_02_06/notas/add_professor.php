<?php
include('conn.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nomeprofessor = $_POST['nomeprofessor'];
    $stmt = $pdo->prepare('INSERT INTO tbprofessor (nomeprofessor) VALUES (?)');
    $stmt-> execute([$nomeprofessor]);
    header('Location: add_professor.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adcionar PROFESSOR</title>
</head>
<body>
    <h2>Adicionar PROFESSOR</h2>
    <form action="" method="post">
        <label for="nomeprofessor">Nome do/a professor: </label>
        <input type="text" name="nomeprofessor" required><br>
        <input type="submit" value="adicionar">
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar ao Índice</a>
</body>
</html>