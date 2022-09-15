<?php
//antes da explicação da PSR-4
//spl_autoload_register(function ($class){
//    require "classes/".$class.".php";
//    echo "NOME: ".$class;
//});


spl_autoload_register(function ($class){
$baseDir = __DIR__.'\classes\\';
//linux e mac  $baseDir = __DIR__.'/classes/';

    $file = $baseDir.'\\'.$class.'.php';
    //linux e mac   $file = $baseDir.str_replace('\\','/',$class).'php';
    if(file_exists($file)){
        require $file;
    }
echo $baseDir;
});