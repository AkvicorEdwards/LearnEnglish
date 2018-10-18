<!doctype html>
<html lang="zh-cmn-Hans">
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
                <button  type="button" id="Word" onclick="setWord()">Word</button>
                <div></div><br />
                <button  type="button" id="Translate" onclick="setTranslate()">Translate</button>
                <div></div><br />
                <input id="rate" name="rate" type="text" placeholder="正确率" value="" onclick="setRate()" readonly>
                <input id="word" name="word" type="text" placeholder="Word" value="">
                <button  type="button" onclick="checkWord()">检查拼写</button>
            </form>
            <form class="form" action="resources/themes/default/home/upRate.php" method="post">
                <input name="checkWord" type="text" placeholder="Right" value="true" style="display: none">
                <button type="submit" id="login-button" name="submit">正确</button>
            </form>
            <form class="form" action="resources/themes/default/home/upRate.php" method="post">
                <input  name="checkWord" type="text" placeholder="False" value="false" style="display: none">

                <button type="submit" id="login-button" name="submit">错误</button>
            </form>
            <form class="form">
            <button  type="button" onclick="location.href='?'">回主页</button>
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
        obj.innerHTML= "<?php echo $_COOKIE["words"] ?>";
    }
    function setTranslate()
    {
        var obj = document.getElementById("Translate");
        obj.innerHTML= "<?php echo $_COOKIE["translate"] ?>";
    }
    function setRate()
    {
        document.getElementById("rate").value="<?php echo $_COOKIE["rate"];?>"
    }
    function checkWord(){
        var userWord = document.getElementById("word").value;
        var rightWord = "<?php echo $_COOKIE["words"]; ?>";

        if (userWord == rightWord){
            alert("输入正确");
        }else{
            alert("输入错误");
        }
    }
    //function isRight(){
    //    $.ajax({
    //        type: "POST",
    //        url: "index.php",
    //        data: "checkWord=right&method=<?php //echo $method ?>//",
    //        success: function(msg){
    //            alert( "Data Saved: " + msg );
    //        }
    //    });
    //}
    //function isFalse(){
    //    $.ajax({
    //        type: "POST",
    //        url: "resources/default/home/upRate.php",
    //        data: "checkWord=false&method=<?php //echo $method ?>//",
    //    });
    //}

</script>
<script type="text/javascript">
    ls="<?php echo $_COOKIE["words"] ?>";
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
