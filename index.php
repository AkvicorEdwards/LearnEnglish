<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/13
 * Time: 19:19
 */

require_once "resources/FunctionLib.php";
$lister = new FunctionLib();

/**
 * Get login information
 */
if( !empty($_POST["username"]) && empty($_POST["permissions"]) ){//If there is no permission Is Login
    $username = $_POST["username"];
    $password = $_POST["password"];
    $bol = $lister->checkPassword($username,$password);//Check password and set session
}else if( !empty($_POST["username"]) && !empty($_POST["permissions"]) ){//If there is permission Is register
    $registrationCode = $_POST["registrationCode"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $permissions = $_POST["permissions"];
    $bol = $lister->registerUser($registrationCode,$username,$password,$permissions);//Write user information into database
    if($bol==1){
        echo "<script type='text/javascript'>";
        echo "alert('Register success!');";
        echo "</script>";
    }else if($bol==0){
        echo "<script type='text/javascript'>";
        echo "alert('Register failure!');";
        echo "</script>";
    }else if($bol==2){
        echo "<script type='text/javascript'>";
        echo "alert('User already exist!');";
        echo "</script>";
    }else if($bol==3){
        echo "<script type='text/javascript'>";
        echo "alert('ERROR Registration Code!');";
        echo "</script>";
    }
}

/**
 * Enter words
 */
if( !empty($_POST["list"]) && !empty($_POST["content"]) ){
    $list = $_POST["list"];
    $content = $_POST["content"];
    require_once "resources/EnterWords.php";
    $enter = new EnterWords();
    $content = $lister -> trim_merge_spaces($content);
    $enterResult = $enter -> enterWords($list,$content);//Write words into database
    if($enterResult){
        echo "<script type='text/javascript'>";
        echo "alert('Enter success!');";
        echo "history.back();";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Enter failure!');";
        echo "history.back();";
        echo "</script>";
    }
}

$checkLogin = $lister ->checkLogin();//Check result
$config = $lister -> getConfig();//Load config

$WebsiteTitle = $config['website_title'];//Get website title
$DisplayLanguage = $config['theme_display_language'];//Get display language
$FunnyTitle = $config['funny_title'];//Get funny_title setting

/**
 * SelectList
 */
if(!empty($_POST["selectList"])){
    //Unset old session
    unset($_SESSION['id']);
    unset($_SESSION['words']);
    unset($_SESSION['translate']);
    unset($_SESSION['r_count']);
    unset($_SESSION['f_count']);
    unset($_SESSION['a_count']);
    unset($_SESSION['rate']);
    unset($_SESSION['BeginID2']);
    unset($_SESSION['EndID2']);
    unset($_SESSION['BeginID4']);
    unset($_SESSION['EndID4']);
    unset($_SESSION['BeginID6']);
    unset($_SESSION['EndID6']);
    unset($_SESSION['BeginID8']);
    unset($_SESSION['EndID8']);
    $list = $_POST["selectList"];
    SETCOOKIE("sel_list",$list,time()+60*60*24);//Set cookie record selection
    header('location: '.$lister->getWebURL());
}

if(!empty($_POST["deleteList"])){
    $deleteList = $_POST['deleteList'];
    require_once "resources/EnterWords.php";
    $enter = new EnterWords();
    $enter -> delete_list($deleteList);
    header('location: '.$lister->getWebURL());
}

/**
 * Load page
 */
if($_GET['mod']=="register") {
    // Load register page
    $themeIndexRegister = $lister->getThemePath(true) . '/register/index.php';//Register page
    if (file_exists($themeIndexRegister)) {
        include($themeIndexRegister);
    } else {
        die('ERROR: Failed to load home page');
    }
}else if( $_GET['mod']=="learning" && isset($_GET['method']) && $checkLogin==true ){
    // Load learn page
    $themeIndexLearn = $lister->getThemePath(true) . '/home/learning.php';//learning page
    if (file_exists($themeIndexLearn)) {
        include($themeIndexLearn);
    } else {
        die('ERROR: Failed to load learn page');
    }
}else if($config['check_login']==true&&$checkLogin==false) {
    // Load login page
    $themeIndexLogin = $lister->getThemePath(true) . '/login/index.php';//Login page
    if (file_exists($themeIndexLogin)) {
        include($themeIndexLogin);
    } else {
        die('ERROR: Failed to load login page');
    }
}else if($checkLogin==true){
    // Load home page
    $themeIndex = $lister->getThemePath(true) . '/home/index.php';//Home page
    if (file_exists($themeIndex)) {
        include($themeIndex);
    } else {
        die('ERROR: Failed to load home page');
    }
}else{
    die('ERROR: NUll');//Other Error
}
