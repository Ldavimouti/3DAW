<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <a href="alterarDisciplina.php">Alterar</a>
            <a href="incluirDisciplina.php">Incluir</a>
            <a href="listaDisciplina.php">Lista</a>
            <a href="listarUm.php">Listar um</a>
            <a href="listarTodos.php">Listar todos</a>
        </header>
        <h1>Excluir Disciplina:</h1>
        <h2>Digite a sigla da disciplina a ser excluida!</h2>
        <form action="excluirDisciplina.php" method="POST">
                Sigla: <input type="text" name="sigla">
        </form>
        <p><?php echo $msg ?></p>
        <br>
    </body>
</html>