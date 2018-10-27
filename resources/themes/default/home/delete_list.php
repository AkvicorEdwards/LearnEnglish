<!doctype html>
<html lang="en">
<head>
    <meta name="theme-color" content="#1E90FF">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete List</title>
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
                <button  type="button" onclick="location.href='?'">Back Home</button>
            </form>
            <form class="form" action="" method="post">
                <input name="deleteList" type="text" placeholder="List" required>
                <button type="submit" id="login-button" name="submit">Delete</button>
            </form>
            <form class="form">
                <input  type="text" placeholder="Existed List" disabled>
                <input  type="text" placeholder="Name(NumberOfWords)" value="Name(NumberOfWords)" readonly>
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