<?php

$numbers = $_POST['number'];
if (isset($numbers)) {

    $separator = str_replace(" " , "," , $numbers);
    $separator = trim($separator);
    $separator = explode(',', $numbers);
    sort($separator);
    var_dump($separator);
//    $separator = asort($separator , SORT_STRING);

}
?>


<form method="post" action="">
    <label>Digite os numeros</label></br>
    <input type="text" name="number"></br>
    <input type="submit">
</form>

<div>
    <ul>
                <?php foreach($separator as $item ): ?>

                    <li><?php echo $item ?></li>

                <?php endforeach ?>
    </ul>

</div>


