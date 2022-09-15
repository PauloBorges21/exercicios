<?php
session_start();
$nome = $_POST['candidatos'] ?? "Caiuaqui";

$itens ="";


echo $nome;
if ($nome && !in_array($nome, $itens)){
    array_push($itens , $nome);
    $itens =   $_SESSION["itens"];
}
//if ($name && !in_array($name, $items)) {
//    array_push($items, $name);
//    $_SESSION["items"] = $items;
echo $itens;
header('LOCATION:index.php');
