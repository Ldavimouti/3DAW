<?php include 'menu.php'; ?>

<?php
$arquivo = __DIR__ . '/alunos.txt';
$aluno = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    if (file_exists($arquivo)) {
        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
        foreach ($linhas as $linha) {
            list($lid, $matricula, $nome, $email) = explode('|', $linha);
            if ($lid == $id) {
                $aluno = compact('lid', 'matricula', 'nome', 'email');
                break;
            }
        }
    }
}
?>

<h2>Listar Um Aluno</h2>
<form method="post">
    <label>ID: <input type="number" name="id" required></label>
    <button type="submit">Buscar</button>
</form>

<?php if ($aluno): ?>
    <h3>Resultado:</h3>
    <ul>
        <li><b>ID:</b> <?= htmlspecialchars($aluno['lid']) ?></li>
        <li><b>Matrícula:</b> <?= htmlspecialchars($aluno['matricula']) ?></li>
        <li><b>Nome:</b> <?= htmlspecialchars($aluno['nome']) ?></li>
        <li><b>Email:</b> <?= htmlspecialchars($aluno['email']) ?></li>
    </ul>
<?php endif; ?>
