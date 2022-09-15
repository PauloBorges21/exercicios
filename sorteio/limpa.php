<?php

if ($_GET) {
    if (isset($_GET["limpar"]) && strtolower($_GET["limpar"]) === "s") {
        unset($_SESSION["itens"]);

        header('Location:index.php');
    }
}