<?php
    $msg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET')  
    {
             
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <header>
            <a href="incluirDisciplina.php">Incluir</a>
            <a href="excluirDisciplina.php">Excluir</a>
            <a href="listaDisciplina.php">Lista</a>
            <a href="listarUm.php">Listar um</a>
            <a href="listarTodos.php">Listar todos</a>
        </header>
    </head>
    <body>
        <h1>Alterar Disciplina:</h1>
        <h2>Digite a sigla da disciplina a ser alterada!</h2>
        <form action="alterarDisciplina.php" method="GET">
            Nome: <input type="text" name="nome">
            <br><br>
            Sigla: <input type="text" name="sigla">
            <br><br>
            Carga Horaria: <input type="text" name="carga">
            <br><br>
            <input type="submit" value="Criar Nova Disciplina">
        </form>
        <p><?php echo $msg ?></p>
        <br>
    </body>
</html>