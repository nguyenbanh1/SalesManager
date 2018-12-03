<?php 
    session_start();

    if (isset($_GET["idProduct"]) && isset($_GET["idCategory"])) {
        if (isset($_SESSION["cart"])) {
            if (isset($_SESSION["cart"][$_GET["idProduct"]])) {
                $_SESSION["cart"][$_GET["idProduct"]] = $_SESSION["cart"][$_GET["idProduct"]] + 1;
            } else {
                $_SESSION["cart"][$_GET["idProduct"]] = 1;
            }
        } else {
            $_SESSION["cart"] = array();
            $_SESSION["cart"][$_GET["idProduct"]] = 1;
        }
        header("Location:BuyProductPage.php?idCategory".$_GET["idCategory"]);

    }
     
?>
