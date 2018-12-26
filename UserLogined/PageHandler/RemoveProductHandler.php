<?php
    session_start();
    if (isset($_SESSION["cart"]) && isset($_GET["idProduct"])) {
        if (isset($_SESSION["cart"][$_GET["idProduct"]])) {
            unset($_SESSION["cart"][$_GET["idProduct"]]);
        }
    }
    header("Location:../../Carts.php");

?>