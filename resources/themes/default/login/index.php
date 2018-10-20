<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/15
 * Time: 19:56
 */

switch ($DisplayLanguage){
    case "zh-cmn-Hans":
        $lang = "zh-cmn-Hans";
        $is1 = "登陆";
        $is2 = "欢迎";
        $is3 = "用户名";
        $is4 = "密码";
        $is5 = "登陆";
        $is6 = "注册";
        break;
    case "en":
        $lang = "en";
        $is1 = "Login";
        $is2 = "Welcome";
        $is3 = "Username";
        $is4 = "Password";
        $is5 = "Sign in";
        $is6 = "Sign up";
        break;
}


?>
<!doctype html>
<html lang="<?php echo $lang ?>">
<head>
    <meta name="theme-color" content="#1E90FF">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $is1 ?></title>
    <link rel="icon" href="resources/themes/default/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="resources/themes/default/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="resources/themes/default/home/css/styles.css">
</head>
<body>
<div class="htmleaf-container">
    <div class="wrapper">
        <div class="container">
            <h1><?php echo $is2 ?></h1>

            <form class="form" action="" method="post">
                <input name="username" type="text" placeholder="<?php echo $is3 ?>" value="" required>
                <input name="password" type="password" placeholder="<?php echo $is4 ?>" value="" required>
                <button type="submit" id="login-button" name="submit"><?php echo $is5 ?></button>
            </form>
            <form class="form">
                <button  type="button" onclick="location.href='?mod=register'"><?php echo $is6 ?></button>
            </form>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>


<script src="resources/themes/default/home/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<!--
<script type="text/javascript" src="resources/themes/default/login/js/funny-title.js"></script>
-->
</body>
</html>
