<!DOCTYPE html>
<html>
<head>
    <style>
        table {
        font-family: arial;
        border-collapse: collapse;
        width: 50%;
        }

        td, th {
        border: 1px solid #dddddd;
        border-collapse: collapse;
        text-align: center;
        padding: 8px;
        }
    </style>
</head>
<body>
    <header>
        <a href="alterarDisciplina.php">Alterar</a>
        <a href="excluirDisciplina.php">Excluir</a>
        <a href="incluirDisciplina.php">Incluir</a>
        <a href="listarUm.php">Listar um</a>
        <a href="listarTodos.php">Listar todos</a>
    </header>

    <h2>Tabela de Disciplinas</h2>

    <table>
        <?php 

            $arqDisc = fopen("disciplinas.txt","r") or die("erro ao criar arquivo");

            $linha = fgets($arqDisc);

            $colunaDados = explode(";", $linha);

            $nome = $colunaDados[0];
            $sigla = $colunaDados[1];
            $carga = $colunaDados[2];

            echo 
            "<tr>
                <th>$nome</th>
                <th>$sigla</th>
                <th>$carga</th>
            </tr>";
            
            while(!feof($arqDisc))
            {
                $linha = fgets($arqDisc);

                $colunaDados = explode(";", $linha);

                $nome = $colunaDados[0];
                $sigla = $colunaDados[1];
                $carga = $colunaDados[2];

                echo 
                "<tr>
                    <td>$nome</td>
                    <td>$sigla</td>
                    <td>$carga</td>
                </tr>";
            }

            fclose($arqDisc);
        ?>
    </table>

</body>
</html>