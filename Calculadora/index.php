<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
<?php require_once ('classe/operacoes.class.php');

$calcula = new Calculadora();

$calcula->setAdd(12);
$calcula->setSub(1);
$calcula->setMult(5);
$calcula->setDiv(2);
echo "TOTAL: " . $calcula->getTotal();
$calcula->getClear();

?>


</body>

</html>