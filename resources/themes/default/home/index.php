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
<div class="htmleaf-container" >
    <div class="wrapper" style='OVERFLOW: auto; '>
        <div class="container">
            <h1><?php if(!empty($_COOKIE["sel_list"])) echo "List: ".$_COOKIE["sel_list"] ?></h1>

            <form class="form">
                <?php
                if(!isset($_COOKIE["sel_list"])){
                    echo "<button   type=\"button\"   onclick=\"location.href='?mod=learning&method=SelectList'\">选择List</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button   type=\"button\"  onclick=\"location.href='?mod=learning&method=EnterWord'\">录入</button>";
                }else{
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=1'\">单List随机</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\" onclick=\"location.href='?mod=learning&method=2'\">单List顺序</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=3'\">全List随机</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=4'\">全List顺序</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=5'\">单List困难单词随机</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=6'\">单List困难单词顺序</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=7'\">全List困难单词随机</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=8'\">全List困难单词顺序</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<input  placeholder=\"其他\"  disabled>";

                    echo "<button  type=\"button\" onclick=\"location.href='?mod=learning&method=SelectList'\">选择List</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\" onclick=\"location.href='?mod=learning&method=EnterWord'\">录入</button>";
                }

                ?>
                <div></div>
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


<script src="resources/themes/default/login/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<!--
<script type="text/javascript" src="resources/themes/default/login/js/funny-title.js"></script>
-->
</body>
</html>