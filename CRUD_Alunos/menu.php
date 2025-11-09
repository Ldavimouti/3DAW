<?php
// menu.php - menu de navegação simples
?>
<style>
    .navbar {
        background: #333;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .navbar a {
        color: white;
        margin-right: 15px;
        text-decoration: none;
        font-weight: bold;
    }
    .navbar a:hover {
        text-decoration: underline;
    }
</style>

<div class="navbar">
    <a href="index.php">🏠 Início</a>
    <a href="incluir.php">➕ Incluir Aluno</a>
    <a href="alterar.php">✏️ Alterar Aluno</a>
    <a href="excluir.php">🗑️ Excluir Aluno</a>
    <a href="listar_um.php">🔎 Listar Um</a>
    <a href="listar_todos.php">📋 Listar Todos</a>
</div>
