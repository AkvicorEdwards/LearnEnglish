<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/17
 * Time: 19:40
 */

$checkWord = $_POST["checkWord"];
//$method = $_POST["method"];

require "../../../LearnWords.php";
$lister = new LearnWords();


if($checkWord=="true"){
    $lister -> setIsTrue();
}

if($checkWord=="false"){
    $lister -> setIsFalse();
}

header('location: '.$_SERVER['HTTP_REFERER']);
