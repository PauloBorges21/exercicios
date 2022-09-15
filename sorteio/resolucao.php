<?php
session_start();
if ($_GET) {
    if (isset($_GET["limpar"]) && strtolower($_GET["limpar"]) === "s") {
        unset($_SESSION["items"]);
    }
    $sortear = $_GET["sortear"] ?? "";
    $items = $_SESSION["items"] ?? [];
    if (strtolower($sortear) === "s") {
        $rand = rand(0, count($items) - 1);
        $sorteado = [$rand, $items[$rand]];
    } else {
        $name = $_GET["name"] ?? "";
        if ($name && !in_array($name, $items)) {
            array_push($items, $name);
            $_SESSION["items"] = $items;
        }
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>SORTEIO</title>
    <style>
        * {margin:0;padding:0;box-sizing: border-box;font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif;}
        header {width: 100%;height:80px;display:flex;justify-content: center;align-items: center;border-bottom: 1px solid #ccc;}
        .container {max-width: 1024px;margin: 0 auto;}
        .form {display: flex;}
        .form form {width: 50%;padding: 40px;display: flex;flex-direction: column;}
        .form table {width: 50%;border: 1px solid #ccc;border-radius: 10px;margin-top: 40px;}
        .form table thead tr th {font-size: 0.8rem;text-transform: uppercase;font-weight: 500;text-align: left;padding: 20px 10px;border-bottom: 1px solid #ccc;}
        .form table tbody tr td {padding: 20px 10px;}
        input[type=text], input[type=submit] {width: 100%;height: 40px;border-radius: 10px;outline: none;border: 1px solid #ccc;margin-bottom: 10px;padding-left: 10px;}
        input[type=submit] {cursor: pointer;}
        .card {display: flex;flex-direction: column;justify-content: center;align-items: center;margin-top: 20px;padding: 20px;border: 1px solid #ccc;border-radius: 10px;}
        .card-body p {width:500px;font-size: 40px;margin-top: 10px;border:1px solid #4387fd;padding:20px;text-align: center;border-radius: 10px;}
        .btn {font-size: 16px;font-weight: bold;padding: 10px;border-radius: 4px;text-decoration: none;outline: none;margin-right: 10px;}
        .btn-primary {color: #fff;background-color: #4387fd; text-align: center;}
        .btn-default {color: #666;background-color: #f5f5f5;font-weight: normal;border: 1px solid #ccc;text-align: center;margin-top:10px;}
    </style>
</head>
<body>
<header>
    <h1>SORTEIO</h1>
</header>
<main>
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>SORTEADO</h1></div>
            <?php if (isset($sorteado) && is_array($sorteado)): ?>
                <div class="card-body"><p><?="#" . $sorteado[0] . " " .$sorteado[1]?></p></div>
            <?php endif; ?>
        </div>
        <div class="form">
            <form method="GET">
                <input type="text" name="name" id="name" value="" placeholder="Informe o nome" required />
                <input type="submit" value="Adicionar" />
                <?php if (isset($_SESSION["items"])): ?>
                    <a href="?sortear=s" class="btn btn-primary">SORTEAR</a>
                    <a href="?limpar=s" class="btn btn-default">LIMPAR LISTA</a>
                <?php endif; ?>
            </form>
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome dos candidatos</th>
                </tr>
                </thead>
                <tbody>
                <?php (isset($_SESSION["items"])) ?>
                <?php foreach ($_SESSION["items"] as $key => $value): ?>
                    <tr>
                        <td><?=$key?></td>
                        <td><?=$value?></td>
                    </tr>
                <?php endforeach; ?>
                <?php  ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
</body>