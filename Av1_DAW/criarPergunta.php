
<?php include 'menu.php'; ?>

<?php
$file = "perguntas.txt";


if (!file_exists($file)) {
    
    file_put_contents($file, "");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pergunta = isset($_POST['pergunta']) ? trim($_POST['pergunta']) : '';
    $respostas = isset($_POST['respostas']) ? $_POST['respostas'] : [];
    $correta = isset($_POST['correta']) ? $_POST['correta'] : '';

    if ($pergunta === '' || empty($respostas) || $correta === '') {
        echo "<p style='color:red;'>Erro: Dados do formulário incompletos.</p>";
    } else {
        $linhas = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $id = count($linhas) + 1;

        $respostas = array_pad($respostas, 5, "");
        $linha = $id . "|multipla|" . $pergunta . "|" . implode(";", $respostas) . "|" . $correta;

        $resultado = file_put_contents($file, $linha . PHP_EOL, FILE_APPEND);
        if ($resultado === false) {
            echo "<p style='color:red;'>Erro ao gravar no arquivo! Verifique permissões.</p>";
        } else {
            echo "<p style='color:green;'>Pergunta de múltipla escolha cadastrada com sucesso!</p>";
        }
    }
}
?>

<h2>Criar Pergunta de Múltipla Escolha</h2>
<form method="post">
    <label>Pergunta: <input type="text" name="pergunta" required></label><br><br>

    <?php for ($i = 1; $i <= 5; $i++): ?>
        <label>Alternativa <?= $i ?>: <input type="text" name="respostas[]"></label><br>
    <?php endfor; ?>

    <br><label>Resposta Correta: <input type="number" name="correta" min="0" max="4" required></label><br><br>
    <button type="submit">Criar Pergunta</button>
</form>
