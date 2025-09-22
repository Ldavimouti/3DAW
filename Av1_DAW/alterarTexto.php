<?php include 'menu.php'; ?>

<?php
$file = "perguntas.txt";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idAlvo = isset($_POST['id']) ? $_POST['id'] : '';
    $pergunta = isset($_POST['pergunta']) ? trim($_POST['pergunta']) : '';
    $resposta = isset($_POST['resposta']) ? trim($_POST['resposta']) : '';

    if ($idAlvo === '' || $pergunta === '' || $resposta === '') {
        echo "<p style='color:red;'>Erro: Dados do formulário incompletos.</p>";
    } else {
        $linhas = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($linhas as $i => $linha) {
            $dados = explode("|", trim($linha));
            if ($dados[0] == $idAlvo && $dados[1] == "texto") {
                $dados[2] = $pergunta;
                $dados[3] = $resposta;
                $linhas[$i] = implode("|", $dados) . PHP_EOL;
            }
        }
        file_put_contents($file, implode("", $linhas));
        echo "<p>Pergunta de texto alterada!</p>";
    }
}
?>

<h2>Alterar Pergunta de Texto Objetiva</h2>
<form method="post">
    <label>ID da Pergunta: <input type="number" name="id" required></label><br><br>
    <label>Nova Pergunta: <input type="text" name="pergunta" required></label><br>
    <label>Nova Resposta: <input type="text" name="resposta" required></label><br><br>
    <button type="submit">Alterar</button>
</form>
