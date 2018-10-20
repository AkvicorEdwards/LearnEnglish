<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/19
 * Time: 18:53
 */
switch ($DisplayLanguage){
    case "zh-cmn-Hans":
        $lang = "zh-cmn-Hans";
        $is1 = "回主页";
        $is2 = "词库";
        $is3 = "已存在的单词";
        $is4 = "单词 翻译(正确率)";
        break;
    case "en":
        $lang = "en";
        $is1 = "Back Home";
        $is2 = "List";
        $is3 = "Existed Words";
        $is4 = "Word Translate(CorrectRate)";
        break;
}

$listList = $_GET['list'];
require "resources/LearnWords.php";
$learn = new LearnWords();
$result = $learn->list_list($listList);
$total_records = mysqli_num_rows($result);
?>
<!doctype html>
<html lang="<?php echo $lang ?>">
<head>
    <meta name="theme-color" content="#1E90FF">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $is2 ?> <?php echo $listList; ?></title>
    <link rel="icon" href="resources/themes/default/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="resources/themes/default/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="resources/themes/default/home/css/styles.css">
</head>
<body>
<div class="htmleaf-container">
    <div class="wrapper" style='OVERFLOW: auto; '>
        <div class="container">
            <h1><?php echo $is2 ?> <?php echo $listList; ?></h1>
            <form class="form">
                <button  type="button" onclick="location.href='?'"><?php echo $is1 ?></button>
            </form>
            <form class="form" action="" method="post">
                <input  type="text" placeholder="<?php echo $is3 ?>" disabled>
                <input  type="text" placeholder="<?php echo $is4 ?>" value="<?php echo $is4 ?>" readonly>
                <?php
                $j = 1;
                while ($row = mysqli_fetch_assoc($result) and $j <= $total_records)
                {
                    echo "<input  type=\"text\" placeholder=\"".$row['word']." ".$row['translate']."(".$row['rate']."\" value=\"".$row['word']." ".$row['translate']."(".$row['rate'].")\" readonly>";
                    echo "<div></div>";echo "</br>";
                    $j++;
                }
                ?>
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