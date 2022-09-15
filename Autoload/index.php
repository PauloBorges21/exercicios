<?php

require "autoload.php";

use Produtos\Produtos;
use Usuario\Usuario;

$u = new Usuario() ;
$p = new Produtos() ;

echo $u->listarUsuario();

echo "<br>";

echo $p->listarProduto();