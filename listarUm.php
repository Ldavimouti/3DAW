<?php include 'menu.php'; ?>

<?php
$file = "perguntas.txt";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idAlvo = $_POST['id'];

    if (!file_exists($file)) {
        die("Nenhuma pergunta cadastrada.");
    }

    $linhas = file($file);
    foreach ($linhas as $linha) {
        $dados = explode("|", trim($linha));
        if ($dados[0] == $idAlvo) {
            echo "<h3>ID: {$dados[0]}</h3>";
            echo "Tipo: {$dados[1]}<br>";
            echo "Pergunta: {$dados[2]}<br>";

            if ($dados[1] == "multipla") {
                $respostas = explode(";", $dados[3]);
                foreach ($respostas as $i => $r) {
                    if ($r !== "") {
                        echo ($i == $dados[4] ? "<b>$r</b>" : $r) . "<br>";
                    }
                }
            } elseif ($dados[1] == "texto") {
                echo "Resposta: <b>{$dados[3]}</b><br>";
            }
        }
    }
}
?>

<h2>Buscar Pergunta</h2>
<form method="post">
    <label>ID da Pergunta: <input type="number" name="id" required></label>
    <button type="submit">Listar</button>
</form>
