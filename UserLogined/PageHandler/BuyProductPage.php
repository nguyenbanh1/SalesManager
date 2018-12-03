<?php session_start();?>
<!doctype html>
<html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <?php 
        $count = 0;
        if (isset($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $index => $item) {
                $count += $_SESSION["cart"][$index];
            }
        }
        echo $count;   
    ?>
    <a href = "CartHandler.php?idCategory=1&idProduct=1">San Pham a</a>
    <a href = "CartHandler.php?idCategory=1&idProduct=2">San Pham b</a>
    <a href = "CartHandler.php?idCategory=1&idProduct=3">San Pham c</a>
</body>
</html>