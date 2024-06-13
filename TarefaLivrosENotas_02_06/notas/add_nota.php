<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tbaluno_raaluno = $_POST['tbaluno_raaluno'];
    $tbprofessor_codprofessor = $_POST['tbprofessor_codprofessor'];
    $tbdisciplina_coddisciplina = $_POST['tbdisciplina_coddisciplina'];
    $nota = $_POST['nota'];
    $faltas = $_POST['faltas'];

    $stmt = $pdo->prepare('INSERT INTO tbnota (raaluno, nota, codprofessor, faltas, coddisciplina) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$tbaluno_raaluno, $nota, $tbprofessor_codprofessor, $faltas, $tbdisciplina_coddisciplina]);

    header('Location: add_nota.php');
    exit();
}

$alunos = $pdo->query('SELECT raaluno FROM tbaluno')->fetchAll();
$professores = $pdo->query('SELECT codprofessor FROM tbprofessor')->fetchAll();
$disciplinas = $pdo->query('SELECT coddisciplina FROM tbdisciplina')->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Nota</title>
</head>
<body>
    <h2>Adicionar Nota</h2>
    <form action="" method="post">

        <label for="tbaluno_raaluno">Aluno:</label>
        <select name="tbaluno_raaluno" required id="">
            <?php foreach ($alunos as $aluno): ?>
            <option value="<?= $aluno['raaluno'] ?>"><?= $aluno['raaluno'] ?></option>
            <?php endforeach; ?>    
        </select><br>

        <label for="tbprofessor_codprofessor">Professor:</label>
        <select name="tbprofessor_codprofessor" required id="">
            <?php foreach ($professores as $professor): ?>
            <option value="<?= $professor['codprofessor'] ?>"><?= $professor['codprofessor'] ?></option>
            <?php endforeach; ?>    
        </select><br>

        <label for="tbdisciplina_coddisciplina">Disciplina:</label>
        <select name="tbdisciplina_coddisciplina" required id="">
            <?php foreach ($disciplinas as $disciplina): ?>
            <option value="<?= $disciplina['coddisciplina'] ?>"><?= $disciplina['coddisciplina'] ?></option>
            <?php endforeach; ?>    
        </select><br>

        <label for="nota">Nota:</label>
        <input type="text" name="nota" required><br>

        <label for="faltas">Faltas:</label>
        <input type="text" name="faltas" required><br>
        <input type="submit" value="Adicionar">
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar ao Índice</a>
</body>
</html>
