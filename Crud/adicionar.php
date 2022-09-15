<?php
include 'header.php';
?>

<h2>Adicionar Usuário</h2>

<form method="post" action="submit_adicionar.php">
    <label>Nome:</label><br>
    <input type="text" name="nome">
    <br><br>
    <label>Email:</label><br>
    <input type="email" name="email" required>
    <input type="submit" value="Adicionar">
</form>