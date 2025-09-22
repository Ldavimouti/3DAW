<?php include 'menu.php'; ?>

<?php
$file = "perguntas.txt";

if (!file_exists($file)) {
    file_put_contents($file, "");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pergunta = isset($_POST['pergunta']) ? trim($_POST['pergunta']) : '';
    $resposta = isset($_POST['resposta']) ? trim($_POST['resposta']) : '';

    if ($pergunta === '' || $resposta === '') {
        echo "<p style='color:red;'>Erro: Dados do formulário incompletos.</p>";
    } else {
        $linhas = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $id = count($linhas) + 1;
        $linha = $id . "|texto|" . $pergunta . "|" . $resposta;
        $resultado = file_put_contents($file, $linha . PHP_EOL, FILE_APPEND);
        if ($resultado === false) {
            echo "<p style='color:red;'>Erro ao gravar no arquivo! Verifique permissões.</p>";
        } else {
            echo "<p style='color:green;'>Pergunta de texto cadastrada com sucesso!</p>";
        }
    }
}
?>

<h2>Criar Pergunta de Texto Objetiva</h2>
<form method="post">
    <label>Pergunta: <input type="text" name="pergunta" required></label><br><br>
    <label>Resposta: <input type="text" name="resposta" required></label><br><br>
    <button type="submit">Criar Pergunta</button>
</form>
