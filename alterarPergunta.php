<?php include 'menu.php'; ?>

<?php
$file = "perguntas.txt";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idAlvo = $_POST['id'];
    $pergunta = $_POST['pergunta'];
    $respostas = $_POST['respostas'];
    $correta = $_POST['correta'];

    $linhas = file($file);
    foreach ($linhas as $i => $linha) {
        $dados = explode("|", trim($linha));
        if ($dados[0] == $idAlvo && $dados[1] == "multipla") {
            $respostas = array_pad($respostas, 5, ""); // garante 5 opções
            $dados[2] = $pergunta;
            $dados[3] = implode(";", $respostas);
            $dados[4] = $correta;
            $linhas[$i] = implode("|", $dados) . PHP_EOL;
        }
    }
    file_put_contents($file, implode("", $linhas));

    echo "<p>Pergunta de múltipla escolha alterada!</p>";
}
?>

<h2>Alterar Pergunta de Múltipla Escolha</h2>
<form method="post">
    <label>ID da Pergunta: <input type="number" name="id" required></label><br><br>
    <label>Nova Pergunta: <input type="text" name="pergunta"></label><br>

    <?php for ($i = 1; $i <= 5; $i++): ?>
        <label>Alternativa <?= $i ?>: <input type="text" name="respostas[]"></label><br>
    <?php endfor; ?>

    <br><label>Resposta Correta: <input type="number" name="correta" min="0" max="4"></label><br><br>
    <button type="submit">Alterar</button>
</form>
