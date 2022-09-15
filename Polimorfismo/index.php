<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Título da página</title>
    <meta charset="utf-8">
    <?php
    require_once ('classes/forma.class.php');
    ?>
</head>
<body>
<?php
$quadrado = new Quadrado(25,5);
$circulo = new  Circulo(8);

$objetos = [$quadrado,$circulo];

foreach ($objetos as $objeto)
{
    $tipo = $objeto->getTipo();
    $area = $objeto->getArea();

    echo "AREA ".$tipo." : ".$area."</br>";
}

?>
</body>
</html>