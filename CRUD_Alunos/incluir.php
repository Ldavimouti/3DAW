<?php include 'menu.php'; ?>

<?php
$arquivo = __DIR__ . '/alunos.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $matricula = trim($_POST['matricula']);
    $email = trim($_POST['email']);

    if ($nome && $matricula && $email) {
        $linhas = file_exists($arquivo) ? file($arquivo, FILE_IGNORE_NEW_LINES) : [];
        $id = count($linhas) + 1;

        $linha = "$id|$matricula|$nome|$email" . PHP_EOL;
        file_put_contents($arquivo, $linha, FILE_APPEND);
        echo "<p style='color:green;'>Aluno cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Preencha todos os campos!</p>";
    }
}
?>

<h2>Incluir Novo Aluno</h2>
<form method="post">
    <label>Matrícula: <input type="text" name="matricula" required></label><br><br>
    <label>Nome: <input type="text" name="nome" required></label><br><br>
    <label>Email: <input type="email" name="email" required></label><br><br>
    <button type="submit">Salvar</button>
</form>
