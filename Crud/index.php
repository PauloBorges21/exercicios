

<?php
include 'header.php';
require "classes/contato.class.php";
$contato = new Contato();
?>



<a href="adicionar.php">[ADICIONAR]</a>
<br>
<br>
<table border="1" width="600">
    <tr>
        <td>ID</td>
        <td>NOME</td>
        <td>EMAIL</td>
        <td>DATA DE CADASTRO</td>
        <td>AÇÔES</td>
    </tr>

    <?php
    $listas = $contato->getAll();
    foreach ($listas as $key) : ?>
<tr>

    <?php $id = $key->id;
          $nome = $key->nome;
          $email = $key->email;
    ?>

    <td><?= $id ?></td>
    <td><?= $nome ?></td>
    <td><?= $email ?></td>
    <td><?= $contato->formatarData($key->data_cadastro) ?></td>
    <td>
        <a href="editar.php?id=<?= $id ?>">[EDITAR]</a>
        <a href="excluir.php?id=<?= $id ?>">[EXCLUIR]</a>
    </td>
</tr>
    <?php endforeach;?>
<!--        . "<br>";-->
<!--        echo $key->email . "<br>";-->
<!--        echo $key->data_cadastro . "<br>";-->


</table>
<!---->
<!--//$nome = $contato->getNome('teste@veronica.com.br');-->
<!---->
<!--//echo "Seu nome é " .$nome ;-->
<!---->

<!---->
<!--foreach ($listas as $key) {-->
<!--    echo $key->nome . "<br>";-->
<!--    echo $key->email . "<br>";-->
<!--    echo $key->data_cadastro . "<br>";-->
<!--}-->
<!--var_dump($listas);-->


<?php include 'footer.php';?>