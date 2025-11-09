<?php include 'menu.php'; ?>

<?php
$arquivo = __DIR__ . '/alunos.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    if (file_exists($arquivo)) {
        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
        $novas = [];
        $removido = false;
        foreach ($linhas as $linha) {
            list($lid) = explode('|', $linha);
            if ($lid != $id) {
                $novas[] = $linha;
            } else {
                $removido = true;
            }
        }
        file_put_contents($arquivo, implode(PHP_EOL, $novas) . PHP_EOL);
        if ($removido) {
            echo "<p style='color:green;'>Aluno removido com sucesso!</p>";
        } else {
            echo "<p style='color:red;'>Aluno não encontrado!</p>";
        }
    }
}
?>

<h2>Excluir Aluno</h2>
<form method="post">
    <label>ID do Aluno: <input type="number" name="id" required></label>
    <button type="submit">Excluir</button>
</form>
