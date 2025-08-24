<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Simples</title>
</head>
<body>

    <h1>Calculadora Simples</h1>

    <form method="get" action="calculadora.php">
        <label for="v1">Valor 1:</label>
        <input type="number" name="a" id="v1" required>
        <br><br>
        <label for="v2">Valor 2:</label>
        <input type="number" name="b" id="v2" required>
        <br><br>
        <label for="op">Operador:</label>
        <select name="op" id="op">
            <option value="+">Adição (+)</option>
            <option value="-">Subtração (-)</option>
            <option value="*">Multiplicação (*)</option>
            <option value="/">Divisão (/)</option>
        </select>
        <br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
 
    $v1 = $_GET["a"];
    $v2 = $_GET["b"];
    $op = $_GET["op"];
    $result = 0;

    if ($op == "+") {
        $result = $v1 + $v2;
    } elseif ($op == "-") {
        $result = $v1 - $v2;
    } elseif ($op == "*") {
        $result = $v1 * $v2;
    } elseif ($op == "/") {

        if ($v2 != 0) {
            $result = $v1 / $v2;
        } else {
            $result = "Erro: Divisão por zero!";
        }
    }

    if (isset($op)) {
        echo "<h2>Resultado:</h2>";
        echo "<p>O resultado da operação é: <strong>" . $result . "</strong></p>";
    }
    ?>

</body>
</html>