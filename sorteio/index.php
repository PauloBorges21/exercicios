<?php
session_start();
if($_GET) {
    $nome = $_GET['candidatos'] ?? "";
    $itens = $_SESSION["itens"] ?? [];
    if ($nome && !in_array($nome, $itens)) {
        array_push($itens, $nome);
        $_SESSION["itens"] = $itens;
    }
}
//if ($name && !in_array($name, $items)) {
//    array_push($items, $name);
//    $_SESSION["items"] = $items;


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sorteio</title>

</head>
<body>
<div>

    <h1>Sorteio</h1>
    <div>Sorteado</div>
    <form method="GET" action="">
        <input type="text" name="candidatos" placeholder="informe o nome" required>
        <input type="submit" value="adicionar"><br>
        <br>
        <?php if (isset($_SESSION["itens"])): ?>
            <a href="sorteia.php?sortear=s" class="btn btn-primary">SORTEAR</a>
            <a href="limpa.php?limpar=s" class="btn btn-default">LIMPAR LISTA</a>
        <?php endif; ?>
    </form>
    <?php (isset($_SESSION["itens"])) ?>
    <?php foreach ($itens as $key => $value): ?>
        <tr>
            <td><?=$key?></td>
            <td><?=$value?></td>
        </tr>
    <?php endforeach; ?>

</div>
<form>

</form>
</body>

</html>