<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/15
 * Time: 18:53
 */

$method = $_GET['method'];

if($method=="EnterWord"){
    // Load page
    $themeEnterWords = $lister->getThemePath(true) . '/home/enter_words.php';//enter_words page
    if (file_exists($themeEnterWords)) {
        include($themeEnterWords);
    } else {
        die('ERROR: Failed to load enter_words page');
    }
}

if($method=="SelectList"){
    // Load page
    $themeSelectList = $lister->getThemePath(true) . '/home/select_list.php';//select_list page
    if (file_exists($themeSelectList)) {
        include($themeSelectList);
    } else {
        die('ERROR: Failed to load select_list page');
    }
}

if($method=="List"){
    // Load page
    $themeListList = $lister->getThemePath(true) . '/home/list.php';//list page
    if (file_exists($themeListList)) {
        include($themeListList);
    } else {
        die('ERROR: Failed to load list page');
    }
}

if(($method!="EnterWord")&&($method!="SelectList")&&($method!="List")){

    require "resources/LearnWords.php";
    $learn = new LearnWords();
    switch ($method){
        case 1:$learn -> method_1();break;
        case 2:$learn -> method_2();break;
        case 3:$learn -> method_3();break;
        case 4:$learn -> method_4();break;
        case 5:$learn -> method_5();break;
        case 6:$learn -> method_6();break;
        case 7:$learn -> method_7();break;
        case 8:$learn -> method_8();break;
    }

    // Load learning page
    $themeLearnWords = $lister->getThemePath(true) . '/home/learn_words.php';//learning page
    if (file_exists($themeLearnWords)) {
        include($themeLearnWords);
    } else {
        die('ERROR: Failed to load select_list page');
    }
}
