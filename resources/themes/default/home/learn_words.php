<!doctype html>
<html lang="en">
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
                <input id="rate" name="rate" type="text" placeholder="Correct Rate" value="" onclick="setRate()" readonly>
                <input id="word" name="word" type="text" placeholder="Spell Word" value="">
                <button  type="button" onclick="checkWord()">Check Spelling</button>
            </form>
            <form class="form" action="resources/themes/default/home/upRate.php" method="post">
                <input name="checkWord" type="text" placeholder="Right" value="true" style="display: none">
                <button type="submit" id="login-button" name="submit">Correct</button>
            </form>
            <form class="form" action="resources/themes/default/home/upRate.php" method="post">
                <input  name="checkWord" type="text" placeholder="False" value="false" style="display: none">
                <button type="submit" id="login-button" name="submit">Wrong</button>
            </form>
            <form class="form">
            <button  type="button" onclick="location.href='?'">Back Home</button>
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
            alert("<?php echo "Correctly Spelled" ?>");
        }else{
            alert("<?php echo "Spelling Mistake" ?>");
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

<?php if($FunnyTitle==true) echo "<script type=\"text/javascript\" src=\"resources/themes/default/home/js/funny-title.js\"></script>" ?>

</body>
</html>
