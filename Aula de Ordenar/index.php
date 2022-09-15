<?php 


try{
    $pdo = new PDO("mysql:dbname=db_projeto_revervas;host=localhost;charset=utf-8", "root","");

} catch(PDOException $errors){
    echo "ERRO: " .$errors->getMessage();
    exit;
}

if(isset($_GET['ordem']) && !empty($_GET['ordem']))
{
    $ordem = addslashes($_GET['ordem']);
    
    $sql = "SELECT * FROM tb_carros order by " .$ordem ;
}else{
    $sql = "SELECT * FROM tb_carros";
    $ordem ="";
}

?>
<form method="get">
    <select name="ordem" onchange="this.form.submit()">
        <option value=""></option>
        <option value="nome"<?php echo ($ordem =="nome") ? 'selected="selected"':''?>>Por nome</option>
        <option value="id"<?php echo ($ordem =="id") ? 'selected="selected"':''?>>Por idade</option>
    </select>
</form>
<table border="1" width="400">
    <tr>
        <th>Nome</th>

        <th>ID</th>
    </tr>
    <?php 

   
        $sql = $pdo->query($sql);
        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() as $usuario):
?>
    <tr>
        <th><?php echo $usuario['nome'];?></th>

        <th><?php echo $usuario['id'];?></th>
    </tr>

    <?php endforeach;

}
?>
</table>