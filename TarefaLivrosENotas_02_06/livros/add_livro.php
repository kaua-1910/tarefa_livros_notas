<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nomelivro = $_POST['nomelivro'];
    $tbgenero_codgenero = $_POST['tbgenero_codgenero'];
    $tbautor_codautor = $_POST['tbautor_codautor'];
    $tbeditora_codeditora = $_POST['tbeditora_codeditora'];
    $edicao = $_POST['edicao'];

    $stmt = $pdo->prepare('INSERT INTO tblivro (nomelivro, codgenero, codautor, edicao, codeditora) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$nomelivro, $tbgenero_codgenero, $tbautor_codautor, $edicao, $tbeditora_codeditora]);

    header('Location: add_livro.php');
    exit();

}

$autores = $pdo->query('SELECT codautor FROM tbautor')->fetchAll();
$editoras = $pdo->query('SELECT codeditora FROM tbeditora')->fetchAll();
$generos = $pdo->query('SELECT codgenero FROM tbgenero')->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar livro</title>
</head>
<body>
    <h2>Adcionar livro</h2>
    <form action="" method="post">
        <label for="nomelivro">nome do livro</label>
        <input type="text" name="nomelivro" required><br>

        <label for="tbgenero_codgenero">Gênero:</label>
        <select name="tbgenero_codgenero" required id="">
            <?php foreach ($generos as $codgenero): ?>
            <option value="<?= $codgenero['codgenero'] ?>"><?= $codgenero['codgenero'] ?></option>
            <?php endforeach; ?>    
        </select><br>

        <label for="tbautor_codautor">Autor:</label>
        <select name="tbautor_codautor" required id="">
            <?php foreach ($autores as $codautor): ?>
            <option value="<?= $codautor['codautor'] ?>"><?= $codautor['codautor'] ?></option>
            <?php endforeach; ?>    
        </select><br>

        <label for="tbeditora_codeditora">Editora:</label>
        <select name="tbeditora_codeditora" required id="">
            <?php foreach ($editoras as $codeditora): ?>
            <option value="<?= $codeditora['codeditora'] ?>"><?= $codeditora['codeditora'] ?></option>
            <?php endforeach; ?>    
        </select><br>
        <label for="edicao">edicao:</label>
        <input type="text" name="edicao" required><br>
        <input type="submit" value="adicionar">
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar ao Índice</a>
</body>
</html>
