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
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=1'\">单list全部</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=2'\">单list全部隐藏翻译</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=3'\">英语_随机</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=4'\">英语_困难随机</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\" onclick=\"location.href='?mod=learning&method=5'\">英语_list随机</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=6'\">英语_list顺序</button>";
                    echo "<div></div>";echo "</br>";
                    echo "<button  type=\"button\"  onclick=\"location.href='?mod=learning&method=7'\">英语_困难list随机</button>";
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