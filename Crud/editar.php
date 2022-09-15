<?php

include "header.php";
include "classes/contato.class.php";

$contato = new Contato();
$id = filter_input(INPUT_GET , 'id', FILTER_SANITIZE_NUMBER_INT);


if(!empty($id)){


    $info = $contato->getInfo($id);
}else{
    header('Location:index.php');
}
?>
    <h2>Editar Usuário</h2>

    <form method="post" action="submit_editar.php">
        <input type="hidden" name="id" value="<?= $info->id ?>">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?=$info->nome?>">
        <br><br>
        <label>Email:</label><br>
        <input type="email" name="email" required value="<?= $info->email ?>">
        <input type="submit" value="Adicionar">
    </form>
<?php
include "footer.php"?>