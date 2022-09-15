<?php

require "classes/contato.class.php";
$contato = new Contato();


$id        = filter_input(INPUT_POST , 'id', FILTER_SANITIZE_NUMBER_INT);
$nome      = filter_input(INPUT_POST , 'nome', FILTER_SANITIZE_STRING);
$email     = filter_input(INPUT_POST , 'email',FILTER_SANITIZE_EMAIL);

if(!empty($nome) && !empty($email))
{
    echo $id;
    $editaContato = $contato->editar($id,$nome,$email);

    header('Location:index.php');
}
