<?php include 'menu.php'; ?>

<?php
$arquivo = __DIR__ . '/alunos.txt';
?>

<h2>Lista de Todos os Alunos</h2>

<?php
if (file_exists($arquivo)) {
    $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
    if (count($linhas) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Matrícula</th><th>Nome</th><th>Email</th></tr>";
        foreach ($linhas as $linha) {
            list($id, $matricula, $nome, $email) = explode('|', $linha);
            echo "<tr>
                    <td>$id</td>
                    <td>$matricula</td>
                    <td>$nome</td>
                    <td>$email</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum aluno cadastrado ainda.</p>";
    }
} else {
    echo "<p>Arquivo de dados não encontrado.</p>";
}
?>
