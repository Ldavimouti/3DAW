<?php include 'menu.php'; ?>

<?php
$file = "perguntas.txt";

if (!file_exists($file)) {
    die("Nenhuma pergunta cadastrada.");
}

$linhas = file($file);
echo "<h2>Todas as Perguntas</h2>";
foreach ($linhas as $linha) {
    $dados = explode("|", trim($linha));
    if ($dados[1] == "multipla") {
        echo "ID: {$dados[0]} | Tipo: Múltipla Escolha | Pergunta: {$dados[2]}<br>";
    } elseif ($dados[1] == "texto") {
        echo "ID: {$dados[0]} | Tipo: Texto | Pergunta: {$dados[2]}<br>";
    }
}
