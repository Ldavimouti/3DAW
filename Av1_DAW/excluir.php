<?php include 'menu.php'; ?>

<?php
$file = "perguntas.txt";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idAlvo = $_POST['id'];

    if (!file_exists($file)) {
        die("Nenhuma pergunta cadastrada.");
    }

    $linhas = file($file);
    $novas = [];
    foreach ($linhas as $linha) {
        $dados = explode("|", trim($linha));
        if ($dados[0] != $idAlvo) {
            $novas[] = $linha;
        }
    }
    file_put_contents($file, implode("", $novas));

    echo "<p>Pergunta excluída!</p>";
}
?>

<form method="post">
    <label>ID da Pergunta: <input type="number" name="id" required></label>
    <button type="submit">Excluir</button>
</form>
