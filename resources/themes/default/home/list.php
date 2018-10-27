<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/19
 * Time: 18:53
 */

$listList = $_GET['list'];
require "resources/LearnWords.php";
$learn = new LearnWords();
$result = $learn->list_list($listList);
$total_records = mysqli_num_rows($result);
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="theme-color" content="#1E90FF">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List: <?php echo $listList; ?></title>
    <link rel="icon" href="resources/themes/default/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="resources/themes/default/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="resources/themes/default/home/css/styles.css">
</head>
<body>
<div class="htmleaf-container">
    <div class="wrapper" style='OVERFLOW: auto; '>
        <div class="container">
            <h1>List: <?php echo $listList; ?></h1>
            <form class="form">
                <button  type="button" onclick="location.href='?'">Back Home</button>
            </form>
            <form class="form" action="" method="post">
                <input  type="text" placeholder="Existed Words" disabled>
                <input  type="text" placeholder="Word Translate(CorrectRate)" value="Word Translate(CorrectRate)" readonly>
                <?php
                /**
                 * Output existing words from List
                 */
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

<?php if($FunnyTitle==true) echo "<script type=\"text/javascript\" src=\"resources/themes/default/home/js/funny-title.js\"></script>" ?>

</body>
</html>