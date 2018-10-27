<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/16
 * Time: 13:10
 */

//Select language
switch ($DisplayLanguage){
    case "zh-cmn-Hans":
        $lang = "zh-cmn-Hans";
        $is1 = "回主页";
        $is2 = "词库";
        $is4 = "删除";
        $is5 = "已存在的词库";
        $is6 = "词库名(词库内单词数量)";
        $is7 = "删除词库";
        break;
    case "en":
        $lang = "en";
        $is1 = "Back Home";
        $is2 = "List";
        $is4 = "Delete";
        $is5 = "Existed List";
        $is6 = "Name(NumberOfWords)";
        $is7 = "Delete List";
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
    <title><?php echo $is7 ?></title>
    <link rel="icon" href="resources/themes/default/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="resources/themes/default/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="resources/themes/default/home/css/styles.css">
</head>
<body>
<div class="htmleaf-container">
    <div class="wrapper" style='OVERFLOW: auto; '>
        <div class="container">
            <h1>Delete List</h1>
            <form class="form">
                <button  type="button" onclick="location.href='?'"><?php echo $is1 ?></button>
            </form>
            <form class="form" action="" method="post">
                <input name="deleteList" type="text" placeholder="<?php echo $is2 ?>" required>
                <button type="submit" id="login-button" name="submit"><?php echo $is4 ?></button>
            </form>
            <form class="form">
                <input  type="text" placeholder="<?php echo $is5 ?>" disabled>
                <input  type="text" placeholder="<?php echo $is6 ?>" value="<?php echo $is6 ?>" readonly>
                <?php
                require "resources/LearnWords.php";
                $learn = new LearnWords();
                $result = $learn->get_list();
                $total_records = mysqli_num_rows($result);
                $j = 1;
                /**
                 * Output existing List
                 */
                while ($row = mysqli_fetch_assoc($result) and $j <= $total_records)
                {
                    echo "<button type='button' onclick=\"location.href='?mod=learning&method=List&list=".$row['list_name']."'\" >".$row['list_name']."(".$row['total'].")</button>";
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

<?php if($FunnyTitle==true) echo "<script type=\"text/javascript\" src=\"resources/themes/default/home/js/funny-title.js\"></script>" ?>

</body>
</html>