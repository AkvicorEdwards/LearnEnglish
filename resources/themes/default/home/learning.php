<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/15
 * Time: 18:53
 */

$method = $_GET['method'];

if($method=="EnterWord"){
    // Load learn page
    $themeEnterWords = $lister->getThemePath(true) . '/home/enter_words.php';//learning page
    if (file_exists($themeEnterWords)) {
        include($themeEnterWords);
    } else {
        die('ERROR: Failed to load enter_words page');
    }
}

if($method=="SelectList"){
    // Load learn page
    $themeSelectList = $lister->getThemePath(true) . '/home/select_list.php';//learning page
    if (file_exists($themeSelectList)) {
        include($themeSelectList);
    } else {
        die('ERROR: Failed to load select_list page');
    }
}

//
//if($checkWord=="true"){
//    require_once "resources/LearnWords.php";
//    $learn = new LearnWords();
//    $lister -> setIsTrue();
//}
//
//if($checkWord=="false"){
//    require_once "resources/LearnWords.php";
//    $learn = new LearnWords();
//    $lister -> setIsFalse();
//}



if(($method!="EnterWord")&&($method!="SelectList")){

    require_once "resources/LearnWords.php";
    $learn = new LearnWords();
    if($method==1){
        $learn -> method_1();
    }

    if($method==2){
        $learn -> method_2();
    }

    if($method==3){
        $learn -> method_3();
    }

    if($method==4){
        $learn -> method_4();
    }

    if($method==5){
        $learn -> method_5();
    }

    if($method==6){
        $learn -> method_6();
    }

    if($method==7){
        $learn -> method_7();
    }

    if($method==8){
        $learn -> method_8();
    }


    // Load learning page
    $themeLearnWords = $lister->getThemePath(true) . '/home/learn_words.php';//learning page
    if (file_exists($themeLearnWords)) {
        include($themeLearnWords);
    } else {
        die('ERROR: Failed to load select_list page');
    }
}
