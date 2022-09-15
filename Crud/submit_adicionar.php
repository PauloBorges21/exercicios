<?php
require "classes/contato.class.php";
$contato = new Contato();



$nome      = filter_input(INPUT_POST , 'nome', FILTER_SANITIZE_STRING);
$email     = filter_input(INPUT_POST , 'email',FILTER_SANITIZE_EMAIL);

if(!empty($nome) && !empty($email))
{
    $adicionaContato = $contato->adicionar($email,$nome);

    header('Location:index.php');
}
