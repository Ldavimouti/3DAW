<?php include 'menu.php'; ?>

<?php
$arquivo = __DIR__ . '/alunos.txt';
$aluno = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buscar'])) {
    $id = $_POST['id'];
    if (file_exists($arquivo)) {
        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
        foreach ($linhas as $linha) {
            list($lid, $mat, $nome, $email) = explode('|', $linha);
            if ($lid == $id) {
                $aluno = ['id' => $lid, 'matricula' => $mat, 'nome' => $nome, 'email' => $email];
                break;
            }
        }
        if (!$aluno) echo "<p style='color:red;'>Aluno não encontrado!</p>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['alterar'])) {
    $id = $_POST['id'];
    $matricula = trim($_POST['matricula']);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);

    $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
    foreach ($linhas as $i => $linha) {
        list($lid) = explode('|', $linha);
        if ($lid == $id) {
            $linhas[$i] = "$id|$matricula|$nome|$email";
        }
    }
    file_put_contents($arquivo, implode(PHP_EOL, $linhas) . PHP_EOL);
    echo "<p style='color:green;'>Aluno alterado com sucesso!</p>";
}
?>

<h2>Alterar Aluno</h2>

<form method="post">
    <label>ID do Aluno: <input type="number" name="id" required></label>
    <button type="submit" name="buscar">Buscar</button>
</form>

<?php if ($aluno): ?>
<form method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($aluno['id']) ?>">
    <label>Matrícula: <input type="text" name="matricula" value="<?= htmlspecialchars($aluno['matricula']) ?>"></label><br><br>
    <label>Nome: <input type="text" name="nome" value="<?= htmlspecialchars($aluno['nome']) ?>"></label><br><br>
    <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($aluno['email']) ?>"></label><br><br>
    <button type="submit" name="alterar">Salvar Alterações</button>
</form>
<?php endif; ?>
