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
            $is1 = "单词";
            $is2 = "翻译";
            $is3 = "正确率";
            $is4 = "拼写单词";
            $is5 = "检查拼写";
            $is6 = "正确";
            $is7 = "错误";
            $is8 = "回主页";
            $is9 = "拼写正确";
            $is10 = "拼写错误";
            break;
        case "en":
            $lang = "en";
            $is1 = "Word";
            $is2 = "Translate";
            $is3 = "Correct Rate";
            $is4 = "Spell Word";
            $is5 = "Check Spelling";
            $is6 = "Correct";
            $is7 = "Wrong";
            $is8 = "Back Home";
            $is9 = "Correctly Spelled";
            $is10 = "Spelling Mistake";
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
    <title>Language</title>
    <link rel="icon" href="resources/themes/default/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="resources/themes/default/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="resources/themes/default/home/css/styles.css">
</head>
<body>
<div class="htmleaf-container">
    <div class="wrapper" style='OVERFLOW: auto; '>
        <div class="container">

            <form class="form">
                <button  type="button" id="Word" onclick="setWord()"><?php echo $is1 ?></button>
                <div></div><br />
                <button  type="button" id="Translate" onclick="setTranslate()"><?php echo $is2 ?></button>
                <div></div><br />
                <input id="rate" name="rate" type="text" placeholder="<?php echo $is3 ?>" value="" onclick="setRate()" readonly>
                <input id="word" name="word" type="text" placeholder="<?php echo $is4 ?>" value="">
                <button  type="button" onclick="checkWord()"><?php echo $is5 ?></button>
            </form>
            <form class="form" action="resources/themes/default/home/upRate.php" method="post">
                <input name="checkWord" type="text" placeholder="Right" value="true" style="display: none">
                <button type="submit" id="login-button" name="submit"><?php echo $is6 ?></button>
            </form>
            <form class="form" action="resources/themes/default/home/upRate.php" method="post">
                <input  name="checkWord" type="text" placeholder="False" value="false" style="display: none">
                <button type="submit" id="login-button" name="submit"><?php echo $is7 ?></button>
            </form>
            <form class="form">
            <button  type="button" onclick="location.href='?'"><?php echo $is8 ?></button>
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
<script type="text/javascript">
    function setWord()
    {
        var obj = document.getElementById("Word");
        obj.innerHTML= "<?php echo $_SESSION["words"] ?>";
    }
    function setTranslate()
    {
        var obj = document.getElementById("Translate");
        obj.innerHTML= "<?php echo $_SESSION["translate"] ?>";
    }
    function setRate()
    {
        document.getElementById("rate").value="<?php echo $_SESSION["rate"];?>"
    }
    function checkWord(){
        var userWord = document.getElementById("word").value;
        var rightWord = "<?php echo $_SESSION["words"]; ?>";

        if (userWord == rightWord){
            alert("<?php echo $is9 ?>");
        }else{
            alert("<?php echo $is10 ?>");
        }
    }

</script>
<script type="text/javascript">
    ls="<?php session_start(); echo $_SESSION["words"] ?>";
    if(ls==""){
        window.location.reload();
    }
</script>

<script src="resources/themes/default/home/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<!--
<script type="text/javascript" src="resources/themes/default/login/js/funny-title.js"></script>
-->
</body>
</html>
