<?php
require "classes/contato.class.php";
$contato = new Contato();

$id = filter_input(INPUT_GET , 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){


    $excluir = $contato->excluir($id);

}
header("Location: index.php");